<template>
  <div>

    <Searcher @handleSearch="handleSearch" />
    <RestaurantCard :restaurants="restaurants" :nextPageToken="nextPageToken" @handleLoadMore="handleLoadMore"  />
    
  </div>
</template>

<script>
export default {
  name: "landing-page",

  data() {
    return {
      loading: false,
      restaurants: [],
      terms: '',
      nextPageToken: null
    };
  },

  components: {
    Searcher: () => import("@/components/Searcher"),
    RestaurantCard: () => import("@/components/RestaurantCard.vue")
  },

  methods: {
    async handleSearch (terms) {
      this.terms = terms;
      let res = await this.$axios.get(`/search?q=${this.terms}&type=restaurant`);
      this.restaurants = res.data.results;
      this.nextPageToken = res.data.next_page_token;
    },
    async handleLoadMore () {
      let res = await this.$axios.get(`/search?q=${this.terms}&type=restaurant&nextPageToken=${this.nextPageToken}`);
      this.restaurants.push(...res.data.results);
      this.nextPageToken = res.data.next_page_token;
    }
  }

};
</script>
