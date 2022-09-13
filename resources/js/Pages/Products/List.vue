<template>
  <Layout>
    <div class="inline-flex w-full justify-end">
        <div class="w-400 relatige flex ml-2">
            <div class="relative inline-flex">
                <Dropdown label="Category" :initialSelected="state.categorySlug" :items="categories" @onSelected="handleCategorySelected"/>
                <Dropdown label="Subcategory" :initialSelected="state.subcategorySlug" v-if="subcategories" :items="subcategories" @onSelected="handleSubCategorySelected"/>
                <input v-model="search" type="search" name="search" id="search" class="color-black block px-4 py-2.5 rounded shadow-md overflow-hidden focus:outline-0 text-sm" placeholder="Search...">
                <button @click="doSearch" class="text-white right-14 bottom-2.5 bg-blue-700 hover:bg-blue-800 font-medium text-sm px-4 py-2">Search</button>
            </div>
        </div>
    </div>
    
    <div v-if="products.length" class="inline-flex w-full">
      <div v-for="product in products" :key="product.id" class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col">
        <ProductCard :product= "product" />
      </div>
    </div>
    <p v-else class="w-full text-center">No products found </p>
  </Layout>
</template>

<script setup>

import Layout from "../Shared/Layout.vue";
import ProductCard from "../Shared/ProductCard.vue";
import Dropdown from "../Shared/Dropdown.vue";

import {reactive, ref, watch} from "vue";
import {Inertia} from "@inertiajs/inertia";

let searchValue = '';
let search = ref(props.filters.search);
watch(search,value=>{
  searchValue = value;
  if(!searchValue.length){
    doSearch();
  }
})

const doSearch = () => {
  let attributes = {};
  if(searchValue.length){attributes.search = searchValue};
  if(state.categorySlug.length){attributes.category = state.categorySlug};
  if(state.subcategorySlug.length){attributes.subcategory = state.subcategorySlug};

  Inertia.get('/',attributes,{preserveState:true});
};

const handleCategorySelected=(val) => {
  state.categorySlug = val;
  state.subcategorySlug = '';
  doSearch();
};

const handleSubCategorySelected=(val) => {
  state.subcategorySlug = val;
  doSearch();
};

const state = reactive({
  categorySlug: props.filters.category || '',
  subcategorySlug: props.filters.subcategory || '',
});

const props = defineProps({
  products: Object,
  categories: Object,
  subcategories: Object,
  filters: Object
});

</script>