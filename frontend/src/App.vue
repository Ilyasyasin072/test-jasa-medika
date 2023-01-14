<template>
  <Navbar :key="$route.fullPath"/>
  <router-view :key="$route.fullPath"></router-view>
</template>

<script>
//
import Navbar from '@/pages/layouts/Navbar.vue';
export default {
  name: 'App',
  components: {
    Navbar
  },
  methods: {
    nextLogin() {
      if(localStorage.getItem('role')) {
        this.$router.push({ name: 'dashboard'})
      }
    }
  },
  mounted() {
    this.nextLogin();
  }
}
</script>
