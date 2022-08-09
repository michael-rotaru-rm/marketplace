<x-layout>
    <x-nav />

    <div class="inline-flex w-full justify-end" x-show="show">
        {{-- <x-category-dropdown /> --}}
        {{-- <x-subcategory-dropdown /> --}}
        <livewire:subcategory-dropdown />

        <div class="w-400 relatige flex ml-2">
            <form method="GET" action="#">
                <div class="relative inline-flex">
                    @if (request('subcategory'))
                        <input type="hidden" name="category" value={{ request('category') }} />
                        <input type="hidden" name="subcategory" value={{ request('subcategory') }} />
                    @endif
                    <input type="search" name="search" id="search"
                        class="color-black block px-4 py-2.5 rounded shadow-md overflow-hidden focus:outline-0 text-sm"
                        placeholder="Search..." value="{{ request('search') }}">
                    <button type="submit"
                        class="text-white right-14 bottom-2.5 bg-blue-700 hover:bg-blue-800 font-medium text-sm px-4 py-2">Search</button>
                </div>
            </form>
        </div>
    </div>

    @if (request('search'))
        <h1 class="block w-full text-center p-6 uppercase mt-4 text-xl">Results for:<span
                class="font-bold">{{ request('search') }}</span></h1>
    @endif

    @if ($products->count())
        @foreach ($products as $product)
            <x-prod-card :product="$product" />
        @endforeach
    @else
        <p class="w-full text-center">No products found </p>
    @endif

</x-layout>
