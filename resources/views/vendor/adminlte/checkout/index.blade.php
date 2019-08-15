@extends('adminlte::layouts.app')
@section('main-content')<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                  <a href="{{ route('idioma.show',0) }}" class="btn btn-xs btn-info" >Idioma: Todos</a>
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Checkout </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li class="pull-right">
                        <a href="{{ route('nivel.create') }}"  aria-expanded="false"><i class="fa fa-plus" data-toggle="tooltip" data-placement="top" title="Registrar Elemento"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix">
                        

  <form method="post" action="/paypal">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="container-fluid">

        <hr>

        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if (session()->has('error_message'))
            <div class="alert alert-danger">
                {{ session()->get('error_message') }}
            </div>
        @endif

        @if (sizeof(Cart::content()) > 0)

            <table class="table">
                <thead>
                    <tr>
                        <th>SubTotal</th>
                        <th>Tax</th>
                        <th>Total</th>
                        <th class="column-spacer"></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    
                        <td>${{ Cart::instance('default')->subtotal() }}</td>              
                   
                        <td>${{ Cart::instance('default')->tax() }}</td>
                   
                        <td>${{ Cart::total() }}</td>
                        
                    </tr>

                </tbody>
            </table>

        @endif

        <div class="spacer"></div>



                    <div class="form-group">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title">Detalles del Pago</h3>
                            </div>
                            <div class="panel-body">
                            <h5>USER:  oboequintero-buyer@gmail.com\oboequintero-facilitator@gmail.com
</strong></h5>
                            <h5>PASS: 12345678</strong></h5>
                                    <div class="form-group">

                                    <input  name="amount" type="hidden">       </div>

                                
                                </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="text-center">
                            <button class="btn btn-success" type="submit">Pagar con Paypal</button>
                        </div>
                    </div>
                    
                </div>
            </div>
    </div> <!-- end container -->
 </form>
 


 


      
    
     </div>
          </div>
        </div>
        <!-- /page content -->
@endsection


<html>

    

