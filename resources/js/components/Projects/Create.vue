<template>
    <Modal header="Add new project" buttonName="Add project">
        <div class="form-group mb-2">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" v-model="projectName" placeholder="Enter project name">
        </div>
        <button @click.prevent="store" type="submit" class="btn btn-secondary">
            Save
        </button>
    </Modal>
</template>

<script>

import Modal from "../Modal/Modal.vue";
import axios from "axios";
import store from "../../store/store.js";

export default {
    components: {
        Modal
    },

    data(){
        return {
            projectName: null
        }
    },

    methods: {
        store(){
            axios.post('/api/v1/projects', {
                name: this.projectName,
                user_id: store.state.auth.authUser.id
            }).then(() => {
                this.$parent.getProjects();
            });
        },
    }
}
</script>
