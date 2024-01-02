const auth = [
    {
        path: '/register',
        name: 'register',
        component:() => import('../../pages/auth/Register.vue'),
    },
    {
        path: '/login',
        name: 'login',
        component: () => import('../../pages/auth/Login.vue'),
    },
];

export default auth;
