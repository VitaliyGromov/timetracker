<template>
    <div class="card">
        <div class="card-header">
            Login
        </div>
        <div class="card-body">
            <div class="form-group mb-3">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" v-model="email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password" v-model="password">
            </div>
            <button @click.prevent="login" type="submit" class="btn btn-secondary">Login</button>
        </div>
    </div>
</template>
<script>
import axios from "axios";
import store from "../../store/store.js";

export default {
    data(){
        return {
            email: null,
            password: null
        }
    },
    methods: {
        login(){
            axios.get('/sanctum/csrf-token').then(() => {
                axios.post('/api/v1/login', {
                    email: this.email,
                    password: this.password
                }).then(res => {
                    localStorage.setItem('access_token', res.data.access_token);
                    this.$router.push({name: 'projects'});
                    this.email = null;
                    this.password = null;
                });
            });
        }
    }
}
</script>
