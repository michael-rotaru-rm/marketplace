<template>
    <Label :name="name.toUpperCase()"/>
    <textarea
        class="border w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
        :id="name" 
        :name="name" 
        :placeholder="name"
        :value="modelValue" 
        @input="updateValue"
    ></textarea>
    <Error :name="name" v-text="error"/>
</template>

<script>
import Label from "../Form/Label.vue";
import Error from "../Form/Error.vue";
export default {
    data () {
        return {
            content: this.value
        }
    },

    props: {
        name: String,
        error: String,
        modelValue: String,
    },

    components: {
        Label,
        Error
    },
    
    setup(props, context) {
        const updateValue = (event) => {
            context.emit('update:modelValue', event.target.value);
        }
        return { updateValue }
    }
};
</script>