@props(['heading'])

<main class="block w-full">
    <h1 class="w-full text-left text-2xl uppercase font-bold mb-4 block">{{$heading}}</h1>

    <div class="w-full flex">
        <div class="w-3/12 inline-flex ">
            <ul>
                <li><a class="font-normal hover:underline" href="/admin/products/create">New product</a></li>
                <li><a class="font-normal hover:underline" href="/admin/products">View Products</a></li>
            </ul>
        </div>
        <div class="w-9/12 inline-flex border border-gray-200 px-8 pt-6 pb-8 mb-4 ">
            {{$slot}}
        </div>
    </div>
</main>