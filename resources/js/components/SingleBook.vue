<template>
    <div>
        <div class="row">
            <div class="card" style="width: 18rem;">
                <!--<img :src="`/${data.image}`" class="card-img-top" alt="...">-->
                <div class="card-body">
                    <h5 class="card-title">{{data.name}}</h5>
                    <p class="card-text">{{data.details}}</p>
                    <!--<button  class="btn btn-danger" @click.prevent="deletePostApi(dataa.id)">Delete</button>-->
                </div>
            </div>

        </div>
    </div>
</template>

<script>

    export default{
        data(){
            return{
                data:[{}],
            }
        },
        mounted(){
            let id=this.$route.params.id;
            axios.get('http://127.0.0.1:8000/api/books/'+id)
                .then(res => {
                    console.log(res)
                    this.data = res.data.data
                })

                .catch(err=> {
                    console.log(err)
                });
        }
    }
</script>
