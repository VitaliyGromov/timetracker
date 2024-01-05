<template>
    <div class="card">
        <div class="card-header">
            Register
        </div>
        <div class="card-body">
            <div class="form-group mb-3">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" v-model="formData.name" class="form-control" id="name" placeholder="Enter name">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group mb-3">
                <label for="email">Email address</label>
                <input type="email" v-model="formData.email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group mb-3">
                <label for="password">Password</label>
                <input type="password" v-model="formData.password" class="form-control" id="password" placeholder="Password">
            </div>
            <button type="submit" @click.prevent="register" class="btn btn-secondary">Register</button>
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    data(){
        return {
            formData: {
                email: null,
                name: null,
                password: null
            }
        }
    },

    methods: {
        register(){
            axios.post('/api/v1/register', this.formData).then(() => {
                this.$router.push('/login');
            });
        }
    }
}
</script>
