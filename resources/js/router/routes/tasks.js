const tasks = [
    {
        path: '/projects/:project_id/tasks/:task_id',
        name: 'task.show',
        component: () => import('../../components/Tasks/Show.vue'),
    },
    {
        path: '/projects/:id/tasks',
        name: 'tasks.create',
        component: () => import('../../components/Tasks/Create.vue'),
    },
    {
        path: '/projects/:project_id/tasks/:task_id/edit',
        name: 'tasks.edit',
        component: () => import('../../components/Tasks/Edit.vue'),
    }
];

export default tasks
