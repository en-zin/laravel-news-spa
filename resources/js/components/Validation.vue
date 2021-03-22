<template>
    <div>
        <div class="container col-sm-12 col-md-2 col-lg-2">

        </div>
        <div v-if="validation.length" class="container col-sm-12 col-md-9 col-lg-6 ml-2 pl-0 pr-0">
            <ul>
                <li v-for="error in validation" >{{ error }}</li>
            </ul>
        </div>
    </div>
</template>


<script>

export default {
props: ["validation"]
}
</script>
