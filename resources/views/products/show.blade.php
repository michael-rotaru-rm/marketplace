
<x-layout>
    <x-nav />
    
    <div class="flex flex-col md:flex-row">
        <div class="w-full md:w-1/2 pr-6">
            <img class="w-full" src="{{ asset('storage/'.$product->image_url) }} ">
        </div>

        <div class="w-full md:w-1/2 p-6">
            <p class="mt-4 mb-4">{{ $category_name }}</p>
            <p class="text-xl font-bold">{{ $product->title }}</p>
            <p class="mt-4">{{ $product->description }}</p>
            <p class="mt-4 text-xl font-bold">{{ $product->price }} €</p>
        </div>
    </div>

</x-layout>
