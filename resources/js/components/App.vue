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

export default {
    components: {
        Navbar
    },

    data(){
        return {
            token: null
        }
    },

    mounted() {
        this.getToken();
    },

    updated() {
        this.getToken();
    },

    methods: {
        logout(){
            axios.post('api/v1/logout').then(() => {

                if(localStorage.getItem('x_xsrf_token')){
                    localStorage.removeItem('x_xsrf_token');
                }

                this.$router.push('/login');
            });
        },

        getToken(){
            this.token = localStorage.getItem('x_xsrf_token');
        }
    }
}
</script>
