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
        axios
        .get('rao/get_public_offfers')
        .then(response => {
          this.info = response.data;
        })
    }
  }
};
</script>