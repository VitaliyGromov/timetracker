<template>
    <div v-if="loading">
        <Loader/>
    </div>
    <div v-else>
        <h1 class="h1">
            Projects
        </h1>
        <Index v-bind:projects="projects"/>
        <Create/>
    </div>
</template>

<script>

import Modal from "../../components/Modal/Modal.vue";
import axios from "axios";
import Loader from "../../components/Loader/Loader.vue";
import Create from "../../components/Projects/Create.vue";
import Index from "../../components/Projects/Index.vue";

export default  {
    components: {
        Index,
        Create,
        Loader,
        Modal,
    },

    data(){
        return {
            projects: null,
            name: null,
            loading: true,
        }
    },

    mounted() {
        this.getProjects();
    },

    methods: {
        getProjects(){
            axios.get('/api/v1/projects').then(res => {
                this.projects = res.data.data
                this.loading = false;
            });
        },
    }
}
</script>
