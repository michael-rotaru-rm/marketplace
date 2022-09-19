<template>
  <Nav :username="username" :isauth="isAuth"/>
  <section class="bg-white">
    <div class="container mx-auto flex items-center flex-wrap pt-2 pb-12">
      <slot />
    </div>
  </section>
</template>

<script>
import Nav from "./Nav.vue";

export default {
  components: { Nav },
  computed: {
    isAuth() {
      return this.$page.props.auth?true:false;
    },
    username() {
      return this.$page.props.auth?.user.username;
    },
  },
};
</script>

