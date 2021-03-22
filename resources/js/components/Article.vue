<template>
    <div>
        <hr>
        <div class="d-flex row">
            <div>
                <img class="post-thumbnail img-fluid rounded-circle" :src="`${article.file_name}`" width=100px/>
            </div>
            <div>
                <p class=" mb-1 h4">{{article.title}}</p>
                <p class="mb-1">{{article.content}}</p>
                <router-link :to="`/post/details/${article.id}`" class="mb-1">きじはこれだよ</router-link>
                <!-- router-link :to="``": vue.jsのspaでつかうaタグ ダブルクォーテーションとバッククォーテーションで囲う -->
            </div>
        </div>
    </div>
</template>

<script>

export default {
    props: ["article"]
}
</script>
