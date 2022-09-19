<template>
    <Label :name="name.toUpperCase()"/>
    <input
        class="border w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
        :id="name" 
        :name="name" 
        :type="type" 
        :placeholder="name"
        :value="modelValue" 
        @input="updateValue"
    />
    <Error :name="name" v-text="error"/>
</template>

<script>
import Label from "../Form/Label.vue";
import Error from "../Form/Error.vue";
export default {
    props: {
        name: String,
        type: String,
        error: String,
        modelValue: String,
    },

    components: {
        Label,
        Error
    },

    mounted() {
        console.log(this.modelValue)
    },
    
    setup(props, context) {
        const updateValue = (event) => {
            context.emit('update:modelValue', event.target.value);
        }
        return { updateValue }
    }
};
</script>