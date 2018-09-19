<template>
    <div>
        <a href="/notifications" class="nav-link">
            Unread notifications
            <span class="badge badge-primary">{{all_nots_count}}</span>
        </a>
    </div>
</template>

<script>
    export default {
        name: "unread-nots",
        mounted()
        {
            this.get_unread()
        },
        methods:{
            get_unread()
            {
                axios.get('/get_unread')
                    .then((nots)=>{
                    nots.data.forEach( (not) => {
                    this.$store.commit('add_not', not)
            })
                })
            }
        },
        computed:
        {
            all_nots_count()
            {
                return this.$store.getters.all_nots_count
            }
        }
    }
</script>

<style scoped>

</style>