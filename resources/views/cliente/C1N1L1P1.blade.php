@extends('componentes.footer3')
@extends('componentes.headerlogout1')
@section('content')
<!--contenido 3 columnas+++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <section id="fondoc1">
        <div class="section-row-home">
            <div class="col-lg-1 div-nav-menu">
                <nav class="navmenu2" style="padding-top:25px;">
                    <ul>
                        <li class="has-subnav">
                            <a href="" data-toggle="collapse" aria-expanded="false"><i class="fa"><img width="65%" style="margin-top:5px;" src="/assets_f/src/img/avatar1.png"></i>
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

                        <li class="has-subnav">
                            <a  href="#z" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i></i>
                                @foreach($niveles as $row)
                                    <button type="submit" class="btn btn-link" style="color: #17909C; text-decoration:none;">
                                        {{$row->nombre}}
                                    </button>
                                @endforeach
                            </a>
                            <ul class="collapse list-unstyled" id="z">
                                @foreach($lecciones as $row)
                                    <li><a style="color:primary" href="#"> </a></li>
                                    <form  method="POST" action="{{ route("nivel") }}">
                                        <input name="_method" type="hidden" value="POST">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
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
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                    <hr>
                </nav>
            </div>
        @if($plantilla[0]->tipo_plantilla==3)

            <div class="tele col-xl-5 col-lg-5">
                <div class="miscrollspy"  id='div2' data-spy="scroll" data-target="#spy">
                    @php($a=0)
                    @foreach($contenido as $row)
                    @if ( ($row->id_tipo_con  == 2 || $row->id_tipo_con  == 6)  && $a == 0 )
                        <div id="t1" class="mb-2" style="display:none;">
                            <p id="titulo"></p>
                        </div>
                        <div id="scroll1" class="contenido p-3" style="text-align: justify;">
                            <p id="maquinas" ></p>
                        </div>
                        <div id="s1" style="display:none;">

                        </div>
                    @php($a++)
                </div>

                @endif
              @if($row->id_tipo_con  == 1)
            </div>

            <div class="tele col-xl-6 col-lg-6">
                <div class="video1" id="div2" style="">
                    <span style="color:#ff0000;">(Video Introductorio)</span>
                    <video class="" id="miVideo" src={{ asset('/storage/contenido/'.$row->ruta) }}></video>
                    <button class="btn boton-video" data-toggle="tooltip2" title="reproducir" id="boton-play" onclick="playPause('maquinas','{{$row->parrafo}}',1000,{{$parrafo}})"><i class="fa fa-play"></i></button>
                    <button class="btn boton-video" data-toggle="tooltip2" title="recargar" onclick="reload()"><i class="fa fa-sync-alt"></i></button>
                    <button class="btn boton-video" data-toggle="tooltip2" title="maximizar" id="fullscreen"><i class="fa fa-arrows-alt"></i></button>
                </div>
                @endif
                @endforeach


            </div>
          @endif

          @if($plantilla[0]->tipo_plantilla==1)
          <div class="tele col-xl-5 col-lg-5">
              <div class="miscrollspy"  id='div2' data-spy="scroll" data-target="#spy">
                  @php($a=0)
                  @foreach($contenido as $row)
                  @if ( ($row->id_tipo_con  == 2 || $row->id_tipo_con  == 6 || $row->id_tipo_con  == 4 || $row->id_tipo_con  == 3)  )
                       @if($row->id_tipo_con  == 2)
                            <div id="t1" class="mb-2 text-center" style="display:block; font-size:{{$row->tamano}}px;font-weight:900;color:{{$row->color}};">
                                <p id="titulo"> {{$row->parrafo}} </p>
                            </div>
                       @endif
                       @if($row->id_tipo_con  == 3)
                            <div class="row text-center" style="display:block;">
                                <img class="img-fluid" style="width:200px;height:200px;" src="/storage/contenido/{{$row->ruta}}">

                            </div>
                       @endif
                       @if($row->id_tipo_con  == 6)
                          <div id="s1" style="display:block;">
                            <div class="text-center" style="margin-top: 10px;" >
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12" style="font-size:{{$row->tamano}}px;font-weight:700;color:{{$row->color}};">
                                        <p id="" >
                                            {{$row->parrafo}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                          </div>
                      @endif
                      @if($row->id_tipo_con  == 4)
                        @if($a==0)
                          <div id="s2" style="display:block;">
                            <div class="text-center" style="margin-top: 10px;" >
                                <div class="row">
                          @php($a++)
                        @endif
                            <div class="text-center col-xl-4 col-lg-4" style="font-size:{{$row->tamano}}px;font-weight:900;color:{{$row->color}};">
                              <p class="text-center" id="" >
                                  {{$row->parrafo}}
                              </p>
                            </div>
                      @endif
              @endif
            @if($row->id_tipo_con  == 1)
                      </div>
                  </div>
                </div>
            </div>

        </div>

            <div class="tele col-xl-6 col-lg-6">
              <div class="video1" id="div2" style="">
                  <span style="color:#ff0000;">(Video Introductorio)</span>
                  <video class="" id="miVideo" src={{ asset('/storage/contenido/'.$row->ruta) }}></video>
                  <button class="btn boton-video" data-toggle="tooltip2" title="reproducir" id="boton-play" onclick="playPause()"><i class="fa fa-play"></i></button>
                  <button class="btn boton-video" data-toggle="tooltip2" title="recargar" onclick="reload()"><i class="fa fa-sync-alt"></i></button>
                  <button class="btn boton-video" data-toggle="tooltip2" title="maximizar" id="fullscreen"><i class="fa fa-arrows-alt"></i></button>
              </div>
              @endif
              @endforeach
              <div class="d-lg-none"  style="padding-top:25px;">
                  <button class="btn btn-xs boton-sig-atras" style="" onclick="history.back(-1)"><img src="../assets_f/src/img/anterior.png" alt="" width="40px"></button>
                  <div style="float:right;">
                      <form  method="post" action="{{route ('view')}}">
                          {{ csrf_field() }}
                          <input name="_method" type="hidden" value="post">
                          <input name="usuario" type="hidden" value="{{ $nombre }}">

                          <input name="pagina" type="hidden" value="{{ $plan[0]->pagina }}">
                          <button type="submit" class="btn btn-sm boton-sig-atras" style=""><img src="../assets_f/src/img/siguiente.png" width="40px"></button>
                      </form>
                  </div>
              </div>

          </div>
        @endif
        <div class="conta sig-atras-video">
            <div class="container">
                <div class="row barra-prog">

                    <div class="col-1 col-lg-1">
                        <button class="btn btn-sm boton-sig-atras" onclick="history.back(-1)"><img src="../assets_f/src/img/anterior.png" ></button>
                    </div>

                    <div class="col-10 col-lg-10 d-none d-md-block">
                        <div class="progress">
                            <div class="progress-bar bg-success progress-bar-striped" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                                70%
                            </div>
                        </div>
                    </div>

                    <div class="col-10 d-md-none " >
                        <div class="progress barraprogreso">
                            <div class="progress-bar bg-success progress-bar-striped" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:80%">

                            </div>
                        </div>
                    </div>

                    <div class="col-1 col-lg-1">
                        <form  method="post" enctype='multipart/form-data' action="{{route ('view')}}">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="post">
                            <input name="usuario" type="hidden" value="{{ $nombre }}">
                            <input name="id_curso" type="hidden" value="{{ $id_curso }}">
                            <input name="pagina" type="hidden" value="{{ $plan[0]->pagina }}">
                            <button type="submit" class="btn btn-sm boton-sig-atras" style=""><img src="../assets_f/src/img/siguiente.png" ></button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
