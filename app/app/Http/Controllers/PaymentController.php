<?php
#require __DIR__ . '/../bootstrap.php';
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;

/** All Paypal Details class **/
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Redirect;
use Session;
use URL;


use App\Http\Requests;
use \Cart as Cart;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Product;
use Illuminate\Support\Facades\Auth;


use App\Ventas;
use App\Ventas_detalle;

class PaymentController extends Controller
{

     private $_api_context;


     public function __construct()
    {
/** PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);

    }




     public function index()
    {
        
        return view('paywithpaypal');
    }

    public function payWithpaypal(Request $request)
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        
        $item_1 = new Item();
        $item_1->setName('Carrito ABCSimple') /** item name **/
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice(Cart::total()); /** unit price **/
        
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));
        
        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal(Cart::total());
        
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your transaction description');
        
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('paypal.status')) /** Specify return URL **/
            ->setCancelUrl(URL::route('paypal.status'));
        
        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        /** dd($payment->create($this->_api_context));exit; **/
        try {
        $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
        if (\Config::get('app.debug')) {
        \Session::put('error', 'Connection timeout');
                return Redirect::route('paywithpaypal');
        } else {
        \Session::put('error', 'Some error occur, sorry for inconvenient');
                return Redirect::route('paywithpaypal');
        }
        }
        foreach ($payment->getLinks() as $link) {
        if ($link->getRel() == 'approval_url') {
        $redirect_url = $link->getHref();
                break;
        }
        }
