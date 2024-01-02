<template>
    <div v-if="loading">
        <Loader/>
    </div>
    <div v-else>
        <div class="mb-3">
            <h1>{{task?.name}}<span class="h5">({{task?.status}})</span></h1>
        </div>
        <p class="text-justify h3">
            {{task?.description}}
        </p>
        <Edit v-bind:task="task"/>
        <router-link :to="{name: 'projects.show', params: {id: task?.project?.id}}" class="btn btn-dark ms-3">
            Back
        </router-link>
    </div>
</template>
<script>
import axios from "axios";
import Loader from "../Loader/Loader.vue";
import Modal from "../Modal/Modal.vue";
import store from "../../store/store.js";
import Edit from "./Edit.vue";

export default {
    computed: {
        store() {
            return store
        },
    },

    components: {
        Edit,
        Modal,
        Loader
    },

    data(){
        return {
            task: null,
            loading: true,
        }
    },

    methods: {
        getTask(){
            axios.get('/api/v1/tasks/' + this.$route.params.task_id).then(res => {
                this.task = res.data.data;
                this.loading = false;
            });
        },
    },

    mounted() {
        this.getTask();
    }
}
</script>

