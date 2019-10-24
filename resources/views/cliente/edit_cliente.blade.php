@extends('componentes.headeredit')
@section('content')
<section id="fondohome">
    <div class="section-row-home" > 

        <div class="col-md-12 text-center">
            <img src="/assets_f/src/img/logo.png" class="logo" width="10%" style="margin-top:50px;">
            <h2 class="h2-text-footer2"style="color:#d21e62; margin-top:10px;">Modificar Datos</h2>
        </div>
        <div class="col-md-12" >
            <form class="form-inline" action="{{ route('update.cliente', $cliente->id) }}" enctype="multipart/form-data" method="POST">
                {{ csrf_field() }}
                <div class="container" align="center" style="background-color:#fff; padding:20px; border-radius:5px;">

                    <input name="id" id="id" type="hidden" value="{{$cliente->id}}">

                    <div class="abc-user-image" style="margin-top:10px; padding-bottom:15px;">
                        <img class="img-fluid img-thumbnail" src="{{ asset('/storage/contenido/'.$cliente->photo1)}}" alt="User Avatar" width="150px">
                    </div>
                    <div class="row justify-content-center">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Imagen</span>
                            </div>
                            <input name="photo" id="photo" type="file" class="form-control" value="{{$cliente->photo1}}" >
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-12 col-md-4">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Nombre</span>
                                </div>
                                <input id="name" class="form-control" type="text" placeholder="Nombre" name="name" value="{{$cliente->name}}" >
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Apellido</span>
                                </div>
                                <input id="last_name" class="form-control" type="text"  placeholder="Apellido" name="last_name" value="{{$cliente->last_name}}" >
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-12 col-md-4">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Telefono</span>
                                </div>
                                <input id="phone" class="form-control" type="text" placeholder="Telefono" name="phone" value="{{$cliente->phone}}" >
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Doc de identidad</span>
                                </div>
                                <input id="documento" class="form-control" type="text" placeholder="documento" name="documento"  value="{{$cliente->documento}}" >
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-12 col-md-4">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Email</span>
                                </div>
                                <input id="email" class="form-control" type="email" placeholder="Email" name="email" value="{{$cliente->email}}" >
                            </div>
                        </div>
                    </div>
                    
                    <!--<label for="first_name" class="label-index-form">Nombre: </label>
                    <div class="input-group col-md-6 text-center" style="padding-bottom:5px;">
                        <input id="name" class="form-control" type="text" placeholder="Nombre" name="name" value="{{$cliente->name}}">
                    </div>-->

                    <a class="btn btn-danger btn-lg" href="{{route('view.cliente')}}">Atras</a>
                    <button class="btn btn-success btn-lg" type="submit">Actualizar</button>
                    
                </div>
            </form>
        </div>
    </div>
</section>

@endsection