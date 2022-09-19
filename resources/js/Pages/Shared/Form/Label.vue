<template>
    <label class="block text-gray-700 text-sm font-bold mb-2 mt-2" for="name">
        {{name}}
    </label>
</template>

<script>
export default {
    props: {
        name: String,
    }
};
</script>