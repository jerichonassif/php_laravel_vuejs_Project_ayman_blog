<template>
    <diV>
        <div class="container">
            <button   class="btn btn-info btn-block" @click="formPostActive =! formPostActive">........</button>

            <form v-if="formPostActive" action="#"  enctype="multipart/form-data">

                <!--<div class="form-group">-->
                    <!--<input type="hidden"  v-model="user_id" class="form-control" />-->

                <!--</div>-->

                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" name="name" id="name" v-model="name" class="form-control" />
                    <div style="color:red;" v-if="error">{{ error }}</div>
                </div>

                <div class="form-group">
                    <label for="details">details</label>
                    <input
                        type="text"
                        name="details"
                        id="details"
                        v-model="details"
                        class="form-control"
                    />
                    <div style="color:red;" v-if="error">{{ error }}</div>
                </div>

                <!--<div class="input-group mb-3">-->
                    <!--<div class="custom-file">-->
                        <!--<input type="file"  class="custom-file-input" @change="updateImage" accept="image/*"  name="image" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">-->
                        <!--<label v-model="image" class="custom-file-label" for="inputGroupFile01" >Choose post image</label>-->
                    <!--</div>-->
                    <!--<div style="color:red;" v-if="error">{{ error }}</div>-->

                <!--</div>-->


                <div class="form-group">
                    <button  class="btn btn-info btn-block" @click.prevent="addPostApi">Add book</button>
                </div>
            </form>
            <div class="row">
                <div v-for="dataa in data"  :key="dataa.id" class="cards col-lg-4 col-sm-4 col-md-4">
                    <div class="card" style="width: 18rem;">
                        <!--<img :src="`/${dataa.image}`" class="card-img-top" alt="...">-->
                        <div class="card-body">
                            <h5 class="card-title">{{dataa.name}}</h5>
                            <p class="card-text">{{dataa.details}}</p>
                            <button  class="btn btn-danger" @click.prevent="deletePostApi(dataa.id)">Delete</button>
                            <router-link tag="button"  class="btn btn-info" :to="`/vue/book/${dataa.id}`">show</router-link>

                            <!-- Button trigger modal -->
                            <button tag="button" @click="editPost(dataa.id)"  class="btn btn-success" data-toggle="modal" data-target="#exampleModal" >edit</button>



                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit book</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form  action="#"  enctype="multipart/form-data">

                                                <!--<div class="form-group">-->
                                                    <!--<input type="hidden"  v-model="user_id" class="form-control" />-->

                                                <!--</div>-->

                                                <div class="form-group">
                                                    <label for="title">name book</label>
                                                    <input type="text" name="title" id="title" v-model="editForm.name" class="form-control" />
                                                    <div style="color:red;" v-if="error">{{ error }}</div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="details">details</label>
                                                    <input
                                                        type="text"
                                                        name="details"
                                                        id="details"
                                                        v-model="editForm.details"
                                                        class="form-control"
                                                    />
                                                    <div style="color:red;" v-if="error">{{ error }}</div>
                                                </div>

                                                <!--<div class="input-group mb-3">-->
                                                    <!--<div class="custom-file">-->
                                                        <!--<input type="file"  class="custom-file-input" @change="updateImage" accept="image/*"  name="image" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">-->
                                                        <!--<label v-model="editForm.image" class="custom-file-label" for="inputGroupFile01" >Choose post image</label>-->
                                                    <!--</div>-->
                                                    <!--<div style="color:red;" v-if="error">{{ error }}</div>-->

                                                <!--</div>-->


                                                <!--<div class="form-group">-->
                                                <!--<button  class="btn btn-info btn-block" @click.prevent="addPostApi">add post</button>-->
                                                <!--</div>-->
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" @click.prevent="edditPostApi(dataa.id)">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>





        </div>
    </diV>
</template>

<script>

    import axios from "axios";
    // import editPost from "./editPost";

    export default {

        name: "Posts",
        data() {
            return {
                data:[{}],
                token:"",
                id: "",
                name: "",
                details: "",
                // image:"",
                error: "",
                isLoading: false,
                formPostActive: false,
                editForm:{
                    name:'',
                    details:'',
                    // image:''
                }
            };
        },
        computed:{
            user_id(){
                return this.$store.getters.get_user.id;
            }
        },
        mounted() {

            this.token = localStorage.getItem('token');


            console.log(this.token)


            const auth = {
                headers: {'Authorization':'bearer ' + this.token,
                    'Content-Type' : 'text/plain'
                }
            }
            console.log(auth)
            axios.get('http://127.0.0.1:8000/api/books',auth)
                .then(res => {
                    console.log(res.data.data)
                    this.data = res.data.data

                })
                .catch(err=> {
                    console.log(err)
                });


        },
        components:{
            // editPost
        },
        methods: {
            addPostApi(){
                let data=new FormData();
                data.append('name',this.name);
                data.append('details',this.details);
                // data.append('image',this.image);
                // data.append('user_id',this.user_id);
                axios.post('http://127.0.0.1:8000/api/books',data,{
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                    .then(res => {
                        console.log(res)
                        this.data.push(res.data.data);
                        this.name = "";
                        this.details = "";

                    })
                    .catch(err=> {
                        console.log(err)
                    });


            },
            deletePostApi(id){
                axios.delete('http://127.0.0.1:8000/api/books/'+id)
                    .then(res => {
                        console.log(res)
                        // this.data.splice(res.data.data.id);
                        this.data= this.data.filter(product=>{
                            return product.id!==id
                        })

                    })

                    .catch(err=> {
                        console.log(err)
                    });

            },
            getPostApi(id){

                this.$router.push('/vue/book/'+id)
            },
            updateImage(event){
                let files = event.target.files; // FileList object
                this.image = files[0];
            },
            editPost(id){
                let post=this.data.find(post=>post.id===id)
                console.log(post)
                this.editForm.name=post.name;
                this.editForm.details=post.details;
                // this.editForm.image=post.image;

                // let id=this.$route.params.id;
                // let data=new FormData();
                // data.append('title',this.title);
                // data.append('content',this.content);
                // data.append('image',this.image);
                // data.append('user_id',this.user_id);
                //     axios.patch('http://127.0.0.1:8000/api/posts/'+id,data,{
                //         headers: {
                //             'Content-Type': 'multipart/form-data'
                //         })
                //         .then(res => {
                //             console.log(res)
                //             // this.data = res
                //         })
                //
                //         .catch(err=> {
                //             console.log(err)
                //         });

            }
            ,edditPostApi(id){
                let data=new FormData();

                data.append('name',this.editForm.name);
                data.append('details',this.editForm.details);
                // data.append('image',this.editForm.image);
                data.append('_method','PATCH');
                axios.post('http://127.0.0.1:8000/api/books/'+id,data,{
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                    .then(res => {
                        console.log(res)
                        // this.data = res
                    })

                    .catch(err=> {
                        console.log(err)
                    });
            }

        },


    };

</script>

<style>

</style>
