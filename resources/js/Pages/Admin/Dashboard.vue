<template>
  <Layout>
    <div class="w-full flex">

      <div class="w-3/12">
        <h1 class="w-full text-left text-2xl uppercase font-bold my-4 block">
          Dashboard
        </h1>
        <AdminNav />
      </div>

      <div class="w-9/12">
        <div class="flex items-center justify-between pb-6">
          <div class="w-full">
            <Link
              href="/admin/products/create"
              class="
                bg-blue-600
                px-4
                py-2
                text-white text-sm
                font-semibold
                tracking-wide
                cursor-pointer
                float-right
                mb-2
              "
              >
              Add new
              </Link>

            <table
              class="
                min-w-full
                leading-normal
                shadow
                rounded-lg
                overflow-hidden
              "
            >
              <tbody>
                <tr v-for="product in products.data" :key="product.id">
                  <td
                    class="px-5 py-5 border-b border-gray-200 bg-white text-sm"
                  >
                    <div class="flex items-center">
                      <div class="flex-shrink-0 w-10 h-10">
                        <img
                          class="w-full h-full"
                          :src="'/storage/'+product.image_url"
                          alt=""
                        />
                      </div>
                      <div class="ml-3">
                        <p class="text-gray-900 whitespace-no-wrap">
                          {{ product.title }}
                        </p>
                      </div>
                    </div>
                  </td>
                  <td
                    class="px-5 py-5 border-b border-gray-200 bg-white text-sm"
                  >
                    <p class="text-gray-900 whitespace-no-wrap">
                      {{ product.category_id }}
                    </p>
                  </td>
                  <td
                    class="px-5 py-5 border-b border-gray-200 bg-white text-sm"
                  >
                    <p class="text-gray-900 whitespace-no-wrap">
                      {{ product.price }}
                    </p>
                  </td>
                  <td
                    class="px-5 py-5 border-b border-gray-200 bg-white text-sm"
                  >
                    <p class="text-gray-900 whitespace-no-wrap">
                      {{ formatDate(product.created_at) }}
                    </p>
                  </td>

                  <td
                    class="px-5 py-5 border-b border-gray-200 bg-white text-sm"
                  >
                    <Link
                      :href="'/admin/products/'+product.id+'/edit'"
                      class="text-gray-900 whitespace-no-wrap hover:underline"
                    >
                      Edit
                    </Link>
                  </td>
                  

                  <td
                    class="px-5 py-5 border-b border-gray-200 bg-white text-sm"
                  >
                    <Link
                      :href="'/admin/products/'+product.id"
                      method="delete"
                      class="text-gray-900 whitespace-no-wrap hover:underline"
                    >
                      Delete
                    </Link>
                  </td>
                  <td
                    class="px-5 py-5 border-b border-gray-200 bg-white text-sm"
                  >
                    <!-- 
                      <form method="POST" action="/admin/products/{{product.id}}">
                          @method('DELETE')

                          <button  class="text-gray-900 whitespace-no-wrap hover:underline">
                              Delete
                          </button>
                      </form> 
                      -->
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </Layout>
</template>

<script>
import Layout from "../Shared/Layout.vue";
import AdminNav from "../Shared/AdminNav.vue";
import Utils from '../Shared/Utils.vue'

import {Link} from '@inertiajs/inertia-vue3';
export default {
  props: {
    products: Object,
  },
  mixins: [Utils],
  components: { Layout, AdminNav, Link },
};
</script>