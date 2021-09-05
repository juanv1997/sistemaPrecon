<div>

    @if ($prefabricados != null)

        <div class="grid grid-cols-4 gap-4 pb-3">

            @foreach ($prefabricados as $prefabricado)

               

                <div
                    role="button"
                    class="select-none cursor-pointer transition-shadow overflow-hidden rounded-2xl bg-white shadow hover:shadow-lg"
                    data-precio="{{$prefabricado->pre_precio}}" data-descrip=" {{$prefabricado->pre_descripcion}}" id="{{$prefabricado->pre_id}}"
                    data-image="{{$prefabricado->pre_image_path}}" data-code="{{$prefabricado->pre_codigo}}" onclick="addProduct(this)"
                    >


                    <img clas="object-fill " src="http://localhost/sistemaPrecon/storage/app/{{$prefabricado->pre_image_path}}"/>
                    <div class="flex pb-3 px-3 text-sm -mt-3">
                        <p class="flex-grow truncate mr-1" > {{$prefabricado->pre_descripcion}} </p>
                        <p class="nowrap font-semibold" >  {{$prefabricado->pre_precio}}  </p>
                    </div>
                </div>


            @endforeach

        </div>

    @endif



</div>
