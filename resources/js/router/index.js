import { createRouter, createWebHistory } from 'vue-router';

import AuthLayout from '../layouts/AuthLayout.vue';
import Login from '../components/auth/Login.vue';
import Register from '../components/auth/CreateUser.vue';

import DefaultLayout from '../layouts/DefaultLayout.vue';
import Index from '../components/decks/Index.vue';
import CreateDeck from '../components/decks/CreateDeck.vue';
import CardListing from '../components/cards/CardListing.vue';
import Account from '../components/users/Account.vue';

const routes = [
    {
        path: '/auth',
        name: 'auth',
        component: AuthLayout,
        meta: { requiresAuth: false },
        children: [
            {
                path: 'login',
                name: 'login',
                component: Login,
            },

            {
                path: 'register',
                name: 'register',
                component: Register,
            },
        ],
    },
    

    {
        path: '/',
        redirect: {name: 'decks'},
        name: 'default',
        component: DefaultLayout,
        meta: { requiresAuth: true },
        children: [
            {
                path: 'decks',
                name: 'decks',
                component: Index,
            },
            {
                path: 'decks/create',
                name: 'createDeck',
                component: CreateDeck
            },
            {
                path: 'card-listing',
                name: 'cards',
                component: CardListing
            },
            {
                path: 'account',
                name: 'account',
                component: Account
            }
        ]
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
    activeClass: "active"
});

export default router;