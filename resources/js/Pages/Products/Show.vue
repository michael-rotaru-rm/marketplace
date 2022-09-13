<template>
  <Layout>
    <div class="flex flex-col md:flex-row">
      <div class="w-full md:w-1/2 pr-6">
        <img class="w-full" :src="product.image_url" />
      </div>

      <div class="w-full md:w-1/2 p-6">
        <p class="mt-4 mb-4">{{ category_name + "/" + subcategory_name }}</p>
        <p class="text-xl font-bold">{{ product.title }}</p>
        <p class="mt-4">{{ product.description }}</p>
        <p class="mt-4 text-xl font-bold">{{ product.price }} €</p>
      </div>
    </div>
  </Layout>
</template>

<script>
import Layout from "../Shared/Layout.vue";
export default {
  props: {
    product: Object,
    category_name: String,
    subcategory_name: String,
  },
  components: { Layout },
};
</script>