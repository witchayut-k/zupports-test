<template>

    <div class="restaurants__container" v-if="restaurants.length > 0">
      
      <h2>Found: {{ restaurants.length }} places</h2>
      
      <div class="restaurant" v-for="restaurant in restaurants" :key="restaurant.id">
        <h4>{{ restaurant.name }}</h4>
        <p><strong>Address: </strong>{{ restaurant.formatted_address }}</p>
        <p><strong>Rating: </strong> {{ restaurant.rating }} from {{ restaurant.user_ratings_total }} people</p>
        <p>{{ restaurant.opening_hours?.open_now ? 'Open now' : 'Closed now'}}</p>
      </div>

      <div class="pagination" v-if="nextPageToken">
        <v-btn @click.prevent="loadMore()">View More</v-btn>
      </div>

    </div>
   

</template>

<script>
export default {
  name: "restaurant-card",
  props: {
    restaurants: Array,
    nextPageToken: String
  },
  methods: {
    loadMore() {
      console.log('load more');
      this.$emit("handleLoadMore");
    }
  }
};
</script>
