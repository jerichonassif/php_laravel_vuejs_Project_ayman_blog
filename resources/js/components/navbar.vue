<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <router-link class="navbar-brand" to="/">Ayman <span class="blogspan">Blog</span></router-link>
            <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item" >
                        <router-link class="blogspan my-2 mr-3 btn-block" to="/vue/posts"  v-if="loggedIn">posts</router-link>
                    </li>

                    <li class="nav-item" >
                        <router-link class=" blogspan my-2 mr-3 btn-block" to="/vue/books"  v-if="loggedIn">books</router-link>
                    </li>

                    <li class="nav-item" >
                        <router-link class=" blogspan my-2 mr-3 btn-block" to="/vue/massge"  v-if="loggedIn">massge </router-link>
                    </li>

                    <li class="nav-item" >
                        <router-link class="btn btn-primary my-1 btn-block" to="/vue/login"  v-if="!loggedIn">Login</router-link>
                    </li>
                    <li class="nav-item ">
                        <router-link
                            class="btn btn-success my-1 ml-1 btn-block"
                            to="/vue/register"
                            tabindex="-1"
                            aria-disabled="true"
                            v-if="!loggedIn"
                        >Register</router-link>
                    </li>


                    <li class="nav-item" v-if="loggedIn">
                        <button class="btn btn-warning my-1 ml-1 btn-block" @click.prevent="performLogout">Logout</button>
                    </li>


                </ul>
            </div>
        </nav>
    </div>

</template>


<script>
    export default {
        data() {
            return {
                token: null

            };
        },
        mounted() {
           this.checkUserStatus()


        },
        computed: {
            loggedIn(){
                return this.$store.getters.get_loggedIn;

            }
            , User(){
                return this.$store.getters.get_user;

            }


        },
        methods: {
            checkUserStatus()
            {
                if(localStorage.getItem('token') != null){
                    this.token = localStorage.getItem('token');
                }
            },
            performLogout() {
                this.$store
                    .dispatch("performLogoutAction")
                    .then(res => {
                        this.$router.push("/vue/login");
                    })
                    .catch(err => {
                        console.log(err);
                    });
            }

        }
    };
</script>

<style>
    .blogspan{
        color: #fff;
    }
</style>
