@extends('componentes.footer3')
@extends('componentes.headerlogout1')
@section('content')
<!--contenido 3 columnas++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<section id="fondohome">
            <div class="section-row-home" >

                <div class="col-lg-1 div-nav-menu">
                    <nav class="navmenu" style="padding-top:25px;">
                        <ul>
                            <li class="has-subnav">
                                <a href="" data-toggle="collapse" aria-expanded="false"><i class="fa"><img width="65%" style="margin-top:5px;" src="{{ asset('/storage/contenido/'.$photo)}}"></i>
                                    <span class="" style="margin-top:15px;">
                                        {{ $nombre }}
                                    <input type="hidden" id="clienteUser" value="">
                                    </span>
                                </a>
                            </li>
                            <hr>

                            <form name="nivel" method="post" action="{{route ('nivel')}}">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="post">
                            <input name="usuario" type="hidden" value="{{ $nombre }}">

                            <li class="has-subnav">
                            </li>
                            </form>



                                @foreach($niveles as $row)
                                <li class="has-subnav">
                                    <a  href="#z" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="faa"><img width="55%" src="/assets_f/src/img/n1-png.png"></i>
                                        <button type="submit" class="btn btn-link" style="color: #17909C; text-decoration:none;">
                                            {{$row->nombre}}
                                        </button>
                                    </a>
                                    @foreach($lecciones as $row)
                                        <ul class="collapse list-unstyled" id="z">
                                            <li><a style="color:primary" href="#"> </a></li>
                                            <form  method="POST" action="{{ route('nivel_1') }}">
                                                <input name="_method" type="hidden" value="POST">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
                                                <input type="hidden" name="id_cur" value="{{$curso[0]->id_curso}}">
                                                  <li>
                                                    <button type="submit" class="btn btn-link" style="color: #17909C; text-decoration:none;">
                                                        {{$row->nombre}}
                                                    </button>
                                                  </li>
                                                  <li>
                                                    <button type="submit" class="btn btn-link" style="color: #17909C; text-decoration:none;">
                                                        {{$row->descripcion}}
                                                    </button>
                                                  </li>
                                                <input type="hidden" name="id_curso" value="'+value.id_curso+'"> </form>
                                            </ul>
                                        @endforeach

                                </li>
                                @endforeach


                        </ul>
                        <hr>
                    </nav>
                </div>

                <div class="col-lg-11">

<div class="row justify-content-center">
    <h1 class="linksmenu" style="margin-top:50px; margin-left:-80px;">{{$curso[0]->nombre}}</h1>
</div>

<div class="row">
  <div class="col-md-12 col-lg-11" >
    <ul class="ch-grid" >
      <li>
        <div class="ch-item-2 ch-img-1" style="margin-left:-40%;">
          <div class="ch-info-2-wrap">
            <div class="ch-info-2">
              <div class="ch-info-2-front ch-img-1">
              </div>
              <div class="ch-info-2-back">
                <h3>Usted tiene un avance de:</h3>
                <h2>0%</h2>
                <p>
                <button type="button" data-toggle="modal"  data-target="#prueba">mas info</button>
                  <a href="#">Comenzar</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </li>
      <li>
        <div class="ch-item-2 ch-img-1-1" style="margin-left:40%;" >
          <div class="ch-info-2-wrap">
            <div class="ch-info-2">
              <div class="ch-info-2-front ch-img-1-1">
              </div>
              <div class="ch-info-2-back">
                <h3>Usted tiene un avance de:</h3>
                <h2>0%</h2>
                <p>
                <button type="button" data-toggle="modal"  data-target="#prueba2">mas info</button>
                  <a href="#">Comenzar</a>
                </p>
              </div>
            </div>
          </div>
        </div>
        <!--
        <div class="ch-item-1">
          <div class="ch-info-1">
            <h3>Usted tiene un avance de:</h3>
            <h2>0%</h2>
            <p> <button type="button" data-toggle="modal"  data-target="#prueba2">mas info</button>
            </p>
          </div>
          <div class="ch-thumb ch-img-1-1"></div>
        </div>-->
      </li>
    </ul>
  </div>

    <div class="col-md-12 col-lg-12">

      <ul class="nav flex-column"style="margin-top:100px;">
        <li class="nav-items text-center">
            <span class="float-center nav-link linksmenu"  ><h5>Progreso:</h5></span>
        </li>
        <div class="progress" style="height:30px">
          <div class="progress-bar bg-success progress-bar-striped " role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:100%">
              70%
          </div>
        </div>
      </ul>

      <!--calendario------------
      <div style="margin-right:-100px; margin-top:-30px;" id="calendar">
      </div>-->
    </div>

