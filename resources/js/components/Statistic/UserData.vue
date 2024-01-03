<template>
    <div v-if="loading">
        <Loader/>
    </div>
    <div v-else>
        <h1>Statistic for {{user?.name}}</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>Кол-во задач в статусе NEW</th>
                <td>{{statistic?.new_tasks}}</td>
            </tr>
            <tr>
                <th>Кол-во задач в статусе IN PROCESS</th>
                <td>{{statistic?.in_process_tasks}}</td>
            </tr>
            <tr>
                <th>Кол-во задач в статусе ON TESTS</th>
                <td>{{statistic?.on_test_tasks}}</td>
            </tr>
            <tr>
                <th>Кол-во задач в статусе RETUNED</th>
                <td>{{statistic?.returned_tasks}}</td>
            </tr>
            <tr>
                <th>Кол-во задач в статусе COMPLETED</th>
                <td>{{statistic?.completed_tasks}}</td>
            </tr>
            <tr>
                <th></th>
                <td></td>
            </tr>
            <tr>
                <th>Общее время на задачи</th>
                <td>{{statistic?.time_spent}}</td>
            </tr>
            </tbody>
        </table>
        <router-link class="btn btn-secondary" to="/statistic">Back</router-link>
    </div>
</template>
<script>

import {defineComponent} from "vue";
import Modal from "../Modal/Modal.vue";
import axios from "axios";
import Loader from "../Loader/Loader.vue";

export default defineComponent({
    components: {Loader, Modal},

    data(){
        return {
            statistic: null,
            user: null,
            loading: true
        }
    },

    methods: {
        getUserStatistic(){
            axios.get('/api/v1/users/' + this.$route.params.id).then(res => {
                this.user = res.data.data;
            }).then(() => {
                axios.get('/api/v1/statistic/' + this.user.id).then(res => {
                    this.statistic = res.data.data;
                    this.loading = false
                });
            });
        }
    },

    mounted() {
        this.getUserStatistic();
    }
})
</script>
