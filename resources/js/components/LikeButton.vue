<template>
    <div>
    <button class=" btn btn-primary h4  ml-4" @click="likePost" v-text="buttonText"></button>
    </div>

</template>

<script>
    export default {
    props: ['postId','likes'] ,
    mounted() {
            console.log('Component mounted.')
        },


        data:function (){
            return {
                status : this.likes,
            }
        },

        methods:{
            likePost(){
                 axios.post('/dislike/'+this.postId)
                .then(response => {


                    this.status = ! this.status;
                    console.log(response.data);
                })
                
                .catch(errors=>
                {
                        if(errors.response.status == 401){
                            window.location = '/login';
                        }
                });
            }
        },
        computed: {
                buttonText(){
                    return (this.status)? 'Unlike ' : 'like'  ;
                } 
        }



    }
</script>