</div>

<div class="row">
  <!--<div class="container">
    <div class="card">
      <div class="front">
        <div class="contentfront">
          <div class="month">
            <table>
              <tr class="orangeTr">
                <th>M</th>
                <th>T</th>
                <th>W</th>
                <th>T</th>
                <th>F</th>
                <th>S</th>
                <th>S</th>
              </tr>
              <tr class="whiteTr">
                <th></th>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th>5</th>
                <th>6</th>
              </tr>
              <tr class="whiteTr">
                <th>7</th>
                <th>8</th>
                <th>9</th>
                <th>10</th>
                <th>11</th>
                <th>12</th>
                <th>13</th>
              </tr>
              <tr class="whiteTr">
                <th>14</th>
                <th>15</th>
                <th>16</th>
                <th>17</th>
                <th>18</th>
                <th>19</th>
                <th>20</th>
              </tr>
              <tr class="whiteTr">
                <th>21</th>
                <th>22</th>
                <th>23</th>
                <th>24</th>
                <th>25</th>
                <th>26</th>
                <th>27</th>
              </tr>
              <tr class="whiteTr">
                <th>28</th>
                <th>29</th>
                <th>30</th>
                <th>31</th>
                <th></th>
                <th></th>
                <th></th>
              </tr>
            </table>
          </div>
          <div class="date">
            <div class="datecont">
              <div id="date"></div>
              <div id="day"></div>
              <div id="month"></div>
              <i class="fa fa-pencil edit" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="back">
        <!---<div class="contentback">
          <div class="backcontainer">
            hhh
          </div>
        </div>--zz->
      </div>
    </div>
  </div>-->



</div>
</div>

</div>
</section>
<!--seccion de la informacion de los cursos+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->


<!--SECCION DE LAS PLANTILLAS DE EJERCICIOS 1++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<!--<section id="fondoexamen">
  <div class="section-row-home" >

  <div class="col-lg-1 div-nav-menu">
  <nav class="navmenu" style="padding-top:25px;">
  <ul>
  <li class="has-subnav">
  <a href="" data-toggle="collapse" aria-expanded="false"><i class="fa"><img width="65%" src="{{ asset('/storage/contenido/'.$photo)}}"></i>
  <span class="nav-text">
  <input type="hidden" id="clienteUser" value="">
  </span>
  </a>
  </li>
  <hr>
  <form name="nivel" method="post" action="">
  {{ csrf_field() }}
  <input name="_method" type="hidden" value="post">
  <input name="usuario" type="hidden" value="">
  <li class="has-subnav">
  </li>
  </form>
  <li class="has-subnav">
  <a  href="#z" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="faa"><img width="55%" src="/assets_f/src/img/icono15.png"></i>
  <span class="nav-text">
  Mis Regalos
  </span>
  </a>
  <ul class="collapse list-unstyled" id="z">
  </ul>
  </li>
  </ul>
  <hr>
  </nav>
  </div>

  <div class="tele col-xl-5 col-lg-2">
  <div class="ejercice">
  <div class="section-row-dibujo">
  <div class="row">

  <div class="col-lg-12 ">
  <div class="row">
  <div class="col-lg-2"></div>
  <div class="col-lg-4 " style="margin-top:30px;">
  <a class="btn btn-danger btn-lg" href="">audio</a>
  <img src="/assets_f/src/img/logo.png" class="logo" width="50%" >
  </div>
  <div class="col-lg-2" style="margin-top:30px;">
  <h2 class=""style="color:#d21e62; margin-top:10px;">cat  /kät/ gato</h2>
  </div>
  </div>

  <div class="container" style="margin-top:30px;">
  <div class="input-group" style="padding-bottom:20px;">
  <input id="name" class="form-control" type="text" placeholder="Nombre" name="name" value="Ese cat era de mi tía Pepa" disabled>
  </div>
  <div class="input-group" style="padding-bottom:20px;">
  <input id="last_name" class="form-control" type="text"  placeholder="Apellido" name="last_name" value="Uy no, un cat de plástico , no no." disabled>
  </div>
  <div class="input-group" style="padding-bottom:20px;">
  <input id="email" class="form-control" type="email" placeholder="Email" name="email" value="Quiero un cat mami" disabled>
  </div>
  <div class=" text-center"style="margin-top:30px;">
  <a class="btn btn-danger btn-lg" href="">audio</a>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
