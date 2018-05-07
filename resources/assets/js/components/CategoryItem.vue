<template>
  <li>
    <slot name="parent">
      <router-link :to="`/${item.id}`">{{ item.name }}</router-link>
    </slot>

    <ul v-if="item.children">
      <template v-for="child in item.children">
        <slot name="child">
          <category-item :item="child"></category-item>
        </slot>
      </template>
    </ul>
  </li>
</template>

<script>
  export default {
    props: ['item'],
    name: "CategoryItem"
  }
</script>

<style scoped>

</style>