<template>
  <aside class="menu">
    <ul class="menu-list">
      <template v-if="categories" v-for="category in categories">
        <menu-item :item="category"></menu-item>
      </template>
      <li>
        <ul>
          <li><a>Members</a></li>
          <li><a>Plugins</a></li>
          <li><a>Add a member</a></li>
        </ul>
      </li>
    </ul>
  </aside>
</template>

<script>
  import MenuItem from './CategoryItem'

  export default {
    name: "category-menu",
    data() {
      return {
        categories: null
      }
    },
    mounted() {
      this.fetchCategories();
    },
    methods: {
      fetchCategories() {
        this.$http.get(`api/categories`).then(response => this.categories = response.body);
      }
    },
    components: {
      MenuItem
    }
  }
</script>

<style scoped>

</style>