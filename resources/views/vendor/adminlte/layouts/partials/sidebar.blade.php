<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('home') }}"><i class="fas fa-home"></i> <span>{{ trans('adminlte_lang::message.home') }}</span></a></li>
            @hasrole('super-admin')
                <li><a href="{{ route('auth.show',0) }}"><i class='fa fa-users'></i> <span>Usuario</span></a></li>
            @endrole
            <li class="treeview">
                    <a href="#"><i class="fas fa-id-card-alt"></i> <span>Gestión Usuario</span> <i class="fa fa-angle-left pull-right"></i></a>
                    @hasrole('writer')
                        <ul class="treeview-menu">
                            <li><a href="{{ route('auth.edit',auth()->user()->id) }}">Usuario</a></li>
                        </ul>
                    @endrole
                <a href="#"><i class='fa fa-book'></i> <span>Administrar</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('product.index') }}">Productos</a></li>
                    <li><a href="{{ route('promocion.index') }}">Promoción</a></li>
                    <li><a href="{{ route('paquete.index') }}">Paquetes</a></li>
                    <li><a href="{{ route('idioma.index') }}">Idioma</a></li>
                    <li><a href="{{ route('curso.index') }}">Curso</a></li>
                    <li><a href="{{ route('nivel.index') }}">Nivel</a></li>
                    <li><a href="{{ route('leccion.index') }}">Lección</a></li>
                    <li><a href="{{ route('plantilla.index') }}">Plantillas</a></li>
                    <li><a href="{{ route('contenido.index') }}">Contenido</a></li>

                    <li><a href="{{ route('categoria.index') }}">Productos Clientes</a></li>
                    <li><a href="{{ route('product.index') }}">Productos Back-Office</a></li>

                    <li><a href="{{ route('limite_transacciones.index') }}">Limite Transacciones</a></li>

                    <li><a href="{{ route('tipo_tarjeta.index') }}">Tipo Tarjeta</a></li>

                    <li><a href="{{ route('tipo_pago.index') }}">Tipo Pago</a></li>





                    <li  data-toggle="collapse" data-target="#idiomas" class="collapsed">
                            <a href="{{ route('categoria.index') }}"><i class="glyphicon glyphicon-bookmark"></i>
                                 Categorias Productos - Clientes
                            </a>
                        </li>

                    <li>
                         <a href="{{ route('cart.index') }}"><i class="glyphicon glyphicon-shopping-cart"></i>
                    <span class="badge pull-right">{{Cart::count()}}</span>
                         Carrito
                                     </a>
                         </li>

                           <li>
                         <a href="{{ route('wishlist.index') }}"><i class="glyphicon glyphicon-heart"></i>
                    <span class="badge pull-right">{{ Cart::instance('wishlist')->count()}}</span>
                         Wishlist
                                     </a>
                         </li>

                    <li><a href="{{ route('venta.index') }}">Reporte Ventas</a></li>


                </ul>

            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
