<script setup>
import axios from 'axios';
import { onMounted, ref } from 'vue';

const decks = ref([]);

onMounted(() => {
    axios.get('/api/decks')
        .then(response => {
            decks.value = response.data.decks;
        })
        .catch((error) => {
            console.log(error.response.data);
        })
});
</script>

<template>
    <div class="flex justify-between mb-4 sm:mb-10">
        <div class="flex items-center justify-start">
            <h2 class="mr-8
                       text-xs
                       sm:text-sm
                       md:text-lg">
                       Your decks
            </h2>

            <router-link :to="{ name: 'createDeck' }">
                <img src="../../../../public/assets/img/deck/new-deck.png" alt="add a new deck"
                    class="size-4 hover:size-5">
            </router-link>
        </div>

        <form class="flex items-center justify-end">
            <input type="text" placeholder="Search for a deck"
                class="border-2 border-stroke rounded-sm mr-8 pl-2">
            <button class="">
                <img src="../../../../public/assets/img/deck/search-icon.png" alt="search for a deck"
                    class="size-6">
            </button>
        </form>
    </div>
        
    <p class="text-center"
       v-show="decks.length === 0">
        You have no deck yet. <br>
        Build your first deck
    </p>

    <section class="grid grid-cols-2 gap-x-2
                    sp:grid-cols-3 sm:gap-x-2
                    sm:grid-cols-4 sm:gap-x-4 
                    md:gap-x-6
                    lg:grid-cols-6
                    xl:grid-cols-8 xl:gap-x-8">
        <div class="flex flex-col
                    relative
                    place-items-center
                    w-20 min-h-40
                    sm:w-28 sm:min-h-48
                    md:w-36 md:min-h-56 
                    mb-8 
                    border-2 border-stroke rounded-sm"
             v-for="deck in decks" :key="deck.id">

            <h3 class="mt-2 mx-4 max-h-10
                       overflow-hidden
                       text-xs
                       sm:text-sm sm:mt-4
                       md:text-base md:max-h-36">
                {{ deck.name }}
            </h3>
                
            <hr class="absolute border-1 border-stroke mb-4 w-0
                       md:w-28 bottom-32">
            <div class="absolute bottom-4">
                <router-link :to="{ name: 'cards', params: { id: deck.id } }">
                    <img src="../../../../public/assets/img/deck/edit.png" alt="edit deck's name and display cards"
                        class="size-4 mb-4
                               sm:size-6">
                </router-link>

                <router-link to="">
                    <img src="../../../../public/assets/img/deck/play.png" alt="play cards"
                        class="size-4 mb-4
                               sm:size-6">
                </router-link>

                <router-link to="">
                    <img src="../../../../public/assets/img/deck/delete.png" alt="delete deck"
                        class="size-4
                               sm:size-6">
                </router-link>
            </div>
        </div>
    </section>
</template>