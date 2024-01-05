<template>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Project name</th>
            <th scope="col">Author</th>
            <th scope="col">Time spent</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="project in projects">
            <th scope="row">{{project?.id}}</th>
            <td>{{project?.name}}</td>
            <td>{{project?.user?.name}}</td>
            <td>
                {{formatProjectTime(project?.time_spent)}}
            </td>
            <td>
                <router-link :to="{name: 'projects.show', params: {id: project?.id}}" class="btn btn-dark">
                    Go to project
                </router-link>
            </td>
            <td>
                <button type="button" @click.prevent="deleteProject(project?.id)" class="btn btn-danger">
                    Delete project
                </button>
            </td>
        </tr>
        </tbody>
    </table>
</template>

<script>
import axios from "axios";
import Edit from "./Edit.vue";
import {formatTime} from "../../helpers/time.js";

export default {
    components: {Edit},
    props: {
        projects: Object
    },
    methods: {
        deleteProject(id){
            axios.delete('/api/v1/projects/' + id).then(() => {
                this.$parent.getProjects()
            });
        },

        formatProjectTime(time){
            if (time !== 0){
                return formatTime(time)
            }

            return '00:00:00';
        }
    },
}
</script>
