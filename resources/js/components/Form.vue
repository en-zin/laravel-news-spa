<template>
    <div class="container" >
        <p class="col-sm-12 col-md-12 mb-4">さぁ、最新のニュースをシェアしましょう</p>
            <form action="" @submit.prevent="send">
                <div class="form-group d-flex">
                    <label for="title" class="col-sm-12 col-md-2 col-lg-2">タイトル</label>
                    <input type="text" name="title" class="col-sm-12 col-md-9 col-lg-6 form-control ml-2 mr-2" id="title" v-model="title">
                </div>
                <div class="form-group d-flex">
                    <label for="contents" class="col-sm-12 col-md-2 col-lg-2" >記事</label>
                    <textarea name="content" class="col-sm-12 col-md-9 col-lg-6 form-control ml-2 mr-2" id="contents" v-model="content"></textarea>
                </div>
                <div class="form-control-file d-flex">
                    <!-- <label for="sam" class="col-sm-12 col-md-2 col-lg-2 mr-2 ml-2  label-sam">サムネイル</label>
                    <input type="file" name="picture" value="ファイルを選択" class=""> -->
                </div>
                <button type="submit" class="btn btn-primary">送信</button>
            </form>
    </div>

</template>

<script>

    export default {
        data() {
            return {
                //他のデータ略
                article: {},
                title: "",
                content: "",
            }
        },

        methods: {
            send() {
                axios.post('/article/',{
                    title: this.title,
                    content: this.content
                })
                    .then(response => {
                    console.log(response)
                })
            }
        }

    }

</script>
