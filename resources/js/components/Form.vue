<template>
    <div class="container" >
        <div class="container">
            <p class="col-sm-12 col-md-12 mb-4" >さぁ、最新のニュースをシェアしましょう</p>
        </div>
        <div class="container">
            <form action="" v-on:submit.prevent="submit">
                <!-- vueでformの制御をしている -->
                <div class="form-group d-flex">
                    <label for="title" class="col-sm-12 col-md-2 col-lg-2">タイトル</label>
                    <input type="text" name="title" class="col-sm-12 col-md-9 col-lg-6 form-control ml-2 mr-2" id="title" v-model="title">
                    <!-- v-model: inputやtextareaの中身をリアルタイムで取得している  -->
                </div>
                <div class="form-group d-flex">
                    <label for="content" class="col-sm-12 col-md-2 col-lg-2" >記事</label>
                    <textarea name="content" class="col-sm-12 col-md-9 col-lg-6 form-control ml-2 mr-2" id="content" v-model="content"></textarea>
                </div>
                <div class="form-control-file d-flex">
                    <!-- <label for="sam" class="col-sm-12 col-md-2 col-lg-2 mr-2 ml-2  label-sam">サムネイル</label>
                    <input type="file" name="picture" value="ファイルを選択" class=""> -->
                </div>
                <button type="submit" class="btn btn-primary">送信</button>
            </form>
        </div>

        <div class="container" v-for="article in articles" :key="article.articleId">
        <!-- v-for: foreachみたいなもんやり方は公式参照 -->
        <!-- ::kye: forで回すときに固有のidをつけてあげる. つけてあげないとvue? js?が迷子になる -->
        <Article :article="article"></Article>
        </div>
    </div>
</template>

<script>

import Article from './Article.vue';

    export default {

        components: {
            Article
        },

        data() {
            return {
                articles: {},
                title: "",
                content: "",
            }
            // dataはtemplate(view？ ユーザーの見える側でつかうメソッドの型を定義する)
        },

        created() {
            axios.get('/article')
            .then((response) => {
                this.articles = response.data
                })
            .catch((error) => {
                console.log('false')
            });
        },

        methods: {

            submit() {

                axios.post('/article',{
                    title: this.title,
                    content: this.content
                })

                .then(
                    axios.get('/article')
                    .then((response) =>{
                        this.articles = response.data
                    })
                    .catch((error)=> {
                        console.log('false')
                    }),

                    this.title = "",
                    this.content = ""
                )

                .catch((error)=> {
                        console.log('false')
                    }
                )
            }
        }
    }

</script>
