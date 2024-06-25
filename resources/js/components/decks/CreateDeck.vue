<script setup>
//csrf token
const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

import DefaultButton from '../modules/DefaultButton.vue';
import { ref, onMounted } from 'vue';
import axios from 'axios';

components: [
    DefaultButton
]

const categories = ref([]);

onMounted(() => {
    axios.get('/api/decks/create')
        .then(response => {
            categories.value = response.data.categories;
        })
        .catch((error) => {
            console.log(error.response.data);
        })
});


</script>

<template>
    <h2 class="mb-16">
        Create a new deck
    </h2>
    <form method="POST" action="/decks"
          enctype="application/x-www-form-urlencoded"
          class="flex flex-col items-center mb-4">
        <input type="hidden" name="_token" :value="csrf">

        <input type="text"
               name="name"
               class="border-2 border-stroke rounded-sm mb-8 pl-2"
               placeholder="Name your deck" />

        <label for="category">
            Choose a category
        </label>
        <select name="category_id" id="category"
                class="border-2 border-stroke rounded-sm mb-12 mt-4 pl-2">
                <option v-for="category in categories" :key="category.id"
                        value="{{ category.name }}">{{ category.name }}
                </option>
        </select>

        <DefaultButton>
            Create deck
        </DefaultButton>
    </form>
</template>