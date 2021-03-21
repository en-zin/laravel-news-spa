<template>
    <div class="container" >
        <div class="container row">
            <div class="container col-sm-12 col-md-12 mb-4">
                <p class="" >さぁ、最新のニュースをシェアしましょう</p>
            </div>
        </div>

        <div class="container">
            <Validation :validation="validation"></Validation>
        </div>
        <div class="container">
            <form action="" v-on:submit.prevent="submit">
                <!-- vueでformの制御をしている -->
                <div class="form-group d-flex row">
                    <label for="title" class="col-sm-12 col-md-2 col-lg-2">タイトル</label>
                    <input type="text" name="title" class="col-sm-12 col-md-9 col-lg-6 form-control ml-2 mr-2" id="title" v-model="title">
                    <!-- v-model: inputやtextareaの中身をリアルタイムで取得している  -->
                </div>
                <div class="form-group d-flex row">
                    <label for="content" class="col-sm-12 col-md-2 col-lg-2" >記事</label>
                    <textarea name="content" rows="4"  resize: none class="col-sm-12 col-md-9 col-lg-6 form-control ml-2 mr-2" id="content" v-model="content"></textarea>
                </div>
                <div class="form-control-file d-flex row">
                    <label for="sam" class="col-sm-12 col-md-2 col-lg-2 mr-2 ml-2  label-sam">サムネイル</label>
                    <div class="row">
                        <input type="file"  @change="confirmImage" value="ファイルを選択">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">送信</button>
            </form>
        </div>

        <div class="container"  v-show="loading">
            <Loading></Loading>
        </div>

        <div class="container" v-for="article in articles" :key="article.id">
        <!-- v-for: foreachみたいなもんやり方は公式参照 -->
        <!-- ::kye: forで回すときに固有のidをつけてあげる. つけてあげないとvue? js?が迷子になる -->
            <Article :article="article" v-show="!loading"></Article>
        </div>
    </div>
</template>

<script>

import Article from './Article.vue';
import Validation from './Validation.vue';
import Loading from './Loading.vue';

    export default {

        components: {
            Article,
            Validation,
            Loading,
        },

        data() {
            return {
                loading: true,
                articles: [],
                validation: [],
                title: "",
                content: "",
                file: "",
                size: "",
                confirmedImage: "",
            }
            // dataはtemplate(view？ ユーザーの見える側でつかうメソッドの型を定義する)
        },



        created() {
            axios.get('/article')
            .then((response) => {
                this.articles = response.data;
                this.loading = false;
            })
            .catch((error) => {
                console.log('false')
            });
        },

        methods: {

            confirmImage(e) {
                this.file = e.target.files[0];
                // ファイル自体を取得
                this.size = e.target.files[0].size;
                // ファイルのサイズを取得
                if((this.size) > 2000000) {
                    this.validation.push("画像のサイズが20MBこえてます")
                }
            },

            submit() {
                if(!(this.title) || !(this.content)) {
                    if(!(this.title)) {
                        this.validation.push("タイトルがないです。")
                    }
                    if(!(this.content)) {
                        this.validation.push("記事がないです")
                    }
                    return false;
                }

                let data = new FormData();
                data.append("title", this.title);
                data.append("content", this.content);
                data.append("file", this.file);

                axios.post('/article',data)

                .then((response) =>{
                        this.articles = response.data;
                    }
                )

                .catch((error)=> {
                    console.log('false')
                }),

                this.title = "",
                this.content = ""
            }
        }
    }


</script>
