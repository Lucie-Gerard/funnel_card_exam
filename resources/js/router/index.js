import { createRouter, createWebHistory } from 'vue-router';

import App from '../components/App.vue';
import Account from '../components/Account.vue';

const routes = [
    {
        path: '/',
        //name: 'index',
        component: App
    },
    {
        path: '/account',
        component: Account
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
    //linkActiveClass: "active"
});

export default router;