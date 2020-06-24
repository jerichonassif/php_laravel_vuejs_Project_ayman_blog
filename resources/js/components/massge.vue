<template>
    <div>

            <form >
                name <input type="text" name="" id="" v-model='name'>
                <button class="btn btn-danger " type="submit" @click.prevent="addmassge()">add new massge</button>
            </form>

    </div>
</template>

<script>
    import axios from "axios";
    export default {
        name: "massge",
        data(){
            return{
                name: ''
            }
        },
        mounted:{

        },
        methods:{
            addmassge(){
                axios.post('http://127.0.0.1/api/massges',{name: this.name} )
                    .then(res => {
                        console.log(res);
                    })
                    .catch(err => {
                        console.log(err);
                    })
            }
        }
    }
</script>

<style scoped>

</style>
