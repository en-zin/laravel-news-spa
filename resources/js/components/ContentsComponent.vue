<template>
    <div class="container">
      <div class="container" v-for="article in articles" ::key="article.articleId">
            <p>{{article.title}}</p>
            <p>{{article.content}}</p>
      </div>
    </div>
</template>


<script>

export default {
  data() {
    return {
      articles: {},
      title: "",
      content: "",
      details : {}
    }
  },

  created() {
    axios.get(this.$route.fullPath)
    .then(response => this.articles = response.data)
    .catch(error=> {console.log('false')});
  },

mounted() {
  console.log(this.$route.fullPath)
},
};

</script>
