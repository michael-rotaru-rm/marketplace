<template>
    <p class="text-red-500 text-xs">{{ message }}</p>
</template>

<script>
export default {
    props: {
        message: String,
    }
};
</script>