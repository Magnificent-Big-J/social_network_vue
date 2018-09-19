<template>
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="card" v-for="post in posts">
                    <div class="card-header">
                        <img :src="post.user.avatar" style="width: 40px; height: 40px;" class="avatar-feed" alt="">
                        {{post.user.name}}
                    </div>
                    <div class="card-body">
                        <p class="text-left mb-2">
                            {{post.content}}
                            <span class="pull-right">{{post.created_at}}</span>
                        </p>
                       <app-likes :id="post.id"></app-likes>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Likes from '../components/Like'
    export default {
        name: "feed",
    components:{
            appLikes:Likes
    },

        methods:{
            get_feed()
            {
                axios.get('/feed')
                    .then((response)=>{

                        response.data.forEach((post)=>{
                            this.$store.commit('add_post',post)
                })

                })
            }
        },
        mounted(){
            this.get_feed()
        },
        computed:{
            posts()
            {
                return this.$store.getters.all_posts
            }
        }
    }
</script>

<style scoped>
.avatar-feed{
    border-radius: 50%;
}
</style>