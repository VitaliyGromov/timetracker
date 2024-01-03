<template>
    <Modal ref="modal" header="Edit project" buttonName="Edit project">
        <div class="form-group mb-2">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" v-model="project.name" placeholder="Enter project name">
        </div>
        <button type="submit" @click.prevent="update" class="btn btn-secondary">
            Save
        </button>
    </Modal>
</template>

<script>

import {defineComponent} from "vue";
import Modal from "../Modal/Modal.vue";
import axios from "axios";

export default defineComponent({
    components: {Modal},

    props: {
        project: Object
    },

    methods: {
        update(){
            axios.post('/api/v1/projects/' + this.project.id, {
                name: this.project.name,
                user_id: this.project.user.id,
            }).then(() => {
                this.$refs.modal.hideModal()
            });
        }
    }
})
</script>
