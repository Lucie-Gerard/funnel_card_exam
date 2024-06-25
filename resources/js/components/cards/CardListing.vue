<script setup>
import DefaultButton from '../modules/DefaultButton.vue';
import axios from 'axios';
import { onMounted, ref } from 'vue';
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

const deleteCard = (id, index)  => {
    axios.delete('/api/cards/delete/' + id)
        .then(response => {
            cards.value.splice(index, 1);
        })
        .catch((error) => {
            console.log(error)
        });
}
</script>

<template>
   <form method="" action=""
         class="flex items-center mb-4">
       <input type="text"
              class="border-2 border-stroke rounded-sm mr-4 pl-2 w-96"
              placeholder="Modify the name of your deck" />
         <button>
            <img src="../../../../public/assets/img/deck/edit.png" alt="Modify the name of the deck"
                class="size-4">  
         </button>           
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

   <h2 class="sp:mt-4
              sm:mt-8
              sp:text-sm
              sm:text-lg">
     Liste des cartes du deck {{ deck.name }}
   </h2>

   <p class="text-center mt-12"
      v-show="cards.length === 0">
       You have no cards in this deck.
   </p>
   
   <ul class="sp:mt-2 sm:mt-4">
      <li class="flex content-center
                 sp:mb-2
                 sm:mb-4
                 sp:text-xs
                 sm:text-sm
                 text-primary"
          v-for="(card, index) in cards" :key="card.id">
          <button class="px-2" @click="deleteCard(card.id, index)">
            <img src="../../../../public/assets/img/deck/delete.png" alt="delete deck"
                        class="size-2 mr-4
                               sm:size-4">
          </button>
           <router-link :to="{ name: 'card', params: { deck_id: deck.id, card_id: card.id } }"
                        class="ml-6">
              {{ card.recto_name }}
           </router-link>
      </li>
   </ul>
</template>