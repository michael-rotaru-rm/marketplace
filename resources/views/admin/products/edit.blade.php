<x-layout>
    <x-nav />

    <x-admin :heading="'Edit product '.$product->title">
        <form method="POST" action="/admin/products/{{$product->id}}" class="w-full" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="title" :value="old('title',$product->title)"/>
            <x-form.input name="slug" :value="old('title',$product->slug)"/>
            <x-form.input name="price" :value="old('title',$product->price)"/>
            <x-form.textarea name="description">{{ old('description', $product->description) }}</x-form.textarea>
            <div class="mb-2">
                <x-form.input name="photo" type="file" :value="old('title',$product->image_url)"/>
                <img width="100" src="{{ asset('storage/'.$product->image_url) }} ">
            </div>
            <x-form.field>
                <x-form.label name="Category"/>
                <select name="category_id" id="category" class="border w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @php
                        $categories = \App\Models\Category::all();   
                    @endphp
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old("category_id",$product->category_id) == $category->id ? "selected" : "" }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                <x-form.error name="category"/>
            </x-form.field>
            <x-submit-button>Save</x-submit-button>
        </form>
    </x-admin> 
</x-layout>