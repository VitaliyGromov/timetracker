<template>
    <Navbar/>
    <div class="py-4">
        <div class="container">
            <router-view/>
        </div>
    </div>
</template>

<script setup>
import Navbar from "./Navbar/Navbar.vue";
</script>
