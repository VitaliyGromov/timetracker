<template>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <div class="m-2">
                <router-link v-if="token" to="/projects" class="navbar-brand">Projects</router-link>
            </div>
            <div class="m-2">
                <router-link v-if="!token" to="login" class="navbar-brand">Login</router-link>
                <router-link v-if="!token" to="register" class="navbar-brand">Register</router-link>
                <a v-if="token" href="#" class="navbar-brand" @click.prevent="this.$parent.logout">Logout</a>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    props: {
        token: null
    }
}
</script>
