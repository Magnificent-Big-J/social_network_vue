<template>
    <div></div>
</template>

<script>
    export default {
        name: "notification",
        props:['id'],
        data(){return{
           messAlert:''
        }},
        mounted(){
                this.listen()
        },
        methods:{
            listen(){
                Echo.private('App.User.'+this.id)
                    .notification((notification)=>{

                    let values  = notification.name + notification.message
                new Noty({
                    type: 'success',
                    text: values,
                    timeout: 3000,
                    layout: "topCenter",
                    theme: "nest"
                }).show()
                    this.$store.commit('add_not',notification)
                document.getElementById('noty_audio').play()

                })
            }
        }
    }
</script>

<style scoped>

</style>