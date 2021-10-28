<div>

    {{-- @if ($prefabricados != null)

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

    @endif --}}

    {{-- <div class=" bg-white shadow-md rounded my-2 overflow-y-auto h-80 border-5 border-gray-500 ">  --}}
           
      <!-- categories -->
      {{-- <div class="mt-5 flex flex-row px-5">
        <span
          class="px-5 py-1 bg-yellow-500 rounded-2xl text-white text-sm mr-4"
        >
          All items
        </span>
        <span class="px-5 py-1 rounded-2xl text-sm font-semibold mr-4">
          Food
        </span>
        <span class="px-5 py-1 rounded-2xl text-sm font-semibold mr-4">
          Cold Drinks
        </span>
        <span class="px-5 py-1 rounded-2xl text-sm font-semibold mr-4">
          Hot Drinks
        </span>
      </div> --}}
      <!-- end categories -->

      <!-- products -->
      {{-- <div class="grid grid-cols-5 px-5 mt-10 overflow-y-auto ">
        
        @foreach ($prefabricados as $prefabricado)

          <div class=" hover:bg-blue-200 transform hover:scale-110 transition-all duration-150  bg-blue-100 shadow  px-7 py-2 flex flex-col border border-gray-200 rounded-md h-40 justify-between">
              
              <div>
                <div class="font-bold text-gray-800">{{$prefabricado->pre_descripcion}}</div>
                <span class="font-light text-sm text-gray-400">{{$prefabricado->pre_stock}}</span>
              </div>

              <div class="flex flex-row justify-between items-center">
                <img src="http://localhost/sistemaPrecon/storage/app/{{$prefabricado->pre_image_path}}" class=" h-12 w-12 object-cover rounded-md" >
              </div> 

          </div>

        @endforeach
       
      </div> --}}
      <!-- end products -->
     {{-- </div>  --}}
  
     <!-- component -->

  <div class="flex lg:flex-row flex-col-reverse shadow-lg">

    <!-- left section -->

      <div class="w-full lg:w-3/6 h-full bg-white shadow-md rounded my-2 overflow-y-auto  border-5 border-gray-500">
        <!-- header -->
        <div class="flex flex-row justify-between items-center px-5 mt-5">
          <div class="text-gray-800">
            <div class="font-bold text-xl">Simons's BQQ Team</div>
            <span class="text-xs">Location ID#SIMON123</span>
          </div>
          <div class="flex items-center">
            <div class="text-sm text-center mr-4">
              <div class="font-light text-gray-500">last synced</div>
              <span class="font-semibold">3 mins ago</span>
            </div>
            <div>
                <span
                class="px-4 py-2 bg-gray-200 text-gray-800 font-semibold rounded"
                >
                Help
              </div>
            </span>
          </div>
        </div>
        <!-- end header -->
        <!-- categories -->
        <div class="mt-5 flex flex-row px-5">
          <span
            class="px-5 py-1 bg-yellow-500 rounded-2xl text-white text-sm mr-4"
          >
            All items
          </span>
          <span class="px-5 py-1 rounded-2xl text-sm font-semibold mr-4">
            Food
          </span>
          <span class="px-5 py-1 rounded-2xl text-sm font-semibold mr-4">
            Cold Drinks
          </span>
          <span class="px-5 py-1 rounded-2xl text-sm font-semibold mr-4">
            Hot Drinks
          </span>
        </div>
        <!-- end categories -->
        <!-- products -->
        <div class="grid grid-cols-4 px-5 mt-10 overflow-y-auto ">
          
          @foreach ($prefabricados as $prefabricado)

            <div class=" hover:bg-blue-200 transform hover:scale-110 transition-all duration-150  bg-blue-100 shadow px-7 py-2 flex flex-col border border-gray-200 rounded-md h-44 justify-between">
                
                <div>
                  <div class="font-bold text-xs text-gray-800">{{$prefabricado->pre_descripcion}}</div>
                  <span class="font-light text-sm text-gray-400">{{$prefabricado->pre_stock}}</span>
                </div>

                <div class="flex-row justify-between items-center">
                  <img src="http://localhost/sistemaPrecon/storage/app/{{$prefabricado->pre_image_path}}" class=" h-12 w-12 object-cover rounded-md" >
                </div> 

            </div>

          @endforeach
        
        </div>
        <!-- end products -->
      </div>

    <!-- end left section -->

    <!-- right section -->
    <div class="w-full lg:w-2/5 bg-white shadow-md rounded my-2 overflow-y-auto  border-5 border-gray-500">
      <!-- header -->
      <div class="flex flex-row items-center justify-between px-5 mt-5">
        <div class="font-bold text-xl">Current Order</div>
        <div class="font-semibold">
          <span class="px-4 py-2 rounded-md bg-red-100 text-red-500">Clear All</span>
          <span class="px-4 py-2 rounded-md bg-gray-100 text-gray-800">Setting</span>
        </div>
      </div>
      <!-- end header -->
      <!-- order list -->
      <div class="px-5 py-4 mt-5 overflow-y-auto h-64">
          <div class="flex flex-row justify-between items-center mb-4">
            <div class="flex flex-row items-center w-2/5">
              <img src="https://source.unsplash.com/4u_nRgiLW3M/600x600" class="w-10 h-10 object-cover rounded-md" alt="">
              <span class="ml-4 font-semibold text-sm">Stuffed flank steak</span>
            </div>
            <div class="w-32 flex justify-between">
              <span class="px-3 py-1 rounded-md bg-gray-300 ">-</span>
              <span class="font-semibold mx-4">2</span>
              <span class="px-3 py-1 rounded-md bg-gray-300 ">+</span>
            </div>
            <div class="font-semibold text-lg w-16 text-center">
              $13.50
            </div>
          </div>             
          <div class="flex flex-row justify-between items-center mb-4">
            <div class="flex flex-row items-center w-2/5">
              <img src="https://source.unsplash.com/sc5sTPMrVfk/600x600" class="w-10 h-10 object-cover rounded-md" alt="">
              <span class="ml-4 font-semibold text-sm">Grilled Corn</span>
            </div>
            <div class="w-32 flex justify-between">
              <span class="px-3 py-1 rounded-md bg-gray-300 ">-</span>
              <span class="font-semibold mx-4">10</span>
              <span class="px-3 py-1 rounded-md bg-gray-300 ">+</span>
            </div>
            <div class="font-semibold text-lg w-16 text-center">
              $3.50
            </div>
          </div>
          <div class="flex flex-row justify-between items-center mb-4">
            <div class="flex flex-row items-center w-2/5">
              <img src="https://source.unsplash.com/MNtag_eXMKw/600x600" class="w-10 h-10 object-cover rounded-md" alt="">
              <span class="ml-4 font-semibold text-sm">Grilled Corn</span>
            </div>
            <div class="w-32 flex justify-between">
              <span class="px-3 py-1 rounded-md bg-gray-300 ">-</span>
              <span class="font-semibold mx-4">10</span>
              <span class="px-3 py-1 rounded-md bg-gray-300 ">+</span>
            </div>
            <div class="font-semibold text-lg w-16 text-center">
              $3.50
            </div>
          </div>
          <div class="flex flex-row justify-between items-center mb-4">
            <div class="flex flex-row items-center w-2/5">
              <img src="https://source.unsplash.com/MNtag_eXMKw/600x600" class="w-10 h-10 object-cover rounded-md" alt="">
              <span class="ml-4 font-semibold text-sm">Grilled Corn</span>
            </div>
            <div class="w-32 flex justify-between">
              <span class="px-3 py-1 rounded-md bg-gray-300 ">-</span>
              <span class="font-semibold mx-4">10</span>
              <span class="px-3 py-1 rounded-md bg-gray-300 ">+</span>
            </div>
            <div class="font-semibold text-lg w-16 text-center">
              $3.50
            </div>
          </div> 
          <div class="flex flex-row justify-between items-center mb-4">
            <div class="flex flex-row items-center w-2/5">
              <img src="https://source.unsplash.com/MNtag_eXMKw/600x600" class="w-10 h-10 object-cover rounded-md" alt="">
              <span class="ml-4 font-semibold text-sm">Ranch Burger</span>
            </div>
            <div class="w-32 flex justify-between">
              <span class="px-3 py-1 rounded-md bg-red-300 text-white">x</span>
              <span class="font-semibold mx-4">1</span>
              <span class="px-3 py-1 rounded-md bg-gray-300 ">+</span>
            </div>
            <div class="font-semibold text-lg w-16 text-center">
              $2.50
            </div>
          </div> 
          <div class="flex flex-row justify-between items-center mb-4">
            <div class="flex flex-row items-center w-2/5">
              <img src="https://source.unsplash.com/4u_nRgiLW3M/600x600" class="w-10 h-10 object-cover rounded-md" alt="">
              <span class="ml-4 font-semibold text-sm">Ranch Burger</span>
            </div>
            <div class="w-32 flex justify-between">
              <span class="px-3 py-1 rounded-md bg-red-300 text-white">x</span>
              <span class="font-semibold mx-4">1</span>
              <span class="px-3 py-1 rounded-md bg-gray-300 ">+</span>
            </div>
            <div class="font-semibold text-lg w-16 text-center">
              $2.50
            </div>
          </div>            
      </div>
      <!-- end order list -->
      <!-- totalItems -->
      <div class="px-5 mt-5">
        <div class="py-4 rounded-md shadow-lg">
          <div class=" px-4 flex justify-between ">
            <span class="font-semibold text-sm">Subtotal</span>
            <span class="font-bold">$35.25</span>
          </div>
          <div class=" px-4 flex justify-between ">
            <span class="font-semibold text-sm">Discount</span>
            <span class="font-bold">- $5.00</span>
          </div>
          <div class=" px-4 flex justify-between ">
            <span class="font-semibold text-sm">Sales Tax</span>
            <span class="font-bold">$2.25</span>
          </div>
          <div class="border-t-2 mt-3 py-2 px-4 flex items-center justify-between">
            <span class="font-semibold text-2xl">Total</span>
            <span class="font-bold text-2xl">$37.50</span>
          </div>
        </div>
      </div>
      <!-- end total -->
      <!-- cash -->
      <div class="px-5 mt-5">
        <div class="rounded-md shadow-lg px-4 py-4">
          <div class="flex flex-row justify-between items-center">
            <div class="flex flex-col">
              <span class="uppercase text-xs font-semibold">cashless credit</span>
              <span class="text-xl font-bold text-yellow-500">$32.50</span>
              <span class=" text-xs text-gray-400 ">Available</span>
            </div>
            <div class="px-4 py-3 bg-gray-300 text-gray-800 rounded-md font-bold"> Cancel</div>
          </div>
        </div>
      </div>
      <!-- end cash -->
      <!-- button pay-->
      <div class="px-5 mt-5">
        <div class="px-4 py-4 rounded-md shadow-lg text-center bg-yellow-500 text-white font-semibold">
          Pay With Cashless Credit
        </div>
      </div>
      <!-- end button pay -->
    </div>
    <!-- end right section -->
  </div>




</div>
