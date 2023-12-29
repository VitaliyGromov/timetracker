import './bootstrap';

import { createApp } from 'vue';

import App from './components/App.vue';
import router from "./router/router.js";
import store from "./store/store.js";

createApp(App)
    .use(store)
    .use(router)
    .mount('#app');
