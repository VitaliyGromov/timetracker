import {createStore} from "vuex";
import {useAuthStore} from "./auth.js";
import {useUserStore} from "./users.js";

const store = createStore({
    modules: {
        auth: useAuthStore,
        users: useUserStore,
    }
});

export default store;
