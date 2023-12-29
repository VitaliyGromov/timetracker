<template>
    <h1 class="h1">
        Projects
    </h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Project name</th>
                <th scope="col">Author</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="project in projects">
                <th scope="row">{{project.id}}</th>
                <td>{{project.name}}</td>
                <td>{{project.user.name}}</td>
                <td>
                    <router-link :to="{name: 'projects.show', params: {id: project.id}}" class="btn btn-dark">
                        Go to project
                    </router-link>
                </td>
            </tr>
        </tbody>
    </table>
    <Modal header="Add new project" buttonName="Add project">
        <div class="form-group mb-2">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Enter project name" v-model="name">
        </div>
        <button v-on:click.prevent="store" type="submit" class="btn btn-secondary">
            Save
        </button>
    </Modal>
</template>

<script>

import Modal from "../../components/Modal/Modal.vue";
import axios from "axios";

export default  {
    components: {
        Modal,
    },

    data(){
        return {
            projects: null,
            name: null
        }
    },

    mounted() {
        this.getProjects();
    },

    methods: {
        getProjects(){
            axios.get('/api/v1/projects').then(res => {
                this.projects = res.data.data
            });
        },

        store(){
            axios.post('/api/v1/projects', {
                name: this.name,
                user_id: 1
            }).then(this.getProjects());
        }
    }
}

</script>

