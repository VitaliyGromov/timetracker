<template>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <div class="m-2">
                <router-link v-if="this.$parent.token" to="/projects" class="navbar-brand">Projects</router-link>
                <a v-if="this.$parent.token" href="#" class="navbar-brand">Statistics</a>
            </div>
            <div class="m-2">
                <router-link v-if="!this.$parent.token" to="/login" class="navbar-brand">Login</router-link>
                <router-link v-if="!this.$parent.token" to="/register" class="navbar-brand">Register</router-link>
                <a v-if="this.$parent.token" class="navbar-brand" @click="this.$parent.logout">Logout</a>
            </div>
        </div>
    </nav>
</template>

<script>

</script>
