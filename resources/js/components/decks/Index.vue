<script setup>
import Input from '../modules/Input.vue';
import axios from 'axios';
import { computed, onMounted, ref } from 'vue';

components: {
    Input
}

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

const deleteDeck = (id, index)  => {
    axios.delete('/api/decks/delete/' + id)
        .then(response => {
            decks.value.splice(index, 1);
        })
        .catch((error) => {
            console.log(error)
        });
}


const filterDeck = ref('');
// Filtre la valeur de l'input pour n'afficher que les decks ayant un nom équivalent à cette valeur
const filteredDeck = computed(() => {
    let filter = filterDeck.value.toLowerCase();

    if (!filter.length) return decks.value;
    return decks.value.filter(deck => deck.name.toLowerCase().includes(filter));
})
</script>

<template>
    <div class="flex justify-between mb-4 sm:mb-10">       
        <div class="flex items-center justify-start">
            <h2 class="mr-4 sm:mr-8
                       text-xs sm:text-sm md:text-lg">
                       Your decks {{ filterDeck }}
            </h2>

            <router-link :to="{ name: 'createDeck' }">
                <img src="../../../../public/assets/img/deck/new-deck.png" alt="add a new deck"
                    class="size-3 sm:size-4 lg:size-5">
            </router-link>
        </div>

        <form class="flex items-center justify-end relative">
            <Input v-model="filterDeck"
                   placeholder="Search for a deck"
                   class="mr-2 sm:mr-4
                          sm:pl-2
                          pr-6 sm:pr-8" />
            <img src="../../../../public/assets/img/deck/search-icon.png" alt="search for a deck"
                class="size-2 sm:size-4 absolute right-4 sm:right-6">
        </form>
    </div>
      
    <!-- Montre ce message que s'il n'y a aucun deck à afficher -->
    <p class="text-center"
       v-show="decks.length === 0">
        You have no deck yet. <br>
        Build your first deck
    </p>

    <section class="grid grid-cols-2 sp:grid-cols-3 sm:grid-cols-4 lg:grid-cols-6 xl:grid-cols-8
                    gap-x-2 sm:gap-x-4 md:gap-x-6 xl:gap-x-8">                     
        <div class="flex flex-col place-items-center relative     
                    w-20 sm:w-28 md:w-36 
                    min-h-40 sm:min-h-48 md:min-h-56
                    mb-4 sm:mb-8 
                    border-2 border-stroke rounded-sm"
             v-for="(deck, index) in filteredDeck" :key="deck.id">
<!-- Boucle sur la fonction qui permet de filtrer les noms de deck avec la valeur de l'input -->

            <h3 class="mt-2 sm:mt-4 mx-4 max-h-10 md:max-h-36
                       overflow-hidden
                       text-xs sm:text-sm md:text-base">
                {{ deck.name }}
            </h3>
                
            <hr class="absolute border-1 border-stroke mb-4 w-0 md:w-28 bottom-32">
                      
            <div class="absolute bottom-4">
                <router-link :to="{ name: 'cards', params: { id: deck.id } }">
                    <img src="../../../../public/assets/img/deck/edit.png" alt="edit deck's name and display cards"
                        class="size-4 sm:size-6 mb-4">
                </router-link>

                <router-link :to="{ name: 'playCards', params: { id: deck.id } }">
                    <img src="../../../../public/assets/img/deck/play.png" alt="play cards"
                        class="size-4 sm:size-6 mb-4">
                </router-link>

                <button @click="deleteDeck(deck.id, index)">
                    <img src="../../../../public/assets/img/deck/delete.png" alt="delete deck"
                        class="size-4 sm:size-6">   
                </button>
            </div>
        </div>
    </section>
</template>