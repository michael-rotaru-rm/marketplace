@props(['name'])

<x-form.field>
    <x-form.label name="{{$name}}"/>
    <textarea class="border w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
        id="username"
        name="{{ $name }}"
        placeholder="{{ucwords($name)}}">{{$slot ?? old($name)}}</textarea>
    <x-form.error name="{{$name}}"/>
</x-form.field>
