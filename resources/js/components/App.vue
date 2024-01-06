<template>
    <Navbar v-bind:token="token"/>
    <div class="py-4">
        <div class="container">
            <router-view :key="$route.fullPath"/>
        </div>
    </div>
</template>

<script>
import Navbar from "./Navbar/Navbar.vue";
import axios from "axios";
import store from "../store/store.js";

export default {
    components: {
        Navbar
    },

    data(){
        return {
            token: null
        }
    },

    methods: {
        getToken(){
            this.token = localStorage.getItem('x_xsrf_token');
        },

        getAuthUser(){
            axios.get('/api/v1/users/authUser').then(res => {
                store.state.auth.authUser = res.data
            });
        },

        getUsers(){
            axios.get('/api/v1/users').then(res => {
                store.state.users.users = res.data.data;
            });
        },

        logout(){
            axios.post('/api/v1/logout').then(() => {
                if(localStorage.getItem('x_xsrf_token')){
                    localStorage.removeItem('x_xsrf_token');
                }

                this.$router.push('/login');
            });
        }
    },

    mounted() {
        this.getToken();
        this.getUsers();
        this.getAuthUser();
    },

    updated() {
        this.getUsers();
        this.getAuthUser();
        this.getToken();
    }
}
</script>
