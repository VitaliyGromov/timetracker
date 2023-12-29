<template>
    <div>
        <h1 class="h1">
            Project {{projectName}}
        </h1>
        <div v-if="!tasks" class="text-center">
            <div class="card-body">
                <h5 class="card-title">No tasks for this project</h5>
                <p class="card-text">Add tasks, and they will be in the table</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <table v-if="tasks" class="table">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Task name</th>
                <th scope="col">Author</th>
                <th scope="col">Status</th>
                <th scope="col">Handle</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="task in tasks">
                <th scope="row">{{task.id}}</th>
                <td>{{task.name}}</td>
                <td>{{task.user.name}}</td>
                <td>{{task.status}}</td>
                <td>
                    <td>
                        <router-link :to="{name: 'task.show', params: {
                            project_id: this.$route.params.id,
                            task_id: task.id
                        }}" class="btn btn-dark">
                            Go to task
                        </router-link>
                    </td>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>

import axios from "axios";

export default {
    data(){
        return {
            projectName: null,
            tasks: null
        }
    },

    mounted() {
        axios.get('/api/v1/projects/' + this.$route.params.id).then(res => {
            this.projectName = res.data.data.name;
        });
        this.getProjectTasks();
    },

    methods: {
        getProjectTasks(){
            axios.get('/api/v1/projects/' + this.$route.params.id + '/tasks').then(res => {
                if (!res.data.data.length == 0){
                    this.tasks = res.data.data;
                }
            })
        }
    }
}
</script>
