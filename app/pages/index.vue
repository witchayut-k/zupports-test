<template>
  <div>

  

  <Searcher @handleSearch="handleSearch" />

  <RestaurantCard :restaurants="restaurants"  />
    
  </div>
</template>

<script>
export default {
  name: "landing-page",

  data() {
    return {
      loading: false,
      restaurants: []
    };
  },

  components: {
    Searcher: () => import("@/components/Searcher"),
    RestaurantCard: () => import("@/components/RestaurantCard.vue")
  },

  methods: {
    async handleSearch (terms) {
      let res = await this.$axios.get(`/search?q=${terms}`);
      this.restaurants = res.data;
    }
  }

};
</script>
