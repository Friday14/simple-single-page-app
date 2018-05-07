<template>
  <div>
    <div class="notification is-danger" v-show="errors.length">
      <button class="delete" @click="clearErrors"></button>
      <ul>
        <li v-for="error in errors">
          {{ error }}
        </li>
      </ul>
    </div>
    <div class="notification is-primary" v-show="msgSuccess">
      {{ msgSuccess }}
    </div>
    <div class="box">
      <h3>Create Product</h3>
      <!-- Name -->
      <div class="field">
        <label class="label">Name</label>
        <div class="control">
          <input class="input" v-model="payload.name" type="text" placeholder="Product Name">
        </div>
      </div>
      <!-- Description -->
      <div class="field">
        <label class="label">Description</label>
        <div class="control">
          <textarea v-model="payload.description" class="textarea" placeholder="Hello world"></textarea>
        </div>
      </div>
      <!-- Category -->
      <div class="field">
        <label class="label">Category</label>
        <div class="control">
          <div class="select">
            <select v-model="payload.category">
              <template v-for="category in categories">
                <option :key="category.id" :value="category.id">{{ category.name }}</option>
              </template>
            </select>
          </div>
        </div>
      </div>
      <!-- Image -->
      <div class="field">
        <label class="label">Image</label>
        <div class="control">
          <div class="file">
            <label class="file-label">
              <input class="file-input" type="file" @change="handleFileChange">
              <span class="file-cta">
              <span class="file-label">
                Choose a file…
              </span>
            </span>
            </label>
          </div>
        </div>
      </div>
      <button class="button" @click="create">Create Product</button>
    </div>
  </div>
</template>

<script>
  import CategoryItem from '../components/CategoryItem'

  export default {
    name: "CreateProduct",
    data() {
      return {
        payload: {
          category: null,
          image: null,
          name: null,
          description: null,
        },
        errors: [],
        msgSuccess: null,
        categories: []
      }
    },
    mounted() {
      this.fetchCategories();
    },
    methods: {
      fetchCategories() {
        this.$http.get(`api/categories/nested_array`).then(response => {
          this.categories = response.body
        });
      },
      create() {
        if (this.validate()) {
          let formData = new FormData();
          Object.keys(this.payload).map(fieldKey => {
            formData.append(fieldKey, this.payload[fieldKey]);
          });
          this.$http.post(`/api/products/create`, formData)
              .then(response => {
                this.msgSuccess = response.body.msg;
                Object.keys(this.payload).map(key => this.payload[key] = null)
              }, response => {
                this.errors = Object.keys(response.body.errors).map(key => {
                  return response.body.errors[key][0]
                })
              })
        } else {
          this.errors.push("Not all fields are filled")
        }
      },
      validate() {
        return Object.keys(this.payload).every(key => this.payload[key] !== null)
      },
      handleFileChange(e) {
        this.payload.image = e.target.files[0]
      },
      clearErrors() {
        this.errors = [];
      }
    },
  }
</script>

<style scoped>

</style>