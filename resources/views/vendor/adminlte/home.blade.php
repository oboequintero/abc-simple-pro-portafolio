@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">

				<!-- Default box -->
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Promociones Gratis</h3>

						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
								<i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
                        <table id="example" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th class="text-center">Precio</th>
                                    <th class="text-center">Activo</th>
                                    <th class="text-center">Gratis</th>
                                    <th class="text-center">Total Paquetes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $row)
                                    <tr>
                                        <td>{{ $row->codigo }}</td>
                                        <td>{{ $row->nombre }}</td>
                                        <td class="text-center">{{ $row->precio }}</td>
                                        <td class="text-center">{{ $row->activo }}</td>
                                        <td class="text-center">{{ $row->gratis }}</td>
                                        <td class="text-center">{{ $row->total_p }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
					</div>
                    <!-- /.box-body -->
                </div>

          <!-- /.box-body -->
                <!-- /.box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Información General</h3>
                             <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                    <!-- ./col -->
                    <div class="row">
                        <div class="col-lg-6 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                              <div class="inner">
                                <h3>{{ $totalclientes[0]->total }}</h3>
                                    <p>Clientes Registrados</p>
                              </div>
                              <div class="icon">
                                    <i class='fa fa-users'></i>
                              </div>
                              <a href="#" class="small-box-footer">
                                Mas Información <i class="fa fa-arrow-circle-right"></i>
                              </a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-blue">
                              <div class="inner">
                              <h3>0</h3>
                                    <p>Clientes Conectados</p>
                              </div>
                              <div class="icon">
                                    <i class='fa fa-user-check '></i>
                              </div>
                              <a href="#" class="small-box-footer">
                                Mas Información <i class="fa fa-arrow-circle-right"></i>
                              </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-xs-12">
                                <div class="card">
                                        <div class="card-header no-border">
                                          <h3 class="card-title">Productos</h3>
                                          <div class="card-tools">
                                            <a href="#" class="btn btn-tool btn-sm">
                                              <i class="fa fa-download"></i>
                                            </a>
                                            <a href="#" class="btn btn-tool btn-sm">
                                              <i class="fa fa-bars"></i>
                                            </a>
                                          </div>
                                        </div>
                                        <div class="card-body p-0">
                                          <table class="table table-striped table-valign-middle">
                                            <thead>
                                            <tr>
                                              <th>Product</th>
                                              <th>Price</th>
                                              <th>Sales</th>
                                              <th>More</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                              <td>
                                                <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                                                Some Product
                                              </td>
                                              <td>$13 USD</td>
                                              <td>
                                                <small class="text-success mr-1">
                                                  <i class="fa fa-arrow-up"></i>
                                                  12%
                                                </small>
                                                12,000 Sold
                                              </td>
                                              <td>
                                                <a href="#" class="text-muted">
                                                  <i class="fa fa-search"></i>
                                                </a>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                                                Another Product
                                              </td>
                                              <td>$29 USD</td>
                                              <td>
                                                <small class="text-warning mr-1">
                                                  <i class="fa fa-arrow-down"></i>
                                                  0.5%
                                                </small>
                                                123,234 Sold
                                              </td>
                                              <td>
                                                <a href="#" class="text-muted">
                                                  <i class="fa fa-search"></i>
                                                </a>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                                                Amazing Product
                                              </td>
                                              <td>$1,230 USD</td>
                                              <td>
                                                <small class="text-danger mr-1">
                                                  <i class="fa fa-arrow-down"></i>
                                                  3%
                                                </small>
                                                198 Sold
                                              </td>
                                              <td>
                                                <a href="#" class="text-muted">
                                                  <i class="fa fa-search"></i>
                                                </a>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                                                Perfect Item
                                                <span class="badge bg-danger">NEW</span>
                                              </td>
                                              <td>$199 USD</td>
                                              <td>
                                                <small class="text-success mr-1">
                                                  <i class="fa fa-arrow-up"></i>
                                                  63%
                                                </small>
                                                87 Sold
                                              </td>
                                              <td>
                                                <a href="#" class="text-muted">
                                                  <i class="fa fa-search"></i>
                                                </a>
                                              </td>
                                            </tr>
                                            </tbody>
                                          </table>
                                        </div>
                                      </div>
                                      <!-- /.card -->

                        </div>
                    </div>

                    </div>
                </div>

			</div>
		</div>
    </div>

@endsection
