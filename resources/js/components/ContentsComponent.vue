<template>
    <div class="container">
        <ul>
          <p v-for="article in articles">{{article.title}}</p>
        </ul>
    </div>
</template>




<script>

export default {

  data: function() {
    return {
        articles : {},
        title : "",
    }
  },

  mounted: function() {
    axios.get('/article').then(response => this.articles = response.data)
  },
};

</script>
