<x-layout>
    <x-nav />

    <x-admin heading="Manage products">
        <div class="bg-white rounded-md w-full">
            <div class=" flex items-center justify-between pb-6">
                <div class="w-full">
                    <a href="/admin/products/create" class="bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer float-right mb-2">Add new</a>

                    <table class="min-w-full leading-normal shadow rounded-lg overflow-hidden">
                        <tbody>                            
                            @foreach($products as $product)
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 w-10 h-10">
                                            <img class="w-full h-full"
                                                src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.2&w=160&h=160&q=80"
                                                alt="" />
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{$product->title}}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">{{$product->category_id}}</p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{$product->price}}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{$product->created_at}}
                                    </p>
                                </td>

                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <a href="/admin/products/{{ $product->id }}/edit" class="text-gray-900 whitespace-no-wrap hover:underline">
                                        Edit
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <form method="POST" action="/admin/products/{{$product->id}}">
                                        @csrf
                                        @method('DELETE')

                                        <button  class="text-gray-900 whitespace-no-wrap hover:underline">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- <div
                            class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between">
                            <span class="text-xs xs:text-sm text-gray-900">
                                Showing 1 to 4 of 50 Entries
                            </span>
                            <div class="inline-flex mt-2 xs:mt-0">
                                <button
                                    class="text-sm text-indigo-50 transition duration-150 hover:bg-indigo-500 bg-indigo-600 font-semibold py-2 px-4 rounded-l">
                                    Prev
                                </button>
                                &nbsp; &nbsp;
                                <button
                                    class="text-sm text-indigo-50 transition duration-150 hover:bg-indigo-500 bg-indigo-600 font-semibold py-2 px-4 rounded-r">
                                    Next
                                </button>
                            </div>
                        </div> --}}
                </div>
            </div>

    </x-admin>
</x-layout>
