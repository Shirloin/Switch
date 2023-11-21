<div class="w-full p-10 flex flex-col justify-center items-center gap-4">
    <h1 class="w-full text-3xl font-bold text-black">Edit Product</h1>
    <div class="relative group w-60 flex flex-col justify-center items-center gap-2">
        <img class="w-60 h-40 rounded-md object-cover" src="{{$image}}" alt="">
        <form action="/profile/image" method="POST" class="group-hover:flex justify-center items-center absolute bg-gray-500 bg-opacity-50 hidden  w-full h-full" id="fileUploadForm" enctype="multipart/form-data">
            @csrf
            <label
                class="w-full h-full rounded-md cursor-pointer flex justify-center items-center">
                <input name="file" class="hidden" type="file" accept="image/jpeg, .jpeg, .jpg, image/png, .png" onchange="uploadFile()" ><h1 class="text-lg text-white font-semibold">Choose Image</h1>
            </label>
        </form>
    </div>
    <div class="w-full flex flex-col gap-2">
        <label for="">Product Name</label>
        <input wire:model='name' class="modal-input w-full" type="text" value="{{$name}}">
    </div>
    <div class="w-full flex flex-col gap-2">
        <label for="">Product Price</label>
        <input wire:model="price" class="modal-input w-full" type="text" value="{{$price}}">
    </div>
    <div class="w-full flex flex-col gap-2">
        <label for="">Product Description</label>
        <textarea wire:model="description" class="w-full modal-input" name="" id="" cols="30" rows="5"></textarea>
    </div>
    <div class="w-full flex justify-end items-center gap-4">
        <button class="p-2 w-20 rounded-md bg-blue-500 text-white" wire:click='save'>Save</button>
        <button class="p-2 w-20 rounded-md bg-red-500 text-white" wire:click="destroy">Delete</button>
    </div>

</div>
