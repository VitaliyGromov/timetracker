<template>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <div class="m-2">
                <router-link v-if="this.$parent.token" to="/projects" class="navbar-brand">Projects</router-link>
                <router-link to="/statistic" v-if="this.$parent.token" class="navbar-brand">Statistics</router-link>
            </div>
            <div class="m-2">
                <router-link v-if="!this.$parent.token" to="login" class="navbar-brand">Login</router-link>
                <router-link v-if="!this.$parent.token" to="register" class="navbar-brand">Register</router-link>
                <a href="" v-if="this.$parent.token" class="navbar-brand" @click.prevent="this.$parent.logout">Logout</a>
            </div>
        </div>
    </nav>
</template>

<script>

</script>
