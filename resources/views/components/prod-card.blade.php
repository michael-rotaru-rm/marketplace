@props(['product'])
<div class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col">
    <a href="product/{{ $product->slug }}">
        <img class="hover:grow hover:shadow-lg" src="{{ $product->image_url }} ">
        <div class="pt-3 flex items-center justify-between">
            <p class="">{{ $product->title }}</p>
        </div>
        <p class="pt-1 text-gray-900">{{ $product->price }} €</p>
    </a>
</div>
