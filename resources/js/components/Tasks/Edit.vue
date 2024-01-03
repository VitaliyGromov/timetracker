<template>
    <Modal ref="modal" header="Edit task" buttonName="Edit">
        <div class="form-group mb-3">
            <label for="task_name">Task name</label>
            <input type="text" class="form-control" v-model="task.name" id="task_name" placeholder="Task name">
        </div>
        <div class="form-group mb-3">
            <label for="task_description">Description</label>
            <textarea v-model="task.description" class="form-control" id="task_description" rows="6"></textarea>
        </div>
        <div class="form-group">
            <label for="performer_id">Performer</label>
            <select class="form-control" v-model="performer" id="performer_id">
                <option>Nobody</option>
                <option v-for="user in store.state.users.users" v-bind:value="user.id">{{user.name}}</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="performer_id">Status</label>
            <select class="form-control" v-model="task.status" id="status">
                <option v-for="status in statuses" v-bind:value="status" :selected="task.status">{{status}}</option>
            </select>
        </div>
        <button @click.prevent="update" type="submit" class="btn btn-secondary">
            Save
        </button>
    </Modal>
</template>

<script>
import Modal from "../Modal/Modal.vue";
import {STATUS} from "../../constants/tasks.js";
import store from "../../store/store.js";
import axios from "axios";
import router from "../../router/router.js";
export default {
    computed: {
        store() {
            return store
        },

        performer: function () {
            if (this.task.performer !== null){
                return this.performer_id = this.task.performer.id;
            } else {
                return this.performer_id;
            }
        }
    },

    components: {Modal},
    props: {
        task: Object
    },

    data(){
        return {
            statuses: STATUS,
            performer_id: null
        }
    },

    methods: {
        update(){
            axios.post('/api/v1/tasks/' + this.task.id, {
                name: this.task.name,
                description: this.task.description,
                status: this.task.status,
                project_id: this.task.project.id,
                author_id: this.task.author.id,
                performer_id: this.performer_id
            }).then(() => {
                this.$refs.modal.hideModal();
                router.push({name: 'projects.show', params: {id: this.task.project.id}})
            });
        }
    }
}
</script>
