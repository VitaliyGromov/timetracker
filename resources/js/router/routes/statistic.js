const statistic = [
    {
        path: '/statistic',
        name: 'statistic',
        component: () => import('../../pages/statistic/Statistic.vue'),
    },
    {
        path: '/statistic/:id',
        name: 'statistic.user',
        component: () => import('../../components/Statistic/UserData.vue'),
    },
];

export default statistic;
