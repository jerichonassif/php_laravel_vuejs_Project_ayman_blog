<template>
    <div class="login">
        <div class>
            <div class="col-md-6 offset-md-3">
                <h2 class="display-4 text-center mt-5">Login Form</h2>

                <form action="#">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" v-model="email" class="form-control" />
                        <div style="color:red;" v-if="error">{{ error }}</div>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input
                            type="password"
                            name="password"
                            id="password"
                            v-model="password"
                            class="form-control"
                        />
                        <div style="color:red;" v-if="error">{{ error }}</div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-info btn-block" @click.prevent="performLogin">Login</button>
                    </div>
                </form>

                <tile v-show="isLoading"></tile>
            </div>
        </div>
    </div>
</template>

<script>

    import axios from "axios";
    export default {

        name: "login",
        data() {
            return {
                email: "",
                password: "",
                error: "",
                isLoading: false
            };
        },
        methods: {
            performLogin() {
                this.isLoading = true;

                this.$store
                    .dispatch("performLoginAction", {
                        email: this.email,
                        password: this.password
                    })
                // this.$validator.validateAll()
                    .then(res => {
                        this.isLoading = false;
                        if(res.data.access_token){
                            this.$router.push("/vue/dashboard");
                        }else{
                            this.error = res.data.data.email;
                            this.error = res.data.data.password
                        }



                    })
                    .catch(err => {
                        this.isLoading = false;
                        this.error = " There was error during login process";
                        console.log(err.message);
                    });
            }
        }
    };
</script>
