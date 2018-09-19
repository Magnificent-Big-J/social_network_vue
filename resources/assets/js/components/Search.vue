<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 mb-2">
                <input type="text" class="input-lg form-control" placeholder="Search for a friend" v-model="query" @keyup.enter="search">
            </div>
        </div>
        <div class="row">
            <ul class="list-group" v-for="result in results" v-if="results.length">
                <li class="list-group-item">
                    <img :src="myimage(result.avatar)"  width="50px" height="50px" class="search-user" >
                    <h4 class="text-center">{{result.name}}</h4>
                </li>
            </ul>

        </div>
    </div>
</template>

<script>
    let algoiasearch = require('algoliasearch')
    let client = algoiasearch('FY2VOCHAFK','db7144984712c8118309f73ce3875e44')
    let index = client.initIndex('users')
    export default {
        name: "search",
        data(){return{
            query:'',
            results:[]
        }},
        mounted(){

        },
        methods:{
            search()
            {
                index.search(this.query,(err,content)=>{
                    this.results = content.hits
            })
            },
            myimage(str)
            {
                return str.replace("localhost", "127.0.0.1:8000")
            }
        }
    }
</script>

<style scoped>
.search-user{
   border-radius: 50%;
}
</style>