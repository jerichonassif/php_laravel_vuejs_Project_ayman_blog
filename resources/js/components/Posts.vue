<template>
    <diV>
        <div class="container">
            <button   class="btn btn-info btn-block" @click="formPostActive =! formPostActive">........</button>

            <form v-if="formPostActive" action="#"  enctype="multipart/form-data">

                <div class="form-group">
                    <input type="hidden"  v-model="user_id" class="form-control" />

                </div>

                <div class="form-group">
                <label for="title">title</label>
                <input type="text" name="title" id="title" v-model="title" class="form-control" />
                <div style="color:red;" v-if="error">{{ error }}</div>
                </div>

                <div class="form-group">
                <label for="content">content</label>
                <input
                type="text"
                name="content"
                id="content"
                v-model="content"
                class="form-control"
                />
                <div style="color:red;" v-if="error">{{ error }}</div>
                </div>

                <div class="input-group mb-3">
                <div class="custom-file">
                <input type="file"  class="custom-file-input" @change="updateImage" accept="image/*"  name="image" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                <label v-model="image" class="custom-file-label" for="inputGroupFile01" >Choose post image</label>
                </div>
                <div style="color:red;" v-if="error">{{ error }}</div>

                </div>


                <div class="form-group">
                <button  class="btn btn-info btn-block" @click.prevent="addPostApi">add post</button>
                </div>
            </form>
            <tile v-show="isLoading"></tile>
            <div class="row">
                <div v-for="dataa in data"  :key="dataa.id" class=" col-lg-4 col-sm-4 col-md-4">
                    <div class="card" style="width: 18rem;">
                        <router-link tag="button"  class="btn btn-danger" :to="`/vue/post/${dataa.id}`">{{dataa.id}}</router-link>

                        <img :src="`/${dataa.image}`" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h2 class="card-title">{{dataa.title}}</h2>
                            <h5 class="card-title">Created at : {{dataa.created_at}}</h5>
                            <h5 class="card-title">updated at : {{dataa.updated_at}}</h5>

                            <p class="card-text">{{dataa.content}}</p>
                            <button  class="btn btn-danger" @click.prevent="deletePostApi(dataa.id)">Delete</button>
                            <router-link tag="button"  class="btn btn-info" :to="`/vue/post/${dataa.id}`">show</router-link>

                            <!-- Button trigger modal -->
                            <button tag="button" @click="editPost(dataa.id)"  class="btn btn-success" data-toggle="modal" data-target="#exampleModal" >edit</button>



                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Post</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form  action="#"  enctype="multipart/form-data">

                                                <div class="form-group">
                                                    <input type="hidden"  v-model="user_id" class="form-control" />

                                                </div>

                                                <div class="form-group">
                                                    <label for="title">title</label>
                                                    <input type="text" name="title" id="title" v-model="editForm.title" class="form-control" />
                                                    <div style="color:red;" v-if="error">{{ error }}</div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="content">content</label>
                                                    <input
                                                        type="text"
                                                        name="content"
                                                        id="content"
                                                        v-model="editForm.content"
                                                        class="form-control"
                                                    />
                                                    <div style="color:red;" v-if="error">{{ error }}</div>
                                                </div>

                                                <div class="input-group mb-3">
                                                    <div class="custom-file">
                                                        <input type="file"  class="custom-file-input" @change="updateEditImage" accept="image/*"  name="image" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                                        <label v-model="editForm.image" class="custom-file-label" for="inputGroupFile01" >Choose post image</label>
                                                    </div>
                                                    <div style="color:red;" v-if="error">{{ error }}</div>

                                                </div>


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
                title: "",
                content: "",
                image:"",
                error: "",
                isLoading: false,
                formPostActive: false,
                editForm:{
                    title:'',
                    content:'',
                    image:''
                }
            };
        },
        computed:{
            user_id(){
                return this.$store.getters.get_user.id;
            }
        },
        mounted() {
            this.isLoading = true;


            axios.get('http://127.0.0.1:8000/api/posts')
                .then(res => {
                    this.isLoading = false;


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
                this.isLoading = true;
                let data=new FormData();
                data.append('title',this.title);
                data.append('content',this.content);
                data.append('image',this.image);
                data.append('user_id',this.user_id);
                axios.post('http://127.0.0.1:8000/api/posts',data,{
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                    .then(res => {
                        this.isLoading = false;
                        console.log(res)
                        this.data.push(res.data.data);
                        this.title = "";
                        this.content = "";
                        this.image = "";


                    })
                    .catch(err=> {
                        console.log(err)

                    });


            },
            deletePostApi(id){
                this.isLoading = true;

                axios.delete('http://127.0.0.1:8000/api/posts/'+id)
                    .then(res => {
                        this.isLoading = false;

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

                this.$router.push('/vue/post/'+id)
            },
            updateImage(event){
                let files = event.target.files; // FileList object
                this.image = files[0];
            },
            updateEditImage(event){
                let files = event.target.files; // FileList object
                this.editForm.image = files[0];
            },
            editPost(id){
                let post=this.data.find(post=>post.id===id)
                console.log(post)
                this.editForm.title=post.title;
                this.editForm.content=post.content;
                this.editForm.image=post.image;

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

                data.append('title',this.editForm.title);
                data.append('content',this.editForm.content);
                data.append('image',this.editForm.image);
                data.append('_method','PATCH');
                    axios.post('http://127.0.0.1:8000/api/posts/'+id,data,{
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
