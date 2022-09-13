<template>
    <Link :href="'product/'+product.slug">
        <img class="hover:grow hover:shadow-lg" :src=product.image_url>
        <div class="pt-3 flex items-center justify-between">
            <p class="">{{ product.title }}</p>
        </div>
        <p class="pt-1 text-gray-900">{{ product.price }} €</p>
    </Link>
</template>

<script>
import {Link} from '@inertiajs/inertia-vue3';
export default {
    props: {
        product: Object
    },
    components: {Link}
};
</script>