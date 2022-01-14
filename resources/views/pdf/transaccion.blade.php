<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/pdf/tabla.css') }}"> 
    <title> {{$stringResult}}</title>
</head>
<body>
    
    <div class="container">

        <h1 class="report-title">{{$stringResult}}</h1>

        <img src="http://localhost/sistemaPrecon/public/img/image_precon.jpg" >

    </div> 

    <table>
        <thead >
            <tr >

                <th >N°</th>
                <th >Código</th>
                <th >Descripción</th>
                <th >Precio unitario</th>
                <th >Cantidad</th>
                <th >Total</th>
                <th >Fecha</th>
                <th >Hora</th>
                
            </tr>
                    
        </thead>
        <tbody >
    
            @if ($tipoProducto=="Prefabricado")

                @php
                    $i=1;
                @endphp

                @foreach ($listItems as $producto)
                    <tr>
                        
                        <th scope="row" >
                            {{$i}}
                        </th>

                        <td  >
                            {{$producto->pre_codigo}}
                        </td>

                        <td  >
                            {{$producto->pre_descripcion}}
                        </td>

                        <td  >
                            {{$producto->pre_precio}}
                        </td>

                        <td  >
                            
                            @if ($tipoTransaccion=="Entradas")

                                {{$producto->entrada_cantidad}}

                            @else

                                {{$producto->salida_cantidad}}
                                
                            @endif
                            
                        </td>

                        <td  >
                            @if ($tipoTransaccion=="Entradas")

                                {{$producto->entrada_total}}
                                
                            @else

                                {{$producto->salida_total}} 

                            @endif
                            
                        </td>

                        <td  >
                            @if ($tipoTransaccion=="Entradas")

                                {{$producto->entrada_fecha}}

                            @else

                                {{$producto->salida_fecha}}

                            @endif
                        
                        </td>

                        <td  >
                            
                            @if ($tipoTransaccion=="Entradas")

                                {{$producto->entrada_hora_creacion}}

                            @else

                                {{$producto->salida_hora_creacion}}

                            @endif
                            
                        </td>

                    </tr>

                    @php
                        $i++;
                    @endphp
                @endforeach

            @endif

            @if ($tipoProducto=="Material")

                @php
                    $j=1;
                @endphp

                @foreach ($listItems as $producto)
                
                        <tr >
                        
                            <td  >
                            {{$j}}
                            </td>

                            <td  >
                                {{$producto->material_cod}}
                            </td>

                            <td  >
                                {{$producto->material_descrip}}
                            </td>

                            <td  >
                                {{$producto->material_precio}}
                            </td>

                            <td  >
                            
                                @if ($tipoTransaccion=="Entradas")

                                    {{$producto->entrada_cantidad}}

                                @else

                                    {{$producto->salida_cantidad}}

                                @endif
                                
                            </td>

                            <td  >
                                @if ($tipoTransaccion=="Entradas")

                                    {{$producto->entrada_total}}

                                @else

                                    {{$producto->salida_total}} 

                                @endif
                                
                            </td>

                            <td  >
                                @if ($tipoTransaccion=="Entradas")

                                    {{$producto->entrada_fecha}}

                                @else

                                    {{$producto->salida_fecha}}

                                @endif
                            
                            </td>

                            <td  >
                                
                                @if ($tipoTransaccion=="Entradas")

                                    {{$producto->entrada_hora_creacion}}

                                @else

                                    {{$producto->salida_hora_creacion}}

                                @endif
                                
                            </td>
                    

                    @php
                        $j++;
                    @endphp

                @endforeach

            @endif 

            
        
        </tbody>
    </table>

    <footer>
        <span>Elaborado el {{$date}} a las {{$time}} </span>
    </footer>

</body>
</html>