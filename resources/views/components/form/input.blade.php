@props(['name', 'type' => 'text'])

<x-form.field>
    <x-form.label name="{{$name}}"/>
    <input
        class="border w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
        id="{{$name}}" 
        name="{{$name}}" 
        type="{{$type}}" 
        placeholder="{{ucwords($name)}}"
        {{ $attributes(['value'=> old($name)]) }}
    >
    <x-form.error name="{{$name}}"/>
</x-form.field>