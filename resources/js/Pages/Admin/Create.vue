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
          <form @submit.prevent="submit" class="w-full mx-auto border border-gray-200 px-8 pt-6 pb-8 mb-4">
            <Input name="title" type="text" v-model="form.title" :error="form.errors.title"/>
            <Input name="slug" type="text" v-model="form.slug" :error="form.errors.slug"/>
            <Input name="price" type="text" v-model="form.price" :error="form.errors.price"/>
            <Textarea name="description" v-model="form.description" :error="form.errors.description"/>
            <Field>
              <Label name="Photo"/>
                <input
                    class="border w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="photo" 
                    name="photo" 
                    type="file" 
                    @input="form.photo = $event.target.files[0]"
                />
              <Error :name="name" v-text="form.errors.photo"/>
            </Field>
            <Field>
                <Label name="Subcategory"/>
                <select @change="form.subcategory_id = $event.target.value" name="subcategory_id" id="category" class="border w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="">select subcategory ...</option>
                    <option v-for="subcategory in subcategories" :key="subcategory.id" :value="subcategory.id">{{ subcategory.name }}</option>
                </select>
                <Error name="category" v-text="form.errors.subcategory_id"/>
            </Field>
            <Submit>Create</Submit>
          </form>
        </div>
      </div>
    </div>
  </Layout>
</template>

<script setup>
import Layout from "../Shared/Layout.vue";
import AdminNav from "../Shared/AdminNav.vue";
import Field from "../Shared/Form/Field.vue";
import Input from "../Shared/Form/Input.vue";
import Textarea from "../Shared/Form/Textarea.vue";
import Label from "../Shared/Form/Label.vue";
import Error from "../Shared/Form/Error.vue";
import Submit from "../Shared/Form/Submit.vue";
import {useForm} from "@inertiajs/inertia-vue3";

const props = defineProps({
  subcategories: Object
})

let form = useForm({
  title: '',
  slug: '',
  price: '',
  description: '',
  photo: '',
  subcategory_id: '',
});

let submit = () => {
  form.post('/admin/products/create', form);
}
</script>