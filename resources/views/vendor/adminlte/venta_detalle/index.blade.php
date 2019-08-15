@extends('adminlte::layouts.app')
@section('main-content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <section class="content-header">
      <h1>
        Tablas Productos
        <small>Lista</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('idioma.index') }}"></i> Idioma: Todos </a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div
            <div class="box-header">
              <h3 class="box-title">Reporte de Detalle-Venta</h3>
                                  </div>
            <!-- /.box-header -->

             <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr><th>Id Venta</th>  
                            <th>Cliente</th> 
                            <th>email</th>                    
                            <th>Fecha Venta</th>
                            <th>Total Venta</th>
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data1 as $row)
                            <tr>
                                <td>{{ $row-> id_venta}}</td>
                                   <td>{{ $row-> name}}</td>
                                  <td>{{ $row-> email}}</td>
                                    <td>{{ $row-> fecha}}</td>
                                      <td>{{ $row-> total}}</td>
                                        
                                       
                
                               
                                 </tr>
                        @endforeach
                    
                </table>
            
                @if($data)
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr><th>Categoria</th>

                            <th>Codigo</th>
                            <th>Id Producto</th>
                            <th>Precio Venta</th>
                           
                          
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)
                            <tr>

                                     <td>{{ $row-> id_categoria}}</td>
                                     <td>@if ($row->id_categoria == 1)
                                            CURSO
                             @endif
                             @if ($row->id_categoria == 2)
                                            PAQUETE
                             @endif

                             @if ($row->id_categoria == 3)
                                            PROMOCIÓN
                             @endif

                                </td>

                                      <td>{{ $row-> codigo}}</td>
                                      <td>{{ $row-> id_producto}}</td>
                                      <td>{{ $row-> precio_venta}}</td>
                                      
                                        
                                       
                
                               
                                </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
            </div>
            <!-- /.box-body <td>{{ $row-> id_categoria}}</td> -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  
@endsection