/** add payment ID to session **/
             Session::put('paypal_payment_id', $payment->getId());
        if (isset($redirect_url)) {
/** redirect to paypal **/
            return Redirect::away($redirect_url);
        }
        \Session::put('error', 'Unknown error occurred');
        return Redirect::route('paywithpaypal');
    }

    
   public function getPaymentStatus()
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');

        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {

            \Session::put('error', 'Payment failed');
            return Redirect::to('/');

        }

        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));

        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);
 
        if ($result->getState() == 'approved') {

#-------------------SE ALMACENA LA COMPRA--------------------#
        #$this->saveOrder();
            #$usuario = Auth::id();
            #$cliente = 16;#NO TENGO CLARO DE DONDE OBTENGO EL SESSION DEL CLIENTE

            $cliente = 16;
            $usuario = Auth::id();#NO TENGO CLARO DE DONDE OBTENGO EL SESSION DEL CLIENTE

            $total = Cart::total();
                    
        DB::beginTransaction();
            try {//db transaccion            
                    $id = DB::table('Ventas')->insertGetId( ['total' => $total,'id_user' => $usuario, 'id_cliente' => $cliente]);

                    #--- ALMACENANDO DETALLE_PAGO
                        $id_tipo_pago=1; # Por el momento 1 por paypal, solamente funcionando, una vez se coloque otro tipo de pago debe hacerce un casopara almacenar cada tipo de pago

                       # $cliente = 3; #Por el momento se coloca cliente de manera manual

                        DB::table('ventas_detalle_pago')->insert( ['id_venta' => $id, 'id_tipo_pago' => $id_tipo_pago,'id_user' => $usuario,'id_cliente' => $cliente,'referencia' => $payment_id]);

            
                    foreach (Cart::content() as $item) { 

                    #----Buscando el precio en la tabla curso
                     if($item->model->id_categoria == 1){

                     $product = DB::table('products AS P')
                        ->join('Cursos AS C', 'C.id_curso', '=', 'P.id_curso') 
                         #id_p tiene el id delcurso paquete o promocion segun sea el caso
                        ->select('C.id_curso AS id_p','C.precio AS precio','C.nombre AS nombre')
                        ->where('P.id', '=', $item->id )->first();

                        
                     #---Buscando el precio en la tabla promociones
                     } if($item->model->id_categoria == 3){

                     $product = DB::table('products AS P')
                        ->join('Promociones AS C', 'C.id_promocion', '=', 'P.id_promocion') 
                   
                        ->select('C.id_promocion AS id_p','C.precio AS precio','C.nombre AS nombre')
                        ->where('P.id', '=', $item->id )->first(); 
 


                     #---Buscando el precio en la tabla paquetes
                     } if($item->model->id_categoria == 2){

                     $product = DB::table('products AS P')
                        ->join('Paquetes AS C', 'C.id_paquete', '=', 'P.id_paquete') 
                   
                        ->select('C.id_paquete AS id_p','C.precio AS precio','C.nombre AS nombre')
                        ->where('P.id', '=', $item->id )->first(); 
                       }                    
              #---- ALMACENADO VENTAS_DETALLE
                        $id_venta_d=DB::table('Ventas_Detalle')->insertGetId(['id_venta' => $id,                        'id_producto' => $item->id, 'precio_venta' => $product->precio]);



              #--- ALMACENANDO VENTAS_SUBDETALLE - UNA SENTENCIA SEGUN SEA LA CATEGORIA

                        if($item->model->id_categoria == 1){

                            DB::table('ventas_subdetalle')->insert( ['id_venta_d' => $id_venta_d, 'id_curso' => $product->id_p,'precio' => $product->precio,'nombre' => $product->nombre]); #SE TRAE AL PRECIO Y NOMBRE DEL OBJETO PRODUCTO ( CURSO ) 

                        } elseif($item->model->id_categoria == 3){

                            DB::table('ventas_subdetalle')->insert( ['id_venta_d' => $id_venta_d, 'id_promocion' => $product->id_p,'precio' => $product->precio,'nombre' => $product->nombre]); #SE TRAE AL PRECIO Y NOMBRE DEL OBJETO PRODUCTO PROMOCION) 


                        } elseif($item->model->id_categoria == 2){

                             DB::table('ventas_subdetalle')->insert( ['id_venta_d' => $id_venta_d, 'id_paquete' => $product->id_p,'precio' => $product->precio,'nombre' => $product->nombre]); #SE TRAE AL PRECIO Y NOMBRE DEL OBJETO PRODUCTO (PAQUETE) 

                        }


                         
                    /*
                        DB::table('Ventas_Detalle')->insert(
                        ['id_producto' => $item->id, 'precio_venta' => $product->precio]); */
            
                     } //foreach
            DB::commit(); // todo ok

            }catch(Exception $e){
                     
            DB::rollback();

            } // catch




                   
#------------------------------------------------------------#



            \Session::put('success', 'Payment success');
            \Session::forget('cart');# inicializando carrito
           return redirect()->route('cart.index')->withSuccessMessage('Su pago ha sido recibido de forma exitosa bajo el #'. $payment_id);           


        }

        \Session::put('error', 'Payment failed');
        return Redirect::to('/');

    }

 protected function saveOrder ()
 {

   $usuario = Auth::id();
                    $total = Cart::total();
                    
        DB::beginTransaction();
            try {//db transaccion            
                    $id = DB::table('Ventas')->insertGetId( ['total' => $total, 'id_cliente' => $cliente]);
            
                    foreach (Cart::content() as $item) { 

                    #----Buscando el precio en la tabla curso
                     if($item->model->id_categoria == 1){

                     $product = DB::table('products AS P')
                        ->join('Cursos AS C', 'C.id_curso', '=', 'P.id_curso') 
                 
                        ->select('C.precio AS precio')
                        ->where('P.id', '=', $item->id )->first();

                        
                     #---Buscando el precio en la tabla promociones
                     } elseif($item->model->id_categoria == 2){

                     $product = DB::table('products AS P')
                        ->join('Promociones AS C', 'C.id_promocion', '=', 'P.id_promocion') 
                   
                        ->select('C.precio AS precio')
                        ->where('P.id', '=', $item->id )->first(); 
                        


                     #---Buscando el precio en la tabla paquetes
                     } elseif($item->model->id_categoria == 3){

                     $product = DB::table('products AS P')
                        ->join('Paquetes AS C', 'C.id_paquete', '=', 'P.id_paquete') 
                   
                        ->select('C.precio AS precio')
                        ->where('P.id', '=', $item->id )->first(); 
                       }                    
             
                        DB::table('Ventas_Detalle')->insert(['id_venta' => $id,                        'id_producto' => $item->id, 'precio_venta' => $product->precio]);
                    /*
                        DB::table('Ventas_Detalle')->insert(
                        ['id_producto' => $item->id, 'precio_venta' => $product->precio]); */
            
                     } //foreach
            DB::commit(); // todo ok

            }catch(Exception $e){
                     
            DB::rollback();

            } // catch


 }


}






    