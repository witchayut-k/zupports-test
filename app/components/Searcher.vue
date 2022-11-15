<template>
  <div class="search__container">
      <div class="text-center mb-10">
          <h1 class="white--text">Simple Responsive web application</h1>
          <h4 class="white--text">To show the list of Restaurants by using Google Map API</h4>
      </div>
      <v-container>
        <v-row justify="center">
          <form @submit.prevent="handleSubmit" class="text-center">
            <p>Enter the restaurant name</p>
            <div class="form-group mt-10">
              <v-text-field
                v-model="form.q"
                placeholder="Eg. Bang sue"
                solo
                class="mb-5"
              ></v-text-field>
              <v-btn
                color="primary"
                elevation="0"
                class="text-uppercase font-weight-medium"
                dark
                type="submit"
              >
                Search
              </v-btn>
            </div>
          </form>
        </v-row>
      </v-container>

  </div>
</template>

<script>
export default {
  name: "searcher",
  
  data() {
    return {
      form: {
        q: "Bang sue"
      }
    };
  },

  methods: {
    handleSubmit() {
      this.$emit("handleSearch", this.form.q);
    },
  }
};
</script>
