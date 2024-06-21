import { createRouter, createWebHistory } from 'vue-router';

import Login from '../components/users/Login.vue';
import Register from '../components/users/CreateUser.vue';
import Main from '../layouts/Main.vue';
import Index from '../components/decks/Index.vue';
import CreateDeck from '../components/decks/CreateDeck.vue';
import CardListing from '../components/cards/CardListing.vue';
import Account from '../components/users/Account.vue';

const routes = [
    {
        path: '/login',
        name: 'login',
        component: Login,
    },

    {
        path: '/register',
        name: 'register',
        component: Register,
    },

    {
        path: '/',
        redirect: '/decks',
        name: 'main',
        component: Main,
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

    // {
    //     path: '/decks',
    //     name: 'decks',
    //     component: Index,
    // },

    // {
    //     path: '/decks/create',
    //     name: 'createDeck',
    //     component: CreateDeck
    // },

    // {
    //     path: '/card-listing',
    //     name: 'cards',
    //     component: CardListing
    // },
    
    // {
    //     path: '/account',
    //     name: 'account',
    //     component: Account
    // }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
    activeClass: "active"
});

export default router;