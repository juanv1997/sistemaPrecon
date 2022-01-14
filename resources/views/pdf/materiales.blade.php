<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/pdf/tabla.css') }}">  
    <title>Materiales</title>

</head>

<body>

    <div class="container">

        <h1>Materiales</h1> 

        <img src="http://localhost/sistemaPrecon/public/img/image_precon.jpg" >

    </div> 


        <div>
            <table>
                <thead>
                    <tr>

                        <th> N°</th>
                        <th >Código</th>
                        <th >Tipo</th>
                        <th >Unidad</th>
                        <th >Precio</th>
                        <th >Descripción</th>
                        <th >Stock</th>
                        <th >Status</th>
                        <th> Observaciones</th>
                       
                    </tr>
                </thead>
                <tbody >

                    @php
                        $i=1;
                    @endphp

                    @foreach ($materiales as $material)
                    <tr 
                    >
                                <th scope="row" >
                                    {{$i}}
                                </th>
    
                                <td  >
                                    {{ $material->material_cod }}
                                </td>
                                <td >
                                    {{ $material->tipo_nombre }}
                                </td>
                                <td  >
                                    {{ $material->unidad_nombre }}
                                </td>
                                <td >
                                    {{ $material->material_precio }}
                                </td>
                                <td >
                                    {{ $material->material_descrip }}
                                </td>
                                <td >
                                    {{ $material->material_stock }}
                                </td>
                                <td>
                                    @if ($material->material_status == "I")
                                        Inactivo
                                    @elseif ($material->material_stock == 0)
                                        Agotado
                                    @else
                                        Activo
                                    @endif<
                                </td>
      
                                <td>
                                      {{ $material->material_observacion }}
                                </td>
                    </tr>

                    @php
                        $i++;
                    @endphp

                    @endforeach
                </tbody>
            </table>
            
      </div>

      <footer>
          <span>Elaborado el {{$date}} a las {{$time}} </span>
      </footer>

</body>

</html>