<template>
    <div class="row">
        <div class="col-sm-12 col-md-4 col-lg-3 mb-4">
            <div class="card">
                <div class="card-body">
                    <form action=""  v-on:submit.prevent="submit">
                        <textarea name="" id="" rows="4" class="border-0"  v-model="comment"></textarea>
                        <button type="submit"></button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-3 mb-4">
           <div class="card" v-for="comment in comments" :key="comment.id">
                <div class="card-body">
                    <p>{{comment.comment}}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {

    data() {
        return {
            id:"",
            comments: [],
            comment: "",
        }
    },

    created() {
        axios.get("/comment",{
            params:{
                id: this.$route.params.id
            }
        })
        .then(response => {
            this.comments= response.data;
            // this.loading = false;
        })
        .catch(error => {
            console.log('false')
        })
    },

    methods:{

        submit(){
            axios.post("/comment",{
                comment: this.comment,
                content_id: this.$route.params.id
            })
            .then((response) =>{
               this.comments = response.data;
            })
        }
    }
}
</script>
