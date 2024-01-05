<template>
    <Navbar/>
    <div class="py-4">
        <div class="container">
            <router-view/>
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

    methods: {
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
        this.getUsers();
        this.getAuthUser();
    },

    updated() {
        this.getUsers();
        this.getAuthUser();
    }
}
</script>
