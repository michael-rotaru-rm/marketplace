<template>
  <Layout>
     <div class="block w-full ">
        <div class="w-full mx-auto pt-8">
            <form @submit.prevent="submit" class="max-w-xl mx-auto border border-gray-200 px-8 pt-6 pb-8 mb-4">
                <h1 class="text-left text-2xl uppercase font-bold mb-4">Login</h1>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Email
                    </label>
                    <input
                        v-model="form.email"
                        class="border w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="email" name="email" type="text" placeholder="Email"
                        required>
                    <p v-if="form.errors.email" v-text="form.errors.email" class="text-red-500 text-xs"></p>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Password
                    </label>
                    <input
                        v-model="form.password"
                        class="border w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="password" name="password" type="password" placeholder="******************">
                    <p v-if="form.errors.password" v-text="form.errors.password" class="text-red-500 text-xs"></p>
                </div>

                <div class="flex items-center justify-center mb-4">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        Login
                    </button>

                    <Link class="bg-gray-500 ml-2 relative hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" href="/register">
                        Register
                    </Link>
                </div>
            </form>
        </div>
    </div>
  </Layout>
</template>

<script setup>
import {Link} from '@inertiajs/inertia-vue3';
import Layout from "../Shared/Layout.vue";
import {useForm} from "@inertiajs/inertia-vue3";

let form = useForm({
  email: '',
  password: '',
});

let submit = () => {
  form.post('/login');
};
 
</script>