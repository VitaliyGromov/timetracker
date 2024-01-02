<template>
    <h1>
        Create new task
    </h1>
    <div>
        <div class="form-group mb-3">
            <label for="task_name">Task name</label>
            <input type="text" class="form-control" id="task_name" v-model="task.name" placeholder="Task name">
        </div>
        <div class="form-group mb-3">
            <label for="task_description">Description</label>
            <textarea class="form-control" id="task_description" v-model="task.description" rows="6"></textarea>
        </div>
        <div class="form-group">
            <label for="performer_id">Performer</label>
            <select class="form-control" v-model="task.performer_id" id="performer_id">
                <option>Nobody</option>
                <option v-for="user in store.state.users.users" v-bind:value="user.id">{{user.name}}</option>
            </select>
        </div>
        <div class="mt-3" role="group">
            <button type="submit" @click.prevent="createTask" class="btn btn-dark me-3">Save</button>
            <router-link :to="{name: 'projects.show', params: {
                id: this.$route.params.id
            }}" class="btn btn-secondary">Back</router-link>
        </div>
    </div>
</template>

<script>

import store from "../../store/store.js";
import axios from "axios";
import router from "../../router/router.js";

export default {
    computed: {
        store() {
            return store
        }
    },

    data(){
        return {
            task: {
                name: null,
                description: null,
                performer_id: null,
                project_id: this.$route.params.id
            },
        }
    },

    methods: {
        createTask(){
            this.task.author_id = store.state.auth.authUser.id;
            axios.post('/api/v1/tasks', this.task).then(() => {
                router.push({name: 'projects.show', params: {id: this.$route.params.id}})
            });
        },
    }
}
</script>
