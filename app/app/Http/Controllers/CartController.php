<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use \Cart as Cart;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Session;
use App\Ventas;
use App\Ventas_detalle;

use View;
use Redirect;
use Exception;

#use Stripe\Stripe;
#use Stripe\Charge;
#use Stripe\Error\Card;
#use Stripe\Error\InvalidRequest;




class CartController extends Controller
{

    private $path ='vendor.adminlte.cart';
    private $path1 ='vendor.adminlte.checkout';

    public function index()
    {
        #return view('cart.index');
         return view($this->path . ".index");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });

        if (!$duplicates->isEmpty()) {
            return redirect('cart')->withSuccessMessage('Este producto ya está agregado a su Carrito de Compra!');
        }

        Cart::add($request->id, $request->name, 1, $request->price)->associate('App\Product');
        #Cart::store('1');
        return redirect('cart')->withSuccessMessage('Producto agregado de forma exitosa!');
    }


    public function addItem(Request $request, $id)
    {
        /* $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });

        if (!$duplicates->isEmpty()) {
            return response()->json(['success'=> true]);
        }

        
        Cart::add($request->id, $request->name, 1, $request->price)->associate('App\Product'); */
        
        #return response()->json(['success'=> true]);
        if ($request->ajax()){//r
        
        $name = $request->name;
        $price = $request->price;
        $products_total = Cart::count();
       #Cart::add($idd, 'success58855', 1, 999)->associate('App\Product');
       Cart::add($id, $name, 1, $price)->associate('App\Product');

        #return response()->json(['message'=>'El producto fue agregado exitosamente al carrito']);

        #return response()->json(['message' => 'aa']);
         
           
      }//r
        
    
    }
    
    public function getcheckout(Request $request)
    {
        # view('checkout.index');
        return view($this->path1 . ".index");
          

    }

    public function postCheckout(Request $request)
    {      

        #Stripe::setApiKey('sk_test_YSCNd9Qe19xJWVd1xKpLQ842'); //test secret key Viene del stripe.js

        // Create the charge on Stripe's servers - this will charge the user's card
        #try {
           /* $order_number = rand(1000, 9999);
            $charge = Charge::create(array(
                "amount" => $cart->total_price * 100, // amount in cents converted to dollars
                "currency" => "usd",
                "source" => $request->stripeToken, // obtained with Stripe.js
                "description" => "Order #" . $order_number . " - " . date('F d, Y g:ia') //uniqid() based on microtime
            )); */

                    
                    $usuario = Auth::id();
                    $total = Cart::total();
                    
        DB::beginTransaction();
            try {//db transaccion            
                    $id = DB::table('Ventas')->insertGetId( ['total' => $total, 'id_user' => $usuario]);
            
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



           Session::forget('cart');# inicializando carrito
                return redirect()->route('cart.index')->withSuccessMessage('Su compra ha sido completada de forma satisfactoria bajo el # ' . $id);           

           /*      } #try
             catch(Exception $e){

            return $e->getMessage();
        } */

                
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        // Validation on max quantity
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|between:1,5'
        ]);

         if ($validator->fails()) {
            session()->flash('error_message', 'Quantity must be between 1 and 5.');
            return response()->json(['success' => false]);
         }

        Cart::update($id, $request->quantity);
        session()->flash('success_message', 'Quantity was updated successfully!');

        return response()->json(['success' => true]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
        return redirect('cart')->withSuccessMessage('Producto eliminado del carrito de Compra!');
    }
    
    public function destroyProduct(Request $request, $id)
    {
        #$usuario = Auth::id();
        #$userId = auth()->user()->id; // or any string represents user identifier
        #$userId = Auth::id();
        #Cart::session($userId)->remove($id);
        Cart::remove($id);
       
        
    }

    /**
     * Remove the resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function emptyCart()
    {
        Cart::destroy();
        return redirect('cart')->withSuccessMessage('Carrito de compra vacio!');
    }

    /**
     * Switch item from shopping cart to wishlist.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function switchToWishlist($id)
    {
        $item = Cart::get($id);

        Cart::remove($id);

        $duplicates = Cart::instance('wishlist')->search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id === $id;
        });

        if (!$duplicates->isEmpty()) {
            return redirect('cart')->withSuccessMessage('Producto incluido anteriormente en Wishlist!');
        }

        Cart::instance('wishlist')->add($item->id, $item->name, 1, $item->price)
                                  ->associate('App\Product');

        return redirect('cart')->withSuccessMessage('Producto enviado exitosamente a Wishlist!');

    }
}

