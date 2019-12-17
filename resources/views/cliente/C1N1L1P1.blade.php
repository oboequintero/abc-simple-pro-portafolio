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
                        <div id="scroll1" >
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
        @if($plantilla[0]->tipo_plantilla==4)
            <div class="tele col-xl-5 col-lg-5">
                <div class="miscrollspy"  id='div2' data-spy="scroll" data-target="#spy">
                    @php($a=0)
                @foreach($contenido as $row)
                    @if ( ($row->id_tipo_con  == 2 || $row->id_tipo_con  == 6) )
                        <div id="t1" class="mr-2 text-center" style="display:block; font-size:{{$row->tamano}}px;font-weight:900;color:{{$row->color}};
                            margin-top: {{$row->margen_superior}}px; margin-left:{{$row->margen_inferior}}px;">
                            <p id="titulo">{{$row->parrafo}}</p>
                        </div>
                    @php($a++)


                @endif
              @if($row->id_tipo_con  == 1)
              </div>
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
        @if($plantilla[0]->tipo_plantilla==5)
            <div class="tele col-xl-11 col-lg-11">
                <div class="miscrollspy"  id='div2' data-spy="scroll" data-target="#spy">
                    @php($a=0)
                @foreach($contenido as $row)
                 @if(($row->id_tipo_con  == 2 || $row->id_tipo_con  == 6)  && $a == 0 )
                        <div id="t1" class="mr-2 text-center" style="display:block; font-size:{{$row->tamano}}px;font-weight:900;color:{{$row->color}};
                            margin-top: {{$row->margen_superior}}px; margin-left:{{$row->margen_inferior}}px;">
                            <p id="titulo">{{$row->parrafo}}</p>
                        </div>
                    @php($a++)
                </div>
                @endif
                @php($a++)
               @endforeach
            </div>
        @endif
        @if($plantilla[0]->tipo_plantilla==7)
        <div class="tele col-xl-11 col-lg-11">
            <div class="miscrollspy"  id='div2' data-spy="scroll" data-target="#spy">
                @php($a=0)
                    @foreach($contenido as $row)
                        @if(($row->id_tipo_con  == 2 || $row->id_tipo_con  == 6) )
                            @if($a==0)
                            <div class="row" style="background-color:#CCE2E2" > <!--1-->
                                <div class="col-xl-4 col-lg-4" >
                                    <div id="" class="mr-2 text-center" style="display:block; font-size:{{$row->tamano}}px;font-weight:900;color:{{$row->color}};
                                        margin-top: {{$row->margen_superior}}px; margin-left:{{$row->margen_inferior}}px;">
                                        <p id="">{{$row->parrafo}}</p>
                                    </div>
                                </div>
                            @endif
                            @if($a==1)
                                <div class="col-xl-3 col-lg-3 border border-white" >
                                    <div id="" class="mr-2 text-center" style="display:block; font-size:{{$row->tamano}}px;font-weight:900;color:{{$row->color}};
                                        margin-top: {{$row->margen_superior}}px; margin-left:{{$row->margen_inferior}}px; border">
                                        <p id="">{{$row->parrafo}}</p>
                                    </div>
                                </div>
                            @endif
                            @if($a==2)
                                <div class="col-xl-2 col-lg-2 border border-white"  >
                                    <div id="" class="mr-2 text-center" style="display:block; font-size:{{$row->tamano}}px;font-weight:900;color:{{$row->color}};
                                        margin-top: {{$row->margen_superior}}px; margin-left:{{$row->margen_inferior}}px;">
                                        <p id="">{{$row->parrafo}}</p>
                                    </div>
                                </div>
                            @endif
                            @if($a==3)
                                <div class="col-xl-3 col-lg-3" >
                                    <div id="" class="mr-2 text-center" style="display:block; font-size:{{$row->tamano}}px;font-weight:900;color:{{$row->color}};
                                        margin-top: {{$row->margen_superior}}px; margin-left:{{$row->margen_inferior}}px;">
                                        <p id="">{{$row->parrafo}}</p>
                                    </div>
                                </div>
                                </div><!--1-->
                            @endif
                            @if($a==4)
                            <div class="row"> <!--1-->
                                <div class="col-xl-3 col-lg-3" style="background-color:white">
                                    <div id="" class="mr-2 text-center" style="display:block; font-size:{{$row->tamano}}px;font-weight:900;color:{{$row->color}};
                                        margin-top: {{$row->margen_superior}}px; margin-left:{{$row->margen_inferior}}px;">
                                        <p id=""></p>
                                    </div>
                                </div>
                            @endif
                            @if($a==5)
                                <div class="col-xl-1 col-lg-1" style="background-color:white">
                                    <div id="" class="mr-2 text-center" style="display:block; font-size:{{$row->tamano}}px;font-weight:900;color:{{$row->color}};
                                        margin-top: {{$row->margen_superior}}px; margin-left:{{$row->margen_inferior}}px;">
                                        <p id="">{{$row->parrafo}}</p>
                                    </div>
                                </div>
                            @endif
                            @if($a==6)
                                <div class="col-xl-3 col-lg-3" style="background-color:white">
                                    <div id="" class="mr-2 text-center" style="display:block; font-size:{{$row->tamano}}px;font-weight:900;color:{{$row->color}};
                                        margin-top: {{$row->margen_superior}}px; margin-left:{{$row->margen_inferior}}px;">
                                        <p id="">{{$row->parrafo}}</p>
                                    </div>
                                </div>
                            @endif
                            @if($a==7)
                                <div class="col-xl-2  col-lg-2" style="background-color:white">
                                    <div id="" class="mr-2 text-center" style="display:block; font-size:{{$row->tamano}}px;font-weight:900;color:{{$row->color}};
                                        margin-top: {{$row->margen_superior}}px; margin-left:{{$row->margen_inferior}}px;">
                                        <p id="">{{$row->parrafo}}</p>
                                    </div>
                                </div>
                            @endif
                            @if($a==8)
                                <div class="col-xl-3 col-lg-3" style="background-color:white">
                                    <div id="" class="mr-2 text-center" style="display:block; font-size:{{$row->tamano}}px;font-weight:900;color:{{$row->color}};
                                        margin-top: {{$row->margen_superior}}px; margin-left:{{$row->margen_inferior}}px;">
                                        <p id="">{{$row->parrafo}}</p>
                                    </div>
                                </div>
                                </div><!--1-->
                                <div class="row"> <!--1-->
                                    <div class="col-xl-3 col-lg-3" style="background-color:white;">
                                        <br>
                                    </div>
                                    <div class="col-xl-1 col-lg-1  border border-white " style="background-color:#CCE2E2;">
                                        <br>
                                    </div>
                                    <div class="col-xl-3 col-lg-3  border border-white " style="background-color:#CCE2E2;">
                                        <br>
                                    </div>
                                    <div class="col-xl-2 col-lg-2  border border-white " style="background-color:#CCE2E2;">
                                        <br>
                                    </div>
                                    <div class="col-xl-3 col-lg-3  border border-white " style="background-color:#CCE2E2;">
                                        <br>
                                    </div>
                                </div> <!--1-->
                            @endif

                            @if($a==9)
                            <div class="row"> <!--1-->
                                <div class="col-xl-3 col-lg-3" style="background-color:white">
                                    <div id="" class="mr-2 text-center" style="display:block; font-size:{{$row->tamano}}px;font-weight:900;color:{{$row->color}};
                                        margin-top: {{$row->margen_superior}}px; margin-left:{{$row->margen_inferior}}px;">
                                        <p id="">1. La “a” se encuentra entre dos consonantes:</p>
                                    </div>
                                </div>
                            @endif
                            @if($a==10)
                                <div class="col-xl-1 col-lg-1" style="background-color:white">
                                    <div id="" class="mr-2 text-center" style="display:block; font-size:{{$row->tamano}}px;font-weight:900;color:{{$row->color}};
                                        margin-top: {{$row->margen_superior}}px; margin-left:{{$row->margen_inferior}}px;">
                                        <p id="">{{$row->parrafo}}</p>
                                    </div>
                                </div>
                            @endif
                            @if($a==11)

                                <div class="col-xl-3 col-lg-3" style="background-color:white">
                                    <div id="" class="mr-2 text-center" style="display:block; font-size:{{$row->tamano}}px;font-weight:900;color:{{$row->color}};
                                        margin-top: {{$row->margen_superior}}px; margin-left:{{$row->margen_inferior}}px;">
                                        <p id="">{{$row->parrafo}}</p>
                                    </div>
                                </div>
                            @endif
                            @if($a==12)

                                <div class="col-xl-2  col-lg-2" style="background-color:white">
                                    <div id="" class="mr-2 text-center" style="display:block; font-size:{{$row->tamano}}px;font-weight:900;color:{{$row->color}};
                                        margin-top: {{$row->margen_superior}}px; margin-left:{{$row->margen_inferior}}px;">
                                        <p id="">{{$row->parrafo}}</p>
                                    </div>
                                </div>
                            @endif
                            @if($a==13)
                                <div class="col-xl-3 col-lg-3" style="background-color:white">
                                    <div id="" class="mr-2 text-center" style="display:block; font-size:{{$row->tamano}}px;font-weight:900;color:{{$row->color}};
                                        margin-top: {{$row->margen_superior}}px; margin-left:{{$row->margen_inferior}}px;">
                                        <p id="">{{$row->parrafo}}</p>
                                    </div>
                                </div>
                                </div><!--1-->
                                <div class="row"> <!--1-->
                                    <div class="col-xl-3 col-lg-3" style="background-color:white;">
                                      <br>
                                    </div>
                                    <div class="col-xl-1 col-lg-1  border border-white " style="background-color:#CCE2E2;">
                                        <br>
                                    </div>
                                    <div class="col-xl-3 col-lg-3  border border-white " style="background-color:#CCE2E2;">
                                        <br>
                                    </div>
                                    <div class="col-xl-2 col-lg-2  border border-white " style="background-color:#CCE2E2;">
                                        <br>
                                    </div>
                                    <div class="col-xl-3 col-lg-3  border border-white " style="background-color:#CCE2E2;">
                                        <br>
                                    </div>
                                </div> <!--1-->
                            @endif
                            @if($a==14)
                            <div class="row"> <!--1-->
                                <div class="col-xl-3 col-lg-3" style="background-color:white">
                                    <div id="" class="mr-2 text-center" style="display:block; font-size:{{$row->tamano}}px;font-weight:900;color:{{$row->color}};
                                        margin-top: {{$row->margen_superior}}px; margin-left:{{$row->margen_inferior}}px;">
                                        <p id=""></p>
                                    </div>
                                </div>
                            @endif
                            @if($a==15)
                                <div class="col-xl-1 col-lg-1" style="background-color:white">
                                    <div id="" class="mr-2 text-center" style="display:block; font-size:{{$row->tamano}}px;font-weight:900;color:{{$row->color}};
                                        margin-top: {{$row->margen_superior}}px; margin-left:{{$row->margen_inferior}}px;">
                                        <p id="">{{$row->parrafo}}</p>
                                    </div>
                                </div>
                            @endif
                            @if($a==16)

                                <div class="col-xl-3 col-lg-3" style="background-color:white">
                                    <div id="" class="mr-2 text-center" style="display:block; font-size:{{$row->tamano}}px;font-weight:900;color:{{$row->color}};
                                        margin-top: {{$row->margen_superior}}px; margin-left:{{$row->margen_inferior}}px;">
                                        <p id="">{{$row->parrafo}}</p>
                                    </div>
                                </div>
                            @endif
                            @if($a==17)
                                <div class="col-xl-2  col-lg-2" style="background-color:white">
                                    <div id="" class="mr-2 text-center" style="display:block; font-size:{{$row->tamano}}px;font-weight:900;color:{{$row->color}};
                                        margin-top: {{$row->margen_superior}}px; margin-left:{{$row->margen_inferior}}px;">
                                        <p id="">{{$row->parrafo}}</p>
                                    </div>
                                </div>
                            @endif
                            @if($a==18)
                                <div class="col-xl-3 col-lg-3" style="background-color:white">
                                    <div id="" class="mr-2 text-center" style="display:block; font-size:{{$row->tamano}}px;font-weight:900;color:{{$row->color}};
                                        margin-top: {{$row->margen_superior}}px; margin-left:{{$row->margen_inferior}}px;">
                                        <p id="">{{$row->parrafo}}</p>
                                    </div>
                                </div>
                                </div><!--1-->
                                <div class="row"> <!--1-->
                                    <div class="col-xl-3 col-lg-3" style="background-color:white;">
                                        <br>
                                    </div>
                                    <div class="col-xl-1 col-lg-1  border border-white " style="background-color:#CCE2E2;">
                                        <br>
                                    </div>
                                    <div class="col-xl-3 col-lg-3  border border-white " style="background-color:#CCE2E2;">
                                        <br>
                                    </div>
                                    <div class="col-xl-2 col-lg-2  border border-white " style="background-color:#CCE2E2;">
                                        <br>
                                    </div>
                                    <div class="col-xl-3 col-lg-3  border border-white " style="background-color:#CCE2E2;">
                                        <br>
                                    </div>
                                </div> <!--1-->
                            @endif
                            @if($a==19)
                            <div class="row"> <!--1-->
                                <div class="col-xl-3 col-lg-3" style="background-color:white">
                                    <div id="" class="mr-2 text-center" style="display:block; font-size:{{$row->tamano}}px;font-weight:900;color:{{$row->color}};
                                        margin-top: {{$row->margen_superior}}px; margin-left:{{$row->margen_inferior}}px;">
                                        <p id=""></p>
                                    </div>
                                </div>
                            @endif
                            @if($a==20)
                                <div class="col-xl-1 col-lg-1" style="background-color:white">
                                    <div id="" class="mr-2 text-center" style="display:block; font-size:{{$row->tamano}}px;font-weight:900;color:{{$row->color}};
                                        margin-top: {{$row->margen_superior}}px; margin-left:{{$row->margen_inferior}}px;">
                                        <p id="">{{$row->parrafo}}</p>
                                    </div>
                                </div>
                            @endif
                            @if($a==21)
                                <div class="col-xl-3 col-lg-3" style="background-color:white">
                                    <div id="" class="mr-2 text-center" style="display:block; font-size:{{$row->tamano}}px;font-weight:900;color:{{$row->color}};
                                        margin-top: {{$row->margen_superior}}px; margin-left:{{$row->margen_inferior}}px;">
                                        <p id="">{{$row->parrafo}}</p>
                                    </div>
                                </div>
                            @endif
                            @if($a==22)
                                <div class="col-xl-2  col-lg-2" style="background-color:white">
                                    <div id="" class="mr-2 text-center" style="display:block; font-size:{{$row->tamano}}px;font-weight:900;color:{{$row->color}};
                                        margin-top: {{$row->margen_superior}}px; margin-left:{{$row->margen_inferior}}px;">
                                        <p id="">{{$row->parrafo}}</p>
                                    </div>
                                </div>
                            @endif
                            @if($a==23)
                                <div class="col-xl-3 col-lg-3" style="background-color:white">
                                    <div id="" class="mr-2 text-center" style="display:block; font-size:{{$row->tamano}}px;font-weight:900;color:{{$row->color}};
                                        margin-top: {{$row->margen_superior}}px; margin-left:{{$row->margen_inferior}}px;">
                                        <p id="">{{$row->parrafo}}</p>
                                    </div>
                                </div>
                                </div><!--1-->
                                <div class="row"> <!--1-->
                                    <div class="col-xl-3 col-lg-3 border border-white" style="background-color:#CCE2E2;">
                                        <br>
                                    </div>
                                    <div class="col-xl-1 col-lg-1  border border-white " style="background-color:#CCE2E2;">
                                        <br>
                                    </div>
                                    <div class="col-xl-3 col-lg-3  border border-white " style="background-color:#CCE2E2;">
                                        <br>
                                    </div>
                                    <div class="col-xl-2 col-lg-2  border border-white " style="background-color:#CCE2E2;">
                                        <br>
                                    </div>
                                    <div class="col-xl-3 col-lg-3  border border-white " style="background-color:#CCE2E2;">
                                        <br>
                                    </div>
                                </div> <!--1-->
                            @endif
                            @if($a==24)
                            <div class="row"> <!--1-->
                                <div class="col-xl-3 col-lg-3" style="background-color:#CCE2E2">
                                    <div id="" class="mr-2 text-center" style="display:block; font-size:{{$row->tamano}}px;font-weight:900;color:{{$row->color}};
                                        margin-top: {{$row->margen_superior}}px; margin-left:{{$row->margen_inferior}}px;">
                                        <p id="">2. La “a” se encuentra  adelante de  dos consonantes:</p>
                                    </div>
                                </div>
                            @endif
                            @if($a==25)
                                <div class="col-xl-1 col-lg-1" style="background-color:white">
                                    <div id="" class="mr-2 text-center" style="display:block; font-size:{{$row->tamano}}px;font-weight:900;color:{{$row->color}};
                                        margin-top: {{$row->margen_superior}}px; margin-left:{{$row->margen_inferior}}px;">
                                        <p id="">{{$row->parrafo}}</p>
                                    </div>
                                </div>
                            @endif
                            @if($a==26)
                                <div class="col-xl-3 col-lg-3" style="background-color:white">
                                    <div id="" class="mr-2 text-center" style="display:block; font-size:{{$row->tamano}}px;font-weight:900;color:{{$row->color}};
                                        margin-top: {{$row->margen_superior}}px; margin-left:{{$row->margen_inferior}}px;">
                                        <p id="">{{$row->parrafo}}</p>
                                    </div>
                                </div>
                            @endif
                            @if($a==27)

                                <div class="col-xl-2  col-lg-2" style="background-color:white">
                                    <div id="" class="mr-2 text-center" style="display:block; font-size:{{$row->tamano}}px;font-weight:900;color:{{$row->color}};
                                        margin-top: {{$row->margen_superior}}px; margin-left:{{$row->margen_inferior}}px;">
                                        <p id="">{{$row->parrafo}}</p>
                                    </div>
                                </div>
                            @endif
                            @if($a==28)
                                <div class="col-xl-3 col-lg-3" style="background-color:white">
                                    <div id="" class="mr-2 text-center" style="display:block; font-size:{{$row->tamano}}px;font-weight:900;color:{{$row->color}};
                                        margin-top: {{$row->margen_superior}}px; margin-left:{{$row->margen_inferior}}px;">
                                        <p id="">{{$row->parrafo}}</p>
                                    </div>
                                </div>
                                </div><!--1-->
                            @endif
                        @endif
                        @php($a++)
                    @endforeach

            </div>
        </div>
        @endif

        @if($plantilla[0]->tipo_plantilla==1)
            <div class="tele col-xl-5 col-lg-5">
                <div class="miscrollspy"  id='div2' data-spy="scroll" data-target="#spy">
                  @php($a=0)
                  @php($b=0)
                  @foreach($contenido as $row)
                  @if ( ($row->id_tipo_con  == 2 || $row->id_tipo_con  == 6 || $row->id_tipo_con  == 4 || $row->id_tipo_con  == 3)  )
                        @if($row->id_tipo_con  == 6)
                            <div id="t1" class="mr-2"
                                style="display:block; font-size:{{$row->tamano}}px;font-weight:900;color:{{$row->color}};
                                      margin-top: {{$row->margen_superior}}px; margin-left:{{$row->margen_inferior}}px;">
                                <p id="titulo"> {{$row->parrafo}} </p>
                            </div>
                        @endif
                        @if($row->id_tipo_con  == 3)
                            <div class="row text-center" style="display:block;">
                                <img class="img-fluid" style="width:200px;height:200px;" src="/storage/contenido/{{$row->ruta}}">
                            </div>
                        @endif

                        @if($row->id_tipo_con  == 4)
                        @if($b==0)
                          <div id="s2" style="display:block;">
                            <div class="text-center" style="display:block; font-size:{{$row->tamano}}px;font-weight:900;color:{{$row->color}};
                                margin-top: {{$row->margen_superior}}px; margin-left:{{$row->margen_inferior}}px;">
                                <div class="row text-center">
                          @php($b++)
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
              @php($a++)
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
        @if($plantilla[0]->tipo_plantilla==8)
        <div class="tele col-xl-5 col-lg-5">
            <div class="miscrollspy"  id='div2' data-spy="scroll" data-target="#spy">
                    <div class="row">
              @php($a=0)
              @php($b=0)
              @foreach($contenido as $row)
              @if ( ($row->id_tipo_con  == 2 || $row->id_tipo_con  == 6 || $row->id_tipo_con  == 4 || $row->id_tipo_con  == 3)  )

                        @if($row->id_tipo_con  == 3)
                            <div class=" col-xl-5 col-lg-5 text-center border border-white" style="display:block; background-color:red;">
                                <img class="img-fluid" style="width:200px;height:200px;" src="/storage/contenido/{{$row->ruta}}">
                            </div>
                        @endif
                        @if($row->id_tipo_con  == 6)
                        <div  class=" col-xl-7 col-lg-7 border border-white"
                            style="display:block; font-size:{{$row->tamano}}px;font-weight:900;color:{{$row->color}};
                                  margin-top: {{$row->margen_superior}}px; background-color:blue;
                                   margin-left:{{$row->margen_inferior}}px;">
                            <p id="titulo"> {{$row->parrafo}} </p>
                        </div>
                        @endif
                @endif
              @if($row->id_tipo_con  == 1)
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
              @php($a++)
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
