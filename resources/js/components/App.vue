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

    data(){
        return {
            token: null,
        }
    },

    methods: {
        getToken(){
            this.token = localStorage.getItem('access_token');
        },

        getAuthUser(){
            axios.get('/api/v1/user').then(res => {
                store.state.auth.authUser = res.data
            });
        },

        getUsers(){
            axios.get('/api/v1/users').then(res => {
                store.state.users.users = res.data.data;
            });
        },

        logout(){
            console.log('logout')
        }
    },

    mounted() {
        this.getToken();
        this.getUsers();
        this.getAuthUser();
    },

    created() {
        axios.defaults.headers.common["Authorization"] = "Bearer " + localStorage.getItem('access_token')
    },

    updated() {
        this.getToken();
        this.getUsers();
        this.getAuthUser();
    }
}
</script>
