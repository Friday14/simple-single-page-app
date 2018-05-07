<template>
  <div class="columns is-multiline">
    <div v-show="!loading" class="column is-one-quarter" v-for="product in products">
      <div class="card">
        <div class="card-image">
          <figure class="image is-4by3">
            <img :src="filterImage(product)" alt="Placeholder image">
          </figure>
        </div>
        <div class="card-content">
          <div class="media">
            <div class="media-content">
              <p class="title is-4">{{ product.name }}</p>
            </div>
          </div>
          <div class="content">
            {{ product.description }}
          </div>
        </div>
      </div>
    </div>
    <div v-if="loading">
      <h3>Loading...</h3>
    </div>
  </div>
</template>

<script>
  export default {
    name: "Products",
    data() {
      return {
        products: [],
        loading: false,
      }
    },
    watch: {
      '$route': 'fetchProducts'
    },
    created() {
      this.fetchProducts();
    },
    methods: {
      fetchProducts() {
        this.loading = true;
        this.$http.get(`api/products/${this.$route.params.categoryId}`).then(response => {
          this.products = response.body;
          this.loading = false;
        });
      },
      filterImage(product) {
        if (product.attachments[0]) {
          return product.attachments[0].file_remote_url || 'https://bulma.io/images/placeholders/1280x960.png'
        }
      }
    }
  }
</script>

<style scoped>

</style>