<template>
    <div class="w-full flex">
        <ul>
            <li><Link class="font-normal hover:underline" href="/admin/products/create">New product</Link></li>
            <li><Link class="font-normal hover:underline" href="/admin/products">View Products</Link></li>
        </ul>
    </div>
</template>

<script>
import {Link} from '@inertiajs/inertia-vue3';
export default {
    components: {Link},
    props: {}
};
</script>