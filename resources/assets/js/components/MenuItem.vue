<template>
  <li>
    <router-link :to="`/${item.id}`">{{ item.name }}</router-link>

    <ul v-if="item.children">
      <template v-for="child in item.children">
        <menu-item :item="child"></menu-item>
      </template>
    </ul>
  </li>
</template>

<script>
  export default {
    props: ['item'],
    name: "MenuItem"
  }
</script>

<style scoped>

</style>