<template>
    <div>
      <div class="container"  v-show="loading">
        <Loading v-show="loading" class="mt-5"></Loading>
      </div>
      <div class="container mt-4" v-for="article in articles" :key="article.id" v-show="!loading">
            <p class="h4">{{article.title}}</p>
            <p class="mt-1">{{article.content}}</p>
      </div>
      <hr>
      <div class="container">
          <CommentComponent></CommentComponent>
      </div>
    </div>
</template>


<script>
import Loading from './Loading.vue';
import CommentComponent  from './Comment.vue';
export default {

  components:{
    Loading,
    CommentComponent
  },

  data() {
    return {
      articles: {},
      title: "",
      content: "",
      details : {},
      loading: true
    }
  },

  created() {
    axios.get(this.$route.fullPath)
    .then(response => {
      this.articles = response.data;
      this.loading = false;
    })
    .catch(error=> {
      console.log('false')
    });
    console.log(this.$route.params.id);
  },

};

</script>
