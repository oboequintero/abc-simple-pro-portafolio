@extends('componentes.headeredit')
@section('content')
<section id="fondohome">
    <div class="section-row-home"> 

        <div class="col-md-12 text-center">
            <img src="/assets_f/src/img/logo.png" class="logo" width="10%" style="margin-top:50px;">
            <h2 class="h2-text-footer2"style="color:#d21e62; margin-top:10px;">Modificar Datos</h2>
        </div>
        <div class="col-md-12 ">
            <form class="form-inline" action="{{ route('update.cliente', $cliente->id) }}" enctype="multipart/form-data" method="POST">
                {{ csrf_field() }}
                <div class="container" align="center">

                    <input name="id" id="id" type="hidden" value="{{$cliente->id}}">

                    <div class="abc-user-image" style="text-align:center; margin-top:10px; padding-bottom:15px;">
                        <img class="img-circle elevation-2" src="{{ asset('/storage/contenido/'.$cliente->photo1)}}" alt="User Avatar" width="15%">
                        <input class="form-control" name="photo" id="photo" type="file" value="{{$cliente->photo1}}">
                    </div>

                    <label for="first_name" class="label-index-form">Nombre: </label>
                    <div class="input-group col-md-6 text-center" style="padding-bottom:5px;">
                        <input id="name" class="form-control" type="text" placeholder="Nombre" name="name" value="{{$cliente->name}}">
                    </div>

                    <label for="first_name" class="label-index-form">Apellido: </label>
                    <div class="input-group col-md-6 text-center" style="padding-bottom:5px;">
                        <input id="last_name" class="form-control" type="text"  placeholder="Apellido" name="last_name" value="{{$cliente->last_name}}">
                    </div>

                    <label for="first_name" class="label-index-form">Email: </label>
                    <div class="input-group col-md-6 text-center" style="padding-bottom:5px;">
                        <input id="email" class="form-control" type="email" placeholder="Email" name="email" value="{{$cliente->email}}">
                    </div>

                    <label for="first_name" class="label-index-form">Nro de idetidad: </label>
                    <div class="input-group col-md-6 text-center" style="padding-bottom:5px;">
                        <input id="documento" class="form-control" type="text" placeholder="documento" name="documento" value="{{$cliente->documento}}">
                    </div>

                    <label for="first_name" class="label-index-form">Nacimiento: </label>
                    <div class="input-group col-md-6 text-center" style="padding-bottom:5px;">
                        <input id="fecha_nac" class="form-control" type="date" placeholder="nacimiento" name="fecha_nac" value="{{$cliente->fecha_nac}}">
                    </div>

                    <label for="first_name" class="label-index-form">Telefono: </label>
                    <div class="input-group col-md-6 text-center" style="padding-bottom:5px;">
                        <input id="phone" class="form-control" type="text" placeholder="Telefono" name="phone" value="{{$cliente->phone}}">
                    </div>

                    <!--<div class="input-group" style="padding-bottom:5px;">
                        <input id="password" class="form-control" type="text" placeholder="Contrasena" name="password" id="password" value="">
                    </div>-->


                    <a class="btn btn-danger btn-lg" href="{{route('view.cliente')}}">Atras</a>
                    <button class="btn btn-success btn-lg" type="submit">Actualizar</button>
                    
                    
                </div>
            </form>
        </div>
    </div>

</section>

@endsection