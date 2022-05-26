
<x-layout>
    <x-nav />
    
    <div class="flex flex-col md:flex-row">
        <div class="w-full md:w-1/2 p-6">
            <img class="w-full" src="{{ $product->image_url }} ">
        </div>

        <div class="w-full md:w-1/2 p-6">
            <p class="mt-4">ds{{ $product->category_id }}</p>
            <p class="text-xl font-bold">{{ $product->title }}</p>
            <p class="mt-4">{{ $product->description }}</p>
            <p class="mt-4 text-xl font-bold">{{ $product->price }} €</p>
        </div>
    </div>

</x-layout>
