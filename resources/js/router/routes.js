const routes = [
    {
        path: '/projects',
        name: 'projects',
        component: () => import('../pages/projects/Projects.vue')
    },
]

export default routes;
