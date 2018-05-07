<template>
  <nav class="navbar" role="navigation" aria-label="dropdown navigation">
    <a class="navbar-item">
      <img src="https://bulma.io/images/bulma-logo.png" alt="Bulma: a modern CSS framework based on Flexbox" width="112" height="28">
    </a>

    <div class="navbar-start">
      <router-link class="navbar-item" :to="{ name: 'products.create' }">Create Product</router-link>
    </div>
  </nav>
</template>

<script>
  export default {
    name: "Navbar"
  }
</script>

<style scoped>

</style>