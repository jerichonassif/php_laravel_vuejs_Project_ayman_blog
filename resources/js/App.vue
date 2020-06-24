<template>
    <div>
        <navbar/>
        <router-view></router-view>
        <footer/>
    </div>
</template>
<script>

    import navbar from './components/navbar';
    import footer from './components/Footer';



    export default {
        data() {
            return {

            }
        },
        mounted() {


        },
        components:{
            navbar,
            footer
        },

    }
</script>
