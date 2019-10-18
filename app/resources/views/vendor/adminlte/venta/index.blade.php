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
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Reporte de Ventas General</h3>
                                  </div>
            <!-- /.box-header -->
            <div class="box-body">
                @if($data)
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr><th>Id Venta</th>
                            <th>Nombre Cliente</th>
                            <th>email </th>                        
                            <th>Fecha Venta</th>
                            <th>Total Venta</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)
                            <tr>
                                <td>{{ $row-> id_venta}}</td>
                                  <td>{{ $row-> name}}</td>
                                  <td>{{ $row-> email}}</td>
                                    <td>{{ $row-> fecha}}</td>
                                      <td>{{ $row-> total}}</td>
                                        
                                       
                
                               
                                <td style="width:100px;">
                                    <a href="{{ route('venta-d', $row->id_venta) }}" class="btn btn-xs btn-info">
                                        <i class="glyphicon glyphicon-th-list" title="Detalle Venta"></i>
                                    </a>
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  
@endsection
