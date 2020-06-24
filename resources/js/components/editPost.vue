<template>
    <div>
        <form  action="#"  enctype="multipart/form-data">

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


            <!--<div class="form-group">-->
                <!--<button  class="btn btn-info btn-block" @click.prevent="addPostApi">add post</button>-->
            <!--</div>-->
        </form>
    </div>
</template>

<script>

    export default{
        data(){
            return{
                data:[{}],
            }
        },
        // mounted(){
        //     let id=this.$route.params.id;
        //     axios.get('http://127.0.0.1:8000/api/posts/'+id)
        //         .then(res => {
        //             console.log(res)
        //             // this.data = res
        //         })
        //
        //         .catch(err=> {
        //             console.log(err)
        //         });
        // }
    }
</script>
