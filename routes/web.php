<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});
    //ruta de prueba para los li del index
    Route::get('/', 'Controller@viewIndex')->name('view.index');
    Route::get('/tienda', 'Controller@viewTienda')->name('view.tienda');
    Route::get('/quienesSomos', 'Controller@viewQuienes')->name('view.quienes');
    Route::get('/queEsDiferente', 'Controller@viewDiferente')->name('view.diferente');
    Route::get('/galeria', 'Controller@viewGaleria')->name('view.galeria');

    Route::get('/cliente/password/reset', ['as' => 'cliente.password.reset', 'uses' => 'ClienteAuth\ForgotPasswordController@showLinkRequestForm']);
    Route::post('/cliente/password/email', ['as' => 'cliente.password.email', 'uses' => 'ClienteAuth\ForgotPasswordController@sendResetLinkEmail']);
    Route::get('/cliente/password/reset/{token}', ['as' => 'cliente.password.reset.token', 'uses' => 'ClienteAuth\ResetPasswordController@showResetForm']);
    Route::post('/cliente/password/reset', ['as' => 'cliente.password.reset.post', 'uses' => 'ClienteAuth\ResetPasswordController@reset']);

        Route::group(['middleware' => 'auth'], function () {
        //    Route::get('/link1', function (){
        //        // Uses Auth Middleware
        //    });
            Route::get('/home', 'HomeController@index');

        //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
    Route::resource('idioma','IdiomaController');
    Route::get('crear-i',[ 'as' => 'crear-i', 'uses' => 'IdiomaController@store'] );
    Route::post('elimi_id',[ 'as' => 'elimi_id', 'uses' => 'IdiomaController@eliminar'] );
    Route::resource('curso', 'CursoController');
    Route::get('crear-curso',[ 'as' => 'crear-curso', 'uses' => 'CursoController@store'] );
    Route::post('elimi_cu',[ 'as' => 'elimi_cu', 'uses' => 'CursoController@eliminar'] );
    Route::resource('nivel', 'NivelController');
    Route::get('crear_ni',[ 'as' => 'crear_ni', 'uses' => 'NivelController@store'] );
    Route::post('elimi_ni',[ 'as' => 'elimi_ni', 'uses' => 'NivelController@eliminar'] );
    Route::resource('leccion', 'LeccionController');
    Route::post('elimi_le',[ 'as' => 'elimi_le', 'uses' => 'LeccionController@eliminar'] );
    Route::get('crear_le',[ 'as' => 'crear_le', 'uses' => 'LeccionController@store'] );
    Route::resource('plantilla', 'PlantillaController');
    Route::post('elimi_pl',[ 'as' => 'elimi_pl', 'uses' => 'PlantillaController@eliminar'] );
    Route::get('crear_pl',[ 'as' => 'crear_pl', 'uses' => 'PlantillaController@store'] );
    Route::resource('contenido','ContenidoController' );
    Route::post('elimi_co',[ 'as' => 'elimi_co', 'uses' => 'ContenidoController@eliminar'] );
    Route::get('crear_co',[ 'as' => 'crear_co', 'uses' => 'ContenidoController@store'] );
    Route::resource('rol', 'RolController');
    Route::resource('roles-usuario', 'RolUserController');
    Route::get('crear-ru',[ 'as' => 'crear-ru', 'uses' => 'RolUserController@store'] );
    //Bloque Arístides
    //Bloque Paquetes/////
    Route::resource('paquete', 'PaqueteController');

    Route::get('busca_paquete',[ 'as' => 'buscapaquete', 'uses' => 'PaqueteController@buscarpaquetes'] );
    //Permite realizar la búsqueda de los cursos asociados a un paquete
    Route::get('cursosbyidioma', 'Paquete_CursoController@cursosbyidioma')->name('cursosbyidioma');

    //Eliminar paquetes
    Route::post('eliminandopaquete', 'PaqueteController@eliminar_paquete')->name('eliminapaq');

    //Reordenar
    Route::post('reordenar', 'PaqueteController@reordenar')->name('reordenando');
    //Bloque Paquetes/////

    //Bloque PaqueteCursos/////
    Route::resource('paquetecurso', 'Paquete_CursoController');

    //Permite realizar la búsqueda de los cursos asociados a un paquete
    Route::get('cursosbyidioma', 'Paquete_CursoController@cursosbyidioma')->name('cursosbyidioma');

    Route::post('miscursos', 'Paquete_CursoController@miscursos')->name('miscursos');

    //Permite asociar o no cursos a paquetes
    //Route::post('actualizarpaquetecurso', 'Paquete_CursoController@actualizar_paquetecurso')->name('actualizarpaquetecurso');

    Route::post('activarpaquetecurso', 'Paquete_CursoController@update_paquetecurso')->name('activarpaquetecurso');


    //Permite eliminar curso asociado a un paquete
    Route::post('eliminarpaquetecurso', 'Paquete_CursoController@eliminar_paquetecurso')->name('eliminarpaquetecurso');

    //Permite agregar a un paquete
    Route::post('agregarpaquetecurso', 'Paquete_CursoController@agrega_paquetecurso')->name('agregarpaquetecurso');

    //Bloque PaqueteCursos/////
    //Fin Boque Arístides
/////////////////////////////////////////////////////////////////////////////////////////////
    Route::resource('auth', 'AuthController');
    Route::get('crear-us',[ 'as' => 'crear-us', 'uses' => 'AuthController@store'] );
    Route::resource('persona', 'PersonaController');
    Route::resource('cei', 'CeiController');
    Route::resource('contenido','ContenidoController' );
    Route::resource('formulario', 'FormularioController');
    Route::resource('plantilla', 'PlantillaController');
    Route::resource('opcion', 'OpcionController');
    Route::resource('tipopro', 'TipoProController');
    Route::resource('producto', 'ProductoController');
    Route::resource('tips', 'TipsController');
    Route::resource('abc', 'AbcController');
    Route::resource('tipsbyp', 'TipsByPlantillaController');
    Route::resource('diccionario', 'DiccionarioController');
    Route::get('crear-c',[ 'as' => 'crear-c', 'uses' => 'CursoController@create'] );
    Route::get('crear-n',[ 'as' => 'crear-n', 'uses' => 'NivelController@create'] );
    Route::get('crear-l',[ 'as' => 'crear-l', 'uses' => 'LeccionController@create'] );
    Route::get('cr-p',[ 'as' => 'cr-p', 'uses' => 'PlantillaController@create'] );
    Route::get('cr-pe',[ 'as' => 'cr-pe', 'uses' => 'PersonaController@create'] );
    Route::get('cr-u',[ 'as' => 'cr-u', 'uses' => 'AuthController@create'] );
    Route::get('cr-c',[ 'as' => 'cr-c', 'uses' => 'ContenidoController@create'] );
    Route::get('crear-tp',[ 'as' => 'crear-tp', 'uses' => 'TipoProController@create'] );
    Route::get('editarcontenido/{id}',[ 'as' => 'editar', 'uses' => 'ContenidoController@edit'] );
    Route::get('creartips',[ 'as' => 'crear', 'uses' => 'TipsController@create'] );
    Route::get('crearabc',[ 'as' => 'crearabc', 'uses' => 'AbcController@create'] );
    Route::get('editartips/{id}',[ 'as' => 'editar', 'uses' => 'TipsController@edit'] );
    Route::get('editarabc/{id}',[ 'as' => 'editabc', 'uses' => 'AbcController@edit'] );
    Route::get('creartipsbyp',[ 'as' => 'crear', 'uses' => 'TipsByPlantillaController@create'] );
    Route::get('editartipsbyp/{id}',[ 'as' => 'editar', 'uses' => 'TipsByPlantillaController@edit'] );
    Route::get('crearopcion',[ 'as' => 'crear-o', 'uses' => 'OpcionController@create'] );
    Route::get('editaropcion/{id}',[ 'as' => 'editar', 'uses' => 'OpcionController@edit'] );
    Route::get('nuevapalabra/{id}/{idioma}',[ 'as' => 'nuevapalabra', 'uses' => 'DiccionarioController@create_nueva_palabra'] );
    Route::get('editardiccionario/{id}',[ 'as' => 'editar', 'uses' => 'DiccionarioController@edit'] );
    Route::get('diccionariobyidioma/{id}/{idioma}',[ 'as' => 'diccionario', 'uses' => 'DiccionarioController@diccionariobyidioma'] );
    Route::get('palabrabyidioma',[ 'as' => 'palabra', 'uses' => 'DiccionarioController@palabrabyidioma'] );
    Route::get('buscaidioma',[ 'as' => 'buscaidioma', 'uses' => 'IdiomaController@buscaidioma'] );
    Route::get('buscacurso',[ 'as' => 'buscacurso', 'uses' => 'CursoController@buscacurso'] );
    Route::get('buscanivel',[ 'as' => 'buscanivel', 'uses' => 'NivelController@buscanivel'] );
    Route::get('buscaleccion',[ 'as' => 'buscaleccion', 'uses' => 'LeccionController@buscaleccion'] );
    Route::get('buscaplantilla',[ 'as' => 'buscaplantilla', 'uses' => 'PlantillaController@buscaplantilla'] );
    Route::get('buscacontenido',[ 'as' => 'buscacontenido', 'uses' => 'ContenidoController@buscacontenido'] );
    Route::get('buscatipo_p',[ 'as' => 'buscatipo_p', 'uses' => 'TipoProController@buscatipopro'] );
    Route::post('buscapro',[ 'as' => 'buscapro', 'uses' => 'ProductoController@buscapro'] );
    Route::post('ventascarr',[ 'as' => 'ventascarr', 'uses' => 'ProductoController@ventascarr'] );
    Route::resource('tipo_examen', 'TipoExamenController');
    Route::get('editar-examen-ejercicio/{id_examen}/{id}',[ 'as' => 'edit-e-e', 'uses' => 'EjercicioController@editar_examen_ejercicio'] );
    Route::resource('examen', 'ExamenController');
    Route::get('crear-examen',[ 'as' => 'crear-examen', 'uses' => 'ExamenController@create'] );
    Route::resource('ejercicio', 'EjercicioController');
    Route::get('crear-ejercicio',[ 'as' => 'crear-ejercicio', 'uses' => 'EjercicioController@create_ej'] );
    Route::get('edit-e/{id_examen}/{id_ejercicio}',[ 'as' => 'edit-e', 'uses' => 'EjercicioController@edit'] );
    Route::get('editar-examen-ejercicio/{id_examen}/{id}',[ 'as' => 'edit-e-e', 'uses' => 'EjercicioController@editar_examen_ejercicio'] );
    Route::resource('tipo_ejercicio', 'TipoEjercicioController');
    Route::resource('promocion', 'PromocionController');
    Route::get('agregar_curso',[ 'as' => 'agregar_curso', 'uses' => 'PromocionController@agregar_curso'] );
    Route::get('agregar_paquete',[ 'as' => 'agregar_paquete', 'uses' => 'PromocionController@agregar_paquete'] );
    Route::get('lista_curso/{id_promocion}',[ 'as' => 'lista_curso', 'uses' => 'PromocionController@lista_curso'] );
    Route::get('lista_paquete/{id_promocion}',[ 'as' => 'lista_paquete', 'uses' => 'PromocionController@lista_paquete'] );
    Route::get('editar-promocion-paquete/{id_promocion}/{id_pr_pa}',[ 'as' => 'edit-p-p', 'uses' => 'PromocionController@editar_promocion_paquete'] );
    Route::get('editar-promocion-curso/{id_promocion}/{id_pr_c}',[ 'as' => 'edit-p-c', 'uses' => 'PromocionController@editar_promocion_curso'] );
    Route::resource('paquete', 'PaqueteController');
    ////////////////////////////////////////////////// PROMOCIÓN ///////////////////////////////////////////////
    Route::resource('promocion', 'PromocionController');
    Route::get('crear-promo',[ 'as' => 'crear-promo', 'uses' => 'PromocionController@create'] );
    Route::post('crear_pr',[ 'as' => 'crear_pr', 'uses' => 'PromocionController@store'] );
    Route::get('agregar_curso',[ 'as' => 'agregar_curso', 'uses' => 'PromocionController@agregar_curso'] );
    Route::get('agregar_paquete',[ 'as' => 'agregar_paquete', 'uses' => 'PromocionController@agregar_paquete'] );
    Route::post('lista_c',[ 'as' => 'lista_c', 'uses' => 'PromocionController@lista_curso'] );
    Route::get('lista_paquete/{id_promocion}',[ 'as' => 'lista_paquete', 'uses' => 'PromocionController@lista_paquete'] );
    Route::get('editar-promocion-paquete/{id_promocion}/{id_pr_pa}',[ 'as' => 'edit-p-p', 'uses' => 'PromocionController@editar_promocion_paquete'] );
    Route::get('editar-promocion-curso/{id_promocion}/{id_pr_c}',[ 'as' => 'edit-p-c', 'uses' => 'PromocionController@editar_promocion_curso'] );
    Route::post('buscar_p',[ 'as' => 'buscar_p', 'uses' => 'PromocionController@buscar_p'] );
    Route::post('elimi_promo',[ 'as' => 'elimi_promo', 'uses' => 'PromocionController@eliminar_promo'] );
    Route::post('mod_pro_pa',[ 'as' => 'mod_pro_pa', 'uses' => 'PromocionController@modificar_promo'] );
    Route::post('mod_pro',[ 'as' => 'mod_pro', 'uses' => 'PromocionController@modificar_promocion'] );
    /////////////////////////////////////////////// PRODUCTOS ///////////////////////////////////////////////////
    Route::resource('tipo_pago', 'TipoPagoController');
    Route::resource('tipo_tarjeta', 'TipoTarjetaController');
    Route::resource('limite_transacciones', 'LimiteTransaccionesController');
    Route::get('crear-limite',[ 'as' => 'crear_limite', 'uses' => 'LimiteTransaccionesController@store'] );
    Route::get('crear-tarjeta',[ 'as' => 'crear_tarjeta', 'uses' => 'TipoTarjetaController@store'] );
    Route::get('crear-pago',[ 'as' => 'crear_pago', 'uses' => 'TipoPagoController@store'] );
    Route::resource('categoria', 'CategoriaController');
    // Password Reset Routes...
    #Route::resource('product', 'ProductController', ['only' => ['index', 'show']]);
    Route::resource('product','ProductController');
    Route::resource('venta','VentaController');
    Route::get('venta-d/{id}',[ 'as' => 'venta-d', 'uses' => 'VentaController@venta_detalle'] );
    Route::get('product-c/{id_categoria}/{id}',[ 'as' => 'product-c', 'uses' => 'ProductController@show'] );
    Route::post('almacenar_cart/{id}', 'CartController@addItem')->name('addProduct');
    Route::delete('eliminar-producto/{id}', 'CartController@destroy')->name('destroyProduct');
    #Route::resource('shop', 'ShopController', ['only' => ['index']]);
    Route::get('shop/{id}', 'ShopController@index');
    Route::resource('categoria', 'CategoriaController');
    Route::get('checkout', 'CartController@getCheckout')->name('checkout');
    Route::post('checkoutp', 'CartController@postCheckout')->name('cart.checkout');
    #Route::resource('cart', 'CartController', ['only' => ['index', 'store','update','destroy']]);
     #Route::resource('cart', 'CartController', ['only' => ['index', 'store','update','destroy']]);
    Route::resource('cart', 'CartController');
    Route::delete('emptyCart', 'CartController@emptyCart');
    Route::post('switchToWishlist/{id}', 'CartController@switchToWishlist');
    Route::resource('wishlist', 'WishlistController');
    Route::delete('emptyWishlist', 'WishlistController@emptyWishlist');
    Route::post('switchToCart/{id}', 'WishlistController@switchToCart');
    
 

Route::get('paywithpaypal', array(
    'as' => 'paywithpaypal',
    'uses' => 'PaymentController@index',
));
#Route::post('paypal', 'PaymentController@payWithpaypal');
#Route::get('paywithpaypal', 'PaymentController@index');
// route for check status of the payment
#Route::get('status', 'PaymentController@getPaymentStatus');

Route::post('paypal', array(
    'as' => 'paypal',
    'uses' => 'PaymentController@payWithpaypal',
));

Route::post('paypal_list', array(
    'as' => 'paypal_list',
    'uses' => 'PaymentController@payWithpaypal_list',
));

Route::get('paypal/status', array(
    'as' => 'paypal.status',
    'uses' => 'PaymentController@getPaymentStatus',
));
#-----------------------------------


Route::resource('tipo_pago', 'TipoPagoController');
#Route::get('tipo-pago',[ 'as' => 'crear_pago', 'uses' => 'TipoPagoController@create'] );


Route::resource('tipo_tarjeta', 'TipoTarjetaController');

Route::resource('limite_transacciones', 'LimiteTransaccionesController');

Route::get('crear-limite',[ 'as' => 'crear_limite', 'uses' => 'LimiteTransaccionesController@store'] );


Route::get('crear-tarjeta',[ 'as' => 'crear_tarjeta', 'uses' => 'TipoTarjetaController@store'] );


Route::get('crear-pago',[ 'as' => 'crear_pago', 'uses' => 'TipoPagoController@store'] );

});

