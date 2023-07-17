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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
@vite('resources/css/app.css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css"  rel="stylesheet" />
@livewireStyles
</head>
<body>

     <aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-30 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800 flex flex-col justify-between items-center">
            <div class="flex flex-col justify-center items-center"><img class="w-11  pt-4" src="{{asset('images/logo.svg')}}" alt="logo.svg"></div>
           <ul class="space-y-2 font-medium">
              <li>
                 <a href="{{route("items.index")}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-red-100 dark:hover:bg-red-700 group">
                    <img src="{{asset('images/bars.svg')}}" alt="items">
                 </a>
              </li>
              <li>
                 <a href="{{route("list.index")}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-red-100 dark:hover:bg-red-700 group">
                    <img class="w-7 " src="{{asset('images/rotate.svg')}}" alt="logo.svg">
                 </a>
              </li>
           </ul>
           <div class="">
            <img class="w-8 pt-4" src="{{asset('images/cart.svg')}}" alt="logo.svg">
            </div>
        </div>
     </aside>
     
     <div class="p-5 lg:ml-32">
        @livewire('show-items')
    
    </div>
    
    <aside id="default-sidebar" class="fixed top-0 right-0 z-40 w-60 h-screen transition-transform translate-x-0 sm:translate-x-full" aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto sidebar2 flex flex-col justify-between items-center">
            <div class="flex justify-center items-center bebida border rounded-full w-60 text-white font-medium grid grid-cols-2 p-1">
                <img class="w-12  pt-4" src="{{asset('images/source.svg')}}" alt="logo.svg">
                <span class="text-1xl">Didn't find what you need?</span>
                <span class="ml-11 bg-white outline-white rounded text-black text-sm p-1 font-bold">
                    <a href="{{route("items.create")}}" data-bs-toggle="modal" data-bs-target="#exampleModal" >Add item</a>
                </span>
            </div>
            <b>Shopping List</b>
            <form class="flex flex-col justify-between items-center">
                <div id="added-items">

                </div>
                <div class="relative mb-1">
                    <div class="flex">
                        <input name="nombre" type="text" id="input-group-1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-l-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter a name">
                        <button type="submit"  class="btn border rounded-r-lg bg-blue-400 text-bold">Save</button>
                    </div>
                </div>                
            </form>
   
        </div>
    </aside>

   
    <div wire:ignore>
        <script>
          // Mueve tu código JavaScript aquí
          const plusBtns = document.querySelectorAll('.plus-btn');
          const addedItemsContainer = document.getElementById('added-items');
          const addedItemsMap = new Map();
      
          plusBtns.forEach(btn => {
              btn.addEventListener('click', (e) => {
                  e.preventDefault();
                  const itemName = btn.dataset.item;
                  const categoryName = btn.dataset.category;
      
                  if (addedItemsMap.has(categoryName)) {
                      const existingItems = addedItemsMap.get(categoryName);
      
                      // Verificamos si el item ya existe en la lista
                      if (!existingItems.includes(itemName)) {
                          existingItems.push(itemName);
                      }
                  } else {
                      addedItemsMap.set(categoryName, [itemName]);
                  }
      
                  addedItemsContainer.innerHTML = Array.from(addedItemsMap, ([category, items]) =>
                  `<div class="m-2">
                      <h6 class="text-gray-500 text-sm">${category}</h6><span>${items.join('<br>')}</span>
                      ${items.map(item => `<input type="text" name="" value="${item}" disabled style="display: none;">`).join('')}
                  </div>`
                  ).join('');
              });
          });
        </script>
      </div>
        
      
    
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Agrega Nuevo Item</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="flex flex-col gap-2 justify-center items-center" method="POST" action="{{route("items.store")}}">
            @csrf
            <b class="text-sm">nombre del item</b>
            <input class="border rounded w-60" type="text" placeholder="Enter a name" name="name">
            <b class="text-sm">nota</b> 
            <textarea class="border rounded w-60 " type="text" placeholder="Enter a note" name="nota"></textarea>
            <b class="text-sm">Imagen</b>
            <input class="border rounded w-60" type="text" placeholder="Enter a url" disabled>
            <b class="text-sm">Categoria</b>
            <select name="categoria"> 
                <option value="" disabled selected>asignar categoria</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="bg-blue-500 p-2 border rounded">Save changes</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="bg-red-500 p-2 border rounded" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

    
@livewireScripts
</body>
</html>