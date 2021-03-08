<template>
    <div>
        <p>{{article.title}}</p>
        <p>{{article.content}}</p>
        <router-link :to="`/post/details/${article.articleId}`">きじはこれだよ</router-link>
        <!-- router-link :to="``": vue.jsのspaでつかうaタグ ダブルクォーテーションとバッククォーテーションで囲う -->
    </div>
</template>

<script>

export default {
    props: ["article"]
}
</script>
