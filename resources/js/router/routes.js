const routes = [
    {
        path: '/projects',
        name: 'projects',
        component: () => import('../pages/projects/Projects.vue'),
    },
    {
        path: '/projects/:id',
        name: 'projects.show',
        component: () => import('../components/Projects/Show.vue'),

    },
    {
        path: '/projects/:project_id/tasks/:task_id',
        name: 'task.show',
        component: () => import('../components/Tasks/Show.vue'),
    },
    {
        path: '/register',
        name: 'register',
        component:() => import('../pages/auth/Register.vue'),
    },
    {
        path: '/login',
        name: 'login',
        component: () => import('../pages/auth/Login.vue'),
    }
]

export default routes;