</section>-->
<!--SECCION DE LAS PLANTILLAS DE EJERCICIOS 1++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->


<!--SECCION DE LAS PLANTILLAS DE EJERCICIOS 2++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<!--<section id="fondoexamen">
<div class="section-row-home" >

<div class="col-lg-1 div-nav-menu">
 <nav class="navmenu" style="padding-top:25px;">
   <ul>
     <li class="has-subnav">
       <a href="" data-toggle="collapse" aria-expanded="false"><i class="fa"><img width="65%" src="{{ asset('/storage/contenido/'.$photo)}}"></i>
         <span class="nav-text">
         <input type="hidden" id="clienteUser" value="">
         </span>
       </a>
     </li>
     <hr>
     <form name="nivel" method="post" action="">

       <input name="_method" type="hidden" value="post">
       <input name="usuario" type="hidden" value="">
       <li class="has-subnav">
       </li>
     </form>
     <li class="has-subnav">
       <a  href="#z" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="faa"><img width="55%" src="./img/icono15.png"></i>
         <span class="nav-text">
           Mis Regalos
         </span>
       </a>
       <ul class="collapse list-unstyled" id="z">
       </ul>
     </li>
   </ul>
   <hr>
 </nav>
</div>

<div class="tele col-xl-5 col-lg-2">
    <div class="ejercice">
        <div class="section-row-dibujo">
            <div class="row">

                <div class="col-lg-12 ">
                    <div class="row">
                        <div class="col-lg-1">
                        </div>
                        <div class="col-lg-4 " style="margin-top:30px;">
                            <img src="./img/logo.png" class="logo" width="50%" >
                            <a class="btn btn-danger btn-lg" href="">audio</a>
                        </div>
                        <div class="col-lg-6" style="margin-top:30px;">
                            <h5 class=""style="color:#d21e62; margin-top:10px;">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officia numquam vitae placeat doloremque eius, itaque facilis ad voluptas autem rerum error, vel mollitia a necessitatibus amet nemo nam harum commodi!</h5>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-2">
                            <img src="./img/logo.png" class="logo" style="margin-top:30px;" width="100%" >
                        </div>
                        <div class="container" style="margin-top:30px;">
                            <div class="input-group" style="padding-bottom:20px;">
                                <input id="" class="form-control" type="text" placeholder="rellenar aca" name="texto" value="" >
                            </div>
                            <div class="input-group" style="padding-bottom:20px;">
                                <input id="" class="form-control" type="text"  placeholder="rellenar aca" name="texto" value="" >
                            </div>
                            <div class="input-group" style="padding-bottom:20px;">
                                <input id="" class="form-control" type="text" placeholder="rellenar aca" name="texto" value="" >
                            </div>
                            <div class="input-group" style="padding-bottom:20px;">
                                <input id="" class="form-control" type="text" placeholder="rellenar aca" name="texto" value="" >
                            </div>
                            <div class=" text-center"style="margin-top:30px;">
                                <h2 class=""style="color:#d21e62; margin-top:10px;">cat  /kät/ gato</h2>
                            </div>
                        </div>
                        <div class="col-lg-1" style="margin-top:30px;">
                            <img src="./img/logo.png" class="logo" style="margin-top:30px;" width="100%" >
                            <img src="./img/logo.png" class="logo" style="margin-top:30px;" width="100%" >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</section>-->

<!--SECCION DE LAS PLANTILLAS DE EJERCICIOS 2++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
@endsection
