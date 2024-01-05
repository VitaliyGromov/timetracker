<template>
    <div class="row">
        <div class="col">
            <Card :title="timer.time" subtitle="Track your time">
                <button class="btn" @click.prevent="start">Start</button>
                <button class="btn" @click.prevent="stop">Save</button>
            </Card>
        </div>
        <div class="col">
            <Card :title="userTime" subtitle="Your time"/>
        </div>
        <div class="col">
            <Card :title="taskTime" subtitle="Time"/>
        </div>
    </div>
</template>

<script>
import Card from "../Card/Card.vue";
import axios from "axios";
import store from "../../store/store.js";
import {formatTime} from "../../helpers/time.js";

export default {
    components: {Card},
    data() {
        return{
            timer: {
                time: '00:00:00',
                timeInSeconds: 0,
                running: false,
            },

            allTaskTime: '00:00:00',
            allTaskTimeByUser: '00:00:00'
        }
    },

    props: {
        task: Object,
    },

    computed: {
        taskTime: function () {
            if (this.allTaskTime !== 0){
                return formatTime(this.allTaskTime);
            }

            return this.allTaskTime = '00:00:00';
        },

        userTime: function () {
            if (this.allTaskTimeByUser !== 0){
                return formatTime(this.allTaskTimeByUser)
            }

            return this.allTaskTimeByUser = '00:00:00';
        }
    },

    methods: {
        start(){
            if (!this.timer.running){
                this.timer.running = true;
                setInterval(this.timeRunning, 1000);
            }
        },

        stop(){
            this.timer.running = false;
            clearInterval(this.timeRunning);
            this.saveTime();
        },

        reset(){
            this.timer.timeInSeconds = 0;
            this.timer.time = '00:00:00';
        },

        saveTime(){
            const data = {
                time_spent: this.timer.timeInSeconds.toString(),
                task_id: this.task.id,
                user_id: store.state.auth.authUser.id
            }

            axios.post('/api/v1/spent_time', data).then(() => {
                this.reset();
            });
        },

        timeRunning(){
            if (this.timer.running){
                this.timer.timeInSeconds++;
                this.timer.time = formatTime(this.timer.timeInSeconds);
            }
        },

        getAllTimeOnTask(){
            axios.get('/api/v1/spent_time/task/' + this.task.id).then(res => {
                this.allTaskTime = res.data;
            });
        },

        getAllTimeOnTaskByAuthUser(){
            axios.get('/api/v1/spent_time/user_time_on_task/', {params: {
                    user_id: store.state.auth.authUser.id,
                    task_id: this.task.id
                }}).then(res => {
                this.allTaskTimeByUser = res.data
            });
        }
    },

    mounted() {
        this.getAllTimeOnTask();
        this.getAllTimeOnTaskByAuthUser();
    }
}
</script>

