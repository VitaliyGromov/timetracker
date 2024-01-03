<template>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="user in store.state.users.users">
            <th scope="col">{{user?.id}}</th>
            <td>{{user?.name}}</td>
            <td>{{user?.email}}</td>
            <td>
                <router-link :to="{name: 'statistic.user', params: {
                    id: user.id
                }}" class="btn btn-secondary">User Statistic</router-link>
            </td>
        </tr>
        </tbody>
    </table>
</template>

<script>
import store from "../../store/store.js";
import UserData from "./UserData.vue";

export default {
    components: {UserData},
    computed: {
        store() {
            return store
        }
    }
}
</script>
