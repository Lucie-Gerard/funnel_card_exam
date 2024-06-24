<script setup>
import DefaultButton from '../modules/DefaultButton.vue';
import axios from 'axios';
import { onMounted, ref, watch } from 'vue';
import { useRoute } from 'vue-router'

components: [
    DefaultButton
];

const route = useRoute();
const cards = ref([]);
const deck = ref([]);

const id = route.params.id;

onMounted(() => {
    axios.get('/api/deck/' + id + '/card-listing')
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
         class="flex items-center mb-4">
       <input type="text"
              class="border-2 border-stroke rounded-sm mr-4 pl-2 w-96"
              placeholder="Modify the name of your deck" />
         <router-link>
            <img src="../../../../public/assets/img/deck/edit.png" alt="Modify the name of the deck"
                class="size-4">
         </router-link>
           
   </form>

   <div class="flex items-center justify-start">
         <input type="text"
          placeholder="Search for a card"
          class="border-2 border-stroke rounded-sm mr-16 pl-2">

      <router-link :to="{ name: 'newCard', params: {id: deck.id} }">
         <img src="../../../../public/assets/img/deck/new-deck.png" alt="Add a new card"
              class="size-4 hover:size-5">
      </router-link>
   </div>

   <p class="text-center mt-12"
      v-show="cards.length === 0">
       You have no cards in this deck.
   </p>

   <h2 class="sp:mt-4
              sm:mt-8
              sp:text-sm
              sm:text-lg">
     Liste des cartes du deck {{ deck.name }}
   </h2>

   <ul class="sp:mt-2 sm:mt-4">
      <li class="sp:mb-2
                 sm:mb-4
                 sp:text-xs
                 sm:text-sm
                 text-primary"
          v-for="card in cards" :key="card.id">
           <router-link :to="{ name: 'card', params: { deck_id: deck.id, card_id: card.id } }">
              {{ card.recto_name }}
           </router-link>
      </li>
   </ul>
</template>