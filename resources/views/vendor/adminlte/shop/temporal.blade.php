<td width="20px">
                                    {!! Form::open(['route' => ['addProduct', $product->id], 
                                    'method' => 'POST']) !!}

                                <button class="btn-cart">    <span class="glyphicon glyphicon-shopping-cart" title="Agregar" ></span> </button>

                                    <a href="#" class="btn-cart" title="Agregar al Carrito"><button>
                                        <span class="glyphicon glyphicon-shopping-cart"></span></button></a>
                                    


                                    {{ Form::hidden('price', $product->precio)}}
                                    {{  Form::hidden('name', $product->nombre)}}
                                    

                                    {!! Form::close() !!}
                                </td>