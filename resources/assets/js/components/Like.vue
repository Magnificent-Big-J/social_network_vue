<template>
    <div>
        <p class="text-left">
            <i class="btn btn-primary btn-xs fa fa-thumbs-up mr-4" v-if="!auth_user_likes_post" @click="like"></i>
            <i class="btn btn-danger btn-xs fa fa-thumbs-down" v-if="auth_user_likes_post" @click="unlike"></i>
        </p>
        <p class="text-center" v-for="like in post.likes">
            <img  :src="like.user.avatar" width="20px" height="20px" class="avatar-like">
        </p>

    </div>
</template>

<script>

    export default {
        name: "like",
        props:['id'],
        mounted(){

        },
        computed:{
           post(){
            return   this.$store.state.posts.find((post)=>{
                  return post.id === this.id
              })
           },
            likers()
            {
                let likers = []

                this.post.likes.forEach((like)=>{
                    likers.push(like.user.id)
            })

                return likers
            },
            auth_user_likes_post(){

                let check_index = this.likers.indexOf(
                    this.$store.state.auth_user.id
                )
                if(check_index == -1)
                {
                    return false
                }
                else {
                    return true
                }
            }
        },
        methods:{
            like()
            {
                axios.get('/like/'+this.id)
                    .then((response)=>{
                        this.$store.commit('update_post_likes',{
                            id: this.id,
                            like: response.data
                     })

                })
                new Noty({
                    type: 'success',
                    text: 'Post Liked Successfully',
                    timeout: 3000,
                    layout: "topCenter",
                    theme: "metroui"
                }).show()
            },
            unlike()
            {
                axios.get('/unlike/'+this.id)
                    .then((response)=>{
                    this.$store.commit('unlike_post',{
                    post_id: this.id,
                    like_id: response.data
                })

            })
                new Noty({
                    type: 'success',
                    text: 'Post Unliked Successfully',
                    timeout: 3000,
                    layout: "topCenter",
                    theme: "metroui"
                }).show()
            }
        }



    }
</script>

<style scoped>
.avatar-like{
    border-radius: 50%;
}
</style>