<template>
    <div v-if="loading">
        <Loader/>
    </div>
    <div v-else>
        <h1 class="h1 mb-3">
            {{task?.name}} status {{task?.status}}
        </h1>
        <p class="text-justify h3">
            {{task?.description}}
        </p>
        <router-link :to="{name: 'tasks.edit', params: {
            project_id: task?.project?.id,
            task_id: task?.id
        }}" class="btn btn-dark me-3">
            Edit
        </router-link>
        <router-link :to="{name: 'projects.show', params: {id: task?.project?.id}}" class="btn btn-secondary">
            Back
        </router-link>
    </div>
</template>
<script>
import axios from "axios";
import Loader from "../Loader/Loader.vue";

export default {
    components: {Loader},
    data(){
        return {
            task: null,
            loading: true
        }
    },

    methods: {
        getTask(){
            axios.get('/api/v1/tasks/' + this.$route.params.task_id).then(res => {
                this.task = res.data.data;
                this.loading = false;
            });
        }
    },

    mounted() {
        this.getTask();
    }
}
</script>

