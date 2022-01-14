@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')

    <x-app-layout>

        @php
            $countMaterial= 0;
            $countPre = 0;
            $countEntradasPre = 0;
            $countEntradasMaterial = 0;
            $countSalidasPre = 0;
            $countSalidasMaterial = 0;
        @endphp

        @foreach ($salidasPre as $entrada)
            @php
                $countSalidasPre++;
            @endphp
        @endforeach

        @foreach ($salidasMaterial as $entrada)
            @php
                $countSalidasMaterial++;
            @endphp
        @endforeach

        @foreach ($entradasPre as $entrada)
            @php
                $countEntradasPre++;
            @endphp
        @endforeach

        @foreach ($entradasMaterial as $entrada)
            @php
                $countEntradasMaterial++;
            @endphp
        @endforeach

        @foreach ($materiales as $material)  
            @php
                 $countMaterial++;
            @endphp
        @endforeach
                                
        @foreach ($prefabricados as $prefabricado) 
            @php
                 $countPre++;
            @endphp
        @endforeach

        <section class="grid gap-6 my-6 md:grid-cols-3 px-3">

            <div class="hover:bg-blue-200 transform hover:scale-110 transition-all duration-150 p-6 bg-blue-100 shadow rounded-2xl ">

                <dl class="space-y-2">
                    <dt class="text-lg font-medium text-gray-800">Materiales</dt>

                    <dd class="flex text-5xl text-gray-800 font-light md:text-6xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                        </svg>
                        <div class="ml-56">{{$countMaterial}}</div>
                    </dd>

                    {{-- <dd class="flex items-center space-x-1 text-sm font-medium text-green-500">
                        <span>32k increase</span>

                        <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.25 15.25V6.75H8.75"/>
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 7L6.75 17.25"/>
                    </svg>                    
                    </dd> 
                    --}}
                    <div class=""> 
                        <form action="{{ route("material") }}" method="GET">      

                            <x-jet-button type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 21h7a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v11m0 5l4.879-4.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242z" />
                                </svg>
                                <span>Ver lista</span>
                            </x-jet-button>  
                           
                        </form>       
                </div>

                </dl>

                
            </div>

            <div class="hover:bg-blue-200 transform hover:scale-110 transition-all duration-150 p-6 bg-blue-100 shadow rounded-2xl">
                

                <dl class="space-y-2">
                    <dt class="text-lg font-medium text-gray-800">Prefabricados</dt>

                    <dd class="flex text-5xl text-gray-800 font-light md:text-6xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                        </svg>
                        <div class="ml-56">{{$countPre}}</div>
                        
                    </dd>

                    <div class="">        
                        <form action="{{ route("prefabricado") }}" method="GET">      

                            <x-jet-button type="submit" >
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 21h7a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v11m0 5l4.879-4.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242z" />
                                </svg>
                                <span>Ver lista</span>
                            </x-jet-button>  
                           
                           
                        </form>          
                    </div>

                
                   
                </dl>
            </div>

            {{-- <div class=" hover:bg-blue-200 transform hover:scale-110 transition-all duration-150 p-6 bg-blue-100 shadow rounded-2xl">
                
                <h1 class="text-2xl font-medium text-gray-800">Entradas de hoy : {{$date}} </h1>

                <div class="flex-auto text-2xl font-medium text-gray-800">
                    <label for="">Prefabricados: {{$countEntradasPre}} </label>
                    <label for="">Materiales : {{$countEntradasMaterial}} </label>
                </div>
                
            </div>

            <div class="hover:bg-blue-200 transform hover:scale-110 transition-all duration-150 p-6 bg-blue-100 shadow rounded-2xl">
                <h1 class="text-2xl font-medium text-gray-800">Salidas de hoy : {{$date}} </h1>

                <div class="flex-auto text-2xl font-medium text-gray-800">
                    <label for="">Prefabricados: {{$countSalidasPre}} </label>
                    <label for="">Materiales : {{$countSalidasMaterial}} </label>
                </div>
            </div> --}}

        </section>
{{-- 
         <section class="grid gap-6 my-6 md:grid-cols-3 px-3">
    
                <div class="hover:bg-blue-200 transform hover:scale-110 transition-all duration-150 p-6 bg-blue-100 shadow rounded-2xl">
                    <canvas id="myChart" width="50" height="50"></canvas>
                </div>
            
        </section>  --}}
           
        {{-- <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form method="POST" action="action.php">
                            <div class="mb-4">
                                <label class="text-xl text-gray-600">Title <span class="text-red-500">*</span></label></br>
                                <input type="text" class="border-2 border-gray-300 p-2 w-full" name="title" id="title" value="" required>
                            </div>
    
                            <div class="mb-4">
                                <label class="text-xl text-gray-600">Description</label></br>
                                <input type="text" class="border-2 border-gray-300 p-2 w-full" name="description" id="description" placeholder="(Optional)">
                            </div>
    
                            <div class="mb-8">
                                <label class="text-xl text-gray-600">Content <span class="text-red-500">*</span></label></br>
                                <textarea name="content" class="border-2 border-gray-500">
                                    
                                </textarea>
                            </div>
    
                            <div class="flex p-1">
                                <select class="border-2 border-gray-300 border-r p-2" name="action">
                                    <option>Save and Publish</option>
                                    <option>Save Draft</option>
                                </select>
                                <button role="submit" class="p-3 bg-blue-500 text-white hover:bg-blue-400" required>Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> --}}
    
        {{-- <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    
        <script>
            CKEDITOR.replace( 'content' );
        </script>      --}}
        <script>
        
        const ctx = document.getElementById('myChart');

        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [
                    {
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        </script>
        
    </x-app-layout>   

    
    

@stop
