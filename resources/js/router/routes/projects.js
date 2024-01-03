const projects = [
    {
        path: '/projects',
        name: 'projects',
        component: () => import('../../pages/projects/Projects.vue'),
    },
    {
        path: '/projects/:id',
        name: 'projects.show',
        component: () => import('../../components/Projects/Show.vue'),

    },
    {
        path: '/projects/:id/edit',
        name: 'projects.edit',
        component: () => import('../../components/Projects/Edit.vue'),
    },
];

export default projects;
