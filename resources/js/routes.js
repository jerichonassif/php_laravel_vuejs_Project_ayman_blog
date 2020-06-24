
import login from './components/login.vue';
import Home from "./components/Home.vue";
import Register from "./components/Register";
import Dashboard from "./components/Dashboard";
import Posts from "./components/Posts";
import SinglePost from "./components/SinglePost";
import Books from "./components/Books";
import SingleBook from "./components/SingleBook";
import massge from "./components/massge";
import images from "./components/images";





// import store from "./store";

// import store from "./store";




export const routes = [
    {
        path: "/vue/",
        name: "home",
        component: Home,

    },
    {
        path: "/vue/massge",
        name: "massge",
        component: massge,

    },


    {
        path: '/vue/login',
        component: login,
        name: 'login',
        meta: {
            guest : true
        }

    },
    {
        path: "/vue/register",
        name: "register",
        component: Register,
        meta: {
            guest : true
        }


    },
    {
        path: "/vue/dashboard",
        name: "dashboard",
        component: Dashboard,
        meta: {
            secure : true
        }

    },
    {
        path: "/vue/posts",
        name: "posts",
        component: Posts,
        meta: {
            secure : true
        }

    },
    {
        path: "/vue/books",
        name: "books",
        component: Books,
        meta: {
            secure : true
        }

    },
    {
        path: "/vue/post/:id",
        name: "post",
        component: SinglePost,
        meta: {
            secure : true
        }

    },
    {
        path: "/vue/book/:id",
        name: "book",
        component: SingleBook,
        meta: {
            secure : true
        }

    },
    {
        path: "/vue/images",
        name: "images",
        component: images,
        meta: {
            secure : true
        }

    },
    {
        path: '*',
        component: require('./components/nofoundpage.vue')
    }
];



