 <?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use \Cart as Cart;


class WishlistController extends Controller
{
    private $path ='vendor.adminlte.wishlist';
    public function index()
    {
        # return view('wishlist.index');
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
        $duplicates = Cart::instance('wishlist')->search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });

        if (!$duplicates->isEmpty()) {
            return redirect('shop')->withSuccessMessage('Producto incluido anteriormente en Wishlist!');
        }

        Cart::instance('wishlist')->add($request->id, $request->name, 1, $request->price)
                                  ->associate('App\Product');

        #return redirect('shop')->withSuccessMessage('Producto enviado exitosamente a Wishlist!');
        return view($this->path . ".index");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::instance('wishlist')->remove($id);
        return redirect('wishlist')->withSuccessMessage('Producto eliminado de Wishlist!');
    }

    /**
     * Remove the resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function emptyWishlist()
    {
        Cart::instance('wishlist')->destroy();
        return redirect('wishlist')->withSuccessMessage('Su Wishlist ha sido vaciada!');
    }

    /**
     * Switch item from wishlist to shopping cart.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function switchToCart($id)
    {
        $item = Cart::instance('wishlist')->get($id);

        Cart::instance('wishlist')->remove($id);

        $duplicates = Cart::instance('default')->search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id === $id;
        });

        if (!$duplicates->isEmpty()) {
            return redirect('cart')->withSuccessMessage('Producto incluido anteriormente en Wishlist!');
        }

        Cart::instance('default')->add($item->id, $item->name, 1, $item->price)
                                 ->associate('App\Product');

        return redirect('wishlist')->withSuccessMessage('Producto enviado exitosamente al Carrito de Compras!!');

    }
}

