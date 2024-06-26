<script setup>
//csrf token
const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

import Input from '../modules/Input.vue';
import DefaultButton from '../modules/DefaultButton.vue';
import { ref, onMounted } from 'vue';
import axios from 'axios';

components: [
    DefaultButton,
    Input
]

const categories = ref([]);

onMounted(() => {
    axios.get('/api/decks/create')
        .then(response => {
            categories.value = response.data.categories;
        })
        .catch((error) => {
            console.log(error);
        })
});

const deck_name = ref('');
const catId = ref();

function postDeck() {
    axios.post('/deck/create', {
        'name': deck_name,
        'category_id': catId,
    })
        .then(response => {
            console.log('Deck successfully created');
        })
        .catch(error => {
            console.log(error);
        });
} 
    


</script>

<template>
    <h2 class="mb-8 sm:mb-16
               mr-2 sm:mr-8
               text-xs sm:text-sm md:text-lg">
        Create a new deck
    </h2>
    <form method="POST"
          enctype="application/x-www-form-urlencoded"
          class="flex flex-col items-center mb-4">
        <input type="hidden" name="_token" :value="csrf">

        <Input name="name" v-model="deck_name"
               class="mb-4 sm:mb-8 pl-2"
               placeholder="Name your deck" />
        
        <label for="category"
               class="text-xs sm:text-sm md:text-lg">
            Choose a category
        </label>
        <select name="category_id" id="category" v-model="catId"
                class="border-2 border-stroke rounded-sm mb-8 sm:mb-12 mt-4 pl-2
                       text-xs sm:text-sm md:text-lg">
                <option v-for="category in categories" :key="category.id"
                        :value="category.id">{{ category.name }}
                </option>
        </select>

        <DefaultButton @click="postDeck">
            Create deck
        </DefaultButton>
    </form>
</template>