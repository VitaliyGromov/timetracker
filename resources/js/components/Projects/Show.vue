<template>
    <div v-if="loading">
        <Loader/>
    </div>
    <div v-else>
        <h1 class="h1">
            Project {{project?.name}}
        </h1>
        <div v-if="tasks?.length === 0" class="text-center">
            <div class="card-body">
                <h5 class="card-title">No tasks for this project</h5>
                <p class="card-text">Add tasks, and they will be in the table</p>
                <router-link href="#" class="btn btn-dark me-3" :to="{name: 'tasks.create', params: {
                    id: this.project?.id
                }}">Create task</router-link>
                <Edit v-bind:project="project"/>
                <router-link to="/projects" class="btn btn-secondary ms-3">Back</router-link>
            </div>
        </div>
        <table v-if="tasks?.length !== 0" class="table">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Task name</th>
                <th scope="col">Author</th>
                <th scope="col">Performer</th>
                <th scope="col">Status</th>
                <th scope="col">Handle</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="task in tasks">
                <th scope="row">{{task?.id}}</th>
                <td>{{task?.name}}</td>
                <td>{{task?.author?.name}}</td>
                <td>{{task?.performer?.name ?? '-'}}</td>
                <td>{{task?.status}}</td>
                <td>
                    <td>
                        <router-link :to="{name: 'task.show', params: {
                            project_id: this.project?.id,
                            task_id: task?.id
                        }}" class="btn btn-dark">
                            Go to task
                        </router-link>
                    </td>
                </td>
            </tr>
            </tbody>
        </table>
        <div v-if="tasks?.length !== 0">
            <router-link class="btn btn-dark me-3" :to="{name: 'tasks.create', params: {
                    id: this.project?.id
                }}">Create task</router-link>
            <Edit v-bind:project="project"/>
            <router-link to="/projects" class="btn btn-secondary ms-3">Back</router-link>
        </div>
    </div>
</template>

<script>

import axios from "axios";
import Loader from "../Loader/Loader.vue";
import Edit from "./Edit.vue";

export default {
    components: {Edit, Loader},
    data(){
        return {
            project: null,
            tasks: null,
            loading: true,
        }
    },

    methods: {
        getProjectTasks(){
            axios.get('/api/v1/projects/' + this.$route.params.id + '/tasks').then(res => {
                this.tasks = res.data.data;
            })
        },

        getData(){
            axios.get('/api/v1/projects/' + this.$route.params.id).then(res => {
                this.project = res.data.data;
                this.getProjectTasks()
                this.loading = false
            });
        },
    },

    mounted() {
        this.getData();
    },
}
</script>