Route::group(['prefix' => 'cliente'], function () {
  // Login Routes...
    Route::get('/login', ['as' => 'cliente.login', 'uses' => 'ClienteAuth\LoginController@showLoginForm']);
    Route::post('/login', ['as' => 'cliente.login.post', 'uses' => 'ClienteAuth\LoginController@login'])->name('login');
    Route::post('/logout', ['as' => 'cliente.logout', 'uses' => 'ClienteAuth\LoginController@logout']);

    //
    //Route::post('cliente.logeo', [ 'as' => 'cliente.log', 'uses' => 'ClienteAuth\LoginController@postLogin']);

    //Route::post('lamina', 'LaminaController');
    Route::post('nivel',[ 'as' => 'nivel', 'uses' => 'LaminaController@mostrar'] );
    Route::post('nivel_1',[ 'as' => 'nivel_1', 'uses' => 'LaminaController@mostrar_curso'] );
    Route::post('cursos_gratis',[ 'as' => 'cursos_gratis', 'uses' => 'LaminaController@cursos_gratis'] );
    Route::post('log_cliente',[ 'as' => 'log_cliente', 'uses' => 'LaminaController@log_cliente'] );
    //prueba//
    Route::post('view',[ 'as' => 'view', 'uses' => 'LaminaController@ver'] );
    Route::post('vista',[ 'as' => 'vista', 'uses' => 'LaminaController@ver'] );
    Route::post('view_1',[ 'as' => 'view_1', 'uses' => 'LaminaController@ver_1'] );
    Route::post('view_2',[ 'as' => 'view_2', 'uses' => 'LaminaController@ver_2'] );
    Route::post('view_3',[ 'as' => 'view_3', 'uses' => 'LaminaController@ver_3'] );
    Route::get('/prueba', 'LaminaController@show')->name('leccion1');
    Route::resource('lamina', 'LaminaController');

       //ruta de prueba para los li
       Route::get('/', 'Controller@viewwHome')->name('vieww.home');
       Route::post('QuienesSomos',[ 'as' => 'quienes', 'uses' => 'Controller@mostrarQuienes'] );
       Route::post('Diferente',[ 'as' => 'diferente', 'uses' => 'Controller@mostrarDiferente'] );
       Route::post('Tienda',[ 'as' => 'tienda', 'uses' => 'Controller@mostrarTienda'] );
       Route::post('Galeria',[ 'as' => 'galeria', 'uses' => 'Controller@mostrarGaleria'] );
       //Route::get('/quienes', array('before' => 'auth','uses'=>'Controller@ViewwQuienes'))->name('vieww.quienes');

        //ruta para modificar datos de cliente
        Route::get('./home', 'ClienteController@viewCliente')->name('view.cliente');

        Route::get('/editCliente/{id}', 'ClienteController@editarCliente')->name( 'editar.cliente');

        Route::post('/update_cliente/{id}', 'ClienteController@updateCliente')->name('update.cliente');

// Registration Routes...admin.
    Route::get('/register', ['as' => 'cliente.register', 'uses' => 'ClienteAuth\RegisterController@showRegistrationForm']);
    Route::post('/register', ['as' => 'cliente.register.post', 'uses' =>'ClienteAuth\RegisterController@register']);




});
