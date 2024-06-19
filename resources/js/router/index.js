import { createRouter, createWebHistory } from 'vue-router';

import Login from '../components/users/Login.vue';
import Index from '../components/decks/Index.vue';
import CardListing from '../components/cards/CardListing.vue';
import Account from '../components/users/Account.vue';

const routes = [
    {
        path: '/',
        name: 'login',
        component: Login,
    },
    {
        path: '/decks',
        name: 'decks',
        component: Index,
        children: [
            {
                path: 'card-listing',
                name: 'cards',
                component: CardListing
            },
        ]
    },

    
    
    {
        path: '/account',
        name: 'account',
        component: Account
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
    activeClass: "active"
});

export default router;