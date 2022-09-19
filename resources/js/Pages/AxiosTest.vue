<template>
   <button @click="handleClick">Click me</button>
   <p>{{info}}</p>
</template>

<script>
export default {
    data () {
    return {
      info: null
    }
  },
  methods: {
    handleClick: function(){
        console.log(123);
        axios
        .get('axios_test/api')
        .then(response => (this.info = response))
    }
  }
};
</script>