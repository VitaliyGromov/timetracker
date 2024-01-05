import { createRouter, createWebHistory } from "vue-router";
import routes from "./routes.js";

const router = createRouter({
    history: createWebHistory(),
    linkActiveClass: 'active',
    routes
});

router.beforeEach((to, from, next) => {
    const token = localStorage.getItem('x_xsrf_token');

    if(!token){
        if(to.name === 'login' || to.name === 'register'){
            return next();
        } else {
            return next('/login');
        }
    }

    if(token){
        if(to.name === 'login' || to.name === 'register'){
            return next({
                name: 'blog'
            });
        }
    }

    next();
});

export default router;
