<div>
    <div class="flex">
        <h3 class="text-4xl"><span class="text-yellow-400 font-bold">Shopping</span> allows you take your <br> shopping list wherever you go</h3>
        <input type="text" wire:model="search" placeholder="Search Items" class="bg-gray-50 border border-gray-300 text-gray-900 h-10 mx-20 mt-4 text-sm rounded-l-lg focus:ring-blue-500 focus:border-blue-500 block w-60 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
      </div>
      
    @foreach ($categories as $category)
        <div class="mt-20 mr-20 pr-20">
            <h4 class="text-3xl mb-5">{{$category->name}}</h4>
            <div class="flex flex-wrap grid grid-cols-4 gap-4">
                @foreach ($category->items as $item)
                <div class="bg-white border rounded w-40 flex justify-center items-center p-2 font-medium">
                    <a href="##" data-bs-toggle="modal" data-bs-target="#example{{$item->id}}" class="font-medium">{{$item->name}}</a> 
                    <button type="button" class="ml-3 text-3xl text-gray-400 plus-btn hover:bg-red-100" data-category="{{$category->name}}" data-item="{{$item->name}}" >+</button>
                </div>

                <div class="modal fade" id="example{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Item</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body flex flex-col justify-center items-center">
                           <p class="text-3xl font-bold m-4">{{$item->name}}</p>
                           <p class="font-bold ">{{$category->name}}</p>
                           <p class="font-medium m-4">{{$item->note}}</p>     
                          <div class="flex gap-2">
                            <form action="{{route("items.destroy", $item->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 p-2 border rounded">Delete</button>
                              </form> 
                                <button type="button" class="bg-blue-500 p-2 border rounded plus-btn" data-bs-dismiss="modal" data-category="{{$category->name}}" data-item="{{$item->name}}">Add to list</button>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="bg-red-500 p-2 border rounded" data-bs-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
            </div>
        </div>
        @endforeach
        
</div>

