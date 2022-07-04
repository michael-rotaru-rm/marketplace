<x-layout>
    <x-nav />

    <x-admin heading="Create product">
        <form method="POST" action="/products/create" class="w-full" enctype="multipart/form-data">
            @csrf
            <x-form.input name="title"/>
            <x-form.input name="slug"/>
            <x-form.input name="price"/>
            <x-form.textarea name="description"/>
            <x-form.input name="photo" type="file"/>
            <x-form.field>
                <x-form.label name="Category"/>
                <select name="category_id" id="category" class="border w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @php
                        $categories = \App\Models\Category::all();   
                    @endphp
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old("category_id") == $category->id ? "selected" : "" }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                <x-form.error name="category"/>
            </x-form.field>
            <x-submit-button>Create</x-submit-button>
        </form>
    </x-admin> 
</x-layout>