<script setup>
import axios from 'axios';
import { onMounted, ref, watch } from 'vue';
import { useRoute } from 'vue-router'

const route = useRoute();
const cards = ref([]);
const deck = ref([]);

const id = route.params.id;

onMounted(async() => {
    await axios.get('/api/deck/' + id + '/card-listing')
        .then(response => {
           cards.value = response.data.cards;
           deck.value = response.data.deck;
        })
        .catch((error) => {
            console.log(error.response.data);
        })
});

</script>

<template>
    <form method="" action=""
          class="flex mb-4">
        <input type="text"
               class="border-2 border-stroke rounded-sm mr-8 pl-2 w-96"
               placeholder="Modify the name of your deck" />
            <img src="../../../../public/assets/img/deck/edit.png" alt="Modify the name of the deck"
                 class="size-4">
    </form>

    <input type="text"
           placeholder="Search for a card"
           class="border-2 border-stroke rounded-sm mr-8 pl-2">

    <p class="text-center mt-10"
       v-show="cards.length === 0">
        You have no cards in this deck.
    </p>

    <ul class="mt-8">
       <li class="sp:mb-2
                  sm:mb-4
                  sp:text-xs
                  sm:text-sm
                  text-Primary"
           v-for="card in cards" :key="card.id">
            <router-link :to="{ name: 'card', params: { id: deck.id, name: card.recto_name } }">
               {{ card.recto_name }}
            </router-link>
       </li>
    </ul>
</template>