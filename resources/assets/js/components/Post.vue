<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <textarea   rows="5" class="form-control" placeholder="What's in your mind" v-model="contents"></textarea>
                        </div>
                        <div class="form-group text-right">
                            <button class="btn btn-primary" :disabled="not_working" @click="create_post">
                                Tell Us
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "post",
        data(){return{
            contents:'',
            not_working:true
        }},
        mounted(){

        },
        watch:{
            contents(){
                if(this.contents.length > 0)
                {
                    this.not_working = false
                }
                else
                {
                    this.not_working = true
                }
            }
        },
        methods:{
            create_post(){
                axios.post('/create/post',{
                    contents: this.contents
                })
                    .then((response)=>{
                        this.contents = ''
                new Noty({
                    type: 'success',
                    text: 'Story told successfully',
                    timeout: 3000,
                    layout: "topCenter",
                    theme: "metroui"
                }).show()
                })
            }
        }

    }
</script>

<style scoped>

</style>