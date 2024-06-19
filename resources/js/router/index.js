import { createRouter, createWebHistory } from 'vue-router';

import Index from '../components/decks/Index.vue';
import CardListing from '../components/cards/CardListing.vue';
import Account from '../components/Account.vue';

const routes = [
    {
        path: '/',
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