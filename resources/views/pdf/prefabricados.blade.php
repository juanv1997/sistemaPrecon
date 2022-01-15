<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prefabricados</title>
    <link rel="stylesheet" href="{{ asset('css/pdf/tabla.css') }}"> 

</head>

<body>

    <div class="container">

        <h1>Prefabricados</h1>

        <img src="http://localhost/sistemaPrecon/public/img/image_precon.jpg" >

    </div> 

        <table >

            <thead >

                <tr >

                    <th scope="col">N°</th>
                    <th scope="col">Código</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Espesor</th>
                    <th scope="col">Resistencia</th>
                    <th scope="col">Color</th>
                    <th scope="col">Unidad</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Dimensión</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Status</th>
                    <th scope="col">Observaciones</th>
                </tr>
            </thead>
            
            <tbody class='text-center '>

                @php
                $i=1;
                @endphp

                @foreach ($prefabricados as $prefabricado)

                <tr

                >
                            <th scope="row" >
                               {{$i}}
                            </th>

                            <td  >
                                {{ $prefabricado->pre_codigo }}
                            </td>

                            <td>
                                {{ $prefabricado->pre_descripcion }}
                            </td>
                            
                            <td >
                                {{ $prefabricado->tipo_nombre }}
                            </td>
                            
                            <td  >
                              @if ($prefabricado->espesor_cantidad==0)
                                  N/A
                              @else
                              {{ $prefabricado->espesor_cantidad }}
                              @endif  
                              
                            </td >

                            <td >
                              @if ($prefabricado->resistencia_cantidad==0)
                                  N/A
                              @else
                              {{ $prefabricado->resistencia_cantidad }}
                              @endif  
                              
                            </td>

                            <td >
                                {{ $prefabricado->color_nombre }}
                            </td>

                            <td >
                                {{ $prefabricado->unidad_termino }}
                            </td>

                            <td  >
                                {{ $prefabricado->pre_precio }}
                            </td>

                            <td >
                                {{ $prefabricado->dimension_medida }}
                            </td>
                            
                            <td >
                              {{ $prefabricado->pre_stock}}
                          </td>

                          <td>
                              @if ($prefabricado->pre_status == "I")
                                  Inactivo
                              @elseif ($prefabricado->pre_stock == 0)
                                  Agotado
                              @else
                                  Activo
                              @endif<
                          </td>

                          <td>
                                {{ $prefabricado->pre_observacion }}
                          </td>

                        </tr>


                        @php
                            $i++;
                        @endphp
                        
                    @endforeach

                </tr>

            </tbody>

        </table>

        <footer>
            <span>Elaborado el {{$date}} a las {{$time}} </span>
        </footer>
    
</body>


</html>