<template>
   <div>

       <span class="text-center " v-if="loading"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i></span>
       <p class="text-center"  v-if="!loading">
           <button class="btn btn-success" v-if="status==0" @click="add_friend">Add Friend</button>
           <button class="btn btn-success" v-if="status=='pending'" @click="accept_friend">Accept Friend</button>
           <span class="text-success" v-if="status=='waiting'">
                    Waiting for response
           </span>
           <span class="text-success text-center" v-if="status=='friends'">
                    Already Friends
           </span>

       </p>
   </div>
</template>

<script>
    import axios from 'axios'

    export default {
        name: "friend",
        props:['profile_user_id'],
        data(){
            return{
                status:'',
                loading:true,
                statusMess:'',

            }
        },
        methods:{
            add_friend(){
                this.loading = true
                axios.get('/add_friend/' + this.profile_user_id)
                    .then((response)=>{
                        if(response.data == 1)
                        {
                           this.status = 'waiting'
                            let values = 'Friend request sent successfully'

                            new Noty({
                                type: 'success',
                                text: values,
                                timeout: 3000,
                                layout: "topCenter",
                                theme: "nest"
                            }).show();
                            this.loading = false

                        }
                })
            },
            accept_friend()
            {
                this.loading = true
                axios.get('/accept_friend/' + this.profile_user_id)
                    .then((response)=>{
                    if(response.data == 1)
                {
                    this.status = 'friends'

                    let values = 'You are now friends'
                    new Noty({
                        type: 'success',
                        text: values,
                        timeout: 3000,
                        layout: "topCenter",
                        theme: "nest"
                    }).show();
                    this.loading = false
                }
            })
            }
        },
        mounted(){
            axios.get('/check_relationship_status/'+ this.profile_user_id)
                .then((response)=>{
                  this.status = response.data.status
                  this.loading = false


            })
        }
    }
</script>

<style scoped>

</style>