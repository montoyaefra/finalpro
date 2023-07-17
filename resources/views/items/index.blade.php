<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@800&family=Quicksand:wght@400;500&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css"  rel="stylesheet" />
   
</head>
<body>

     <aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-30 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800 flex flex-col justify-between items-center">
            <div class="flex flex-col justify-center items-center"><img class="w-11  pt-4" src="{{asset('images/logo.svg')}}" alt="logo.svg"></div>
           <ul class="space-y-2 font-medium">
              <li>
                 <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-red-100 dark:hover:bg-red-700 group">
                    <img src="{{asset('images/bars.svg')}}" alt="items">
                    {{-- <span class="flex-1 ml-3 whitespace-nowrap">Users</span> --}}
                 </a>
              </li>
              <li>
                 <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-red-100 dark:hover:bg-red-700 group">
                    <img class="w-7 " src="{{asset('images/rotate.svg')}}" alt="logo.svg">
                    {{-- <span class="flex-1 ml-3 whitespace-nowrap">Products</span> --}}
                 </a>
              </li>
           </ul>
           <div class="">
            <img class="w-8 pt-4" src="{{asset('images/cart.svg')}}" alt="logo.svg">
            </div>
        </div>
     </aside>
     
     <div class="p-5 lg:ml-32">
        <h3 class="text-4xl"><span class="text-yellow-400 font-bold">Shopping</span> allows you take your <br> shopping list wherever you go</h3>

    @foreach ($categories as $category)    
        <div class="mt-20 mr-20 pr-20">
            <h4 class="text-3xl mb-5">{{$category->name}}</h4>
            <div class="flex flex-wrap grid grid-cols-4 gap-4">
            @foreach ($category->items as $item)   
                <div class="bg-white border rounded w-40 flex justify-center items-center p-2 font-medium">
                    {{$item->name}} <a href="##" class="ml-3 text-3xl text-gray-400">+</a>
                </div>
            @endforeach    
            </div>
        </div>
    @endforeach     

        </div>
     </div>

     <aside id="default-sidebar" class="fixed top-0 right-0 z-40 w-60 h-screen transition-transform translate-x-0 sm:translate-x-full" aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto sidebar2 flex flex-col justify-between items-center">
            <div class="flex justify-center items-center bebida border rounded-full w-60 text-white font-medium grid grid-cols-2 p-1">
                <img class="w-12  pt-4" src="{{asset('images/source.svg')}}" alt="logo.svg">
                <span class="text-1xl">Didn't find what you need?</span>
                <span class="ml-11 bg-white outline-white rounded text-black text-sm p-1 font-bold"><a href="##">Add item</a></span>
            </div>
            <div>
                chatgpt aqui quiero que esten los elementos a los cuales yo doy click
            </div>

            <div class="relative mb-6">
                <input type="text" id="input-group-1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com">
              </div>


        </div>
    </aside>
         
     
 
 
</body>
</html>