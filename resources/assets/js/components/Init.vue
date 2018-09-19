<template>
    <div></div>
</template>

<script>
    export default {
        name: "init",
        mounted()
        {
            this.get_auth_user_data();
        },
        methods:{
            get_auth_user_data()
            {
                axios.get('/get_auth_user_data')
                    .then((response)=>{

                        this.$store.commit('auth_user_data',response.data)

                })
            }
        }
    }
</script>

<style scoped>

</style>