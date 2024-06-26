<script setup>
//csrf token
const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

import Input from '../modules/Input.vue';
import DefaultButton from '../modules/DefaultButton.vue';
import axios from 'axios';
import { onMounted, ref } from 'vue';
import { useRoute } from 'vue-router'

components: [
    DefaultButton,
    Input
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


const name = ref('');

function updateDeck(id) {
   axios.put('/deck/' + id + '/card-listing', {
      'name': name
   })
   .catch((error) => {
       console.log(error)
   });
}


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
   <form method="post"
         class="flex items-center mb-4">
      <input type="hidden" name="_token" :value="csrf">

      <Input name="name" v-model="name"
             class="mr-2 sm:mr-4 pl-2 w-60 sm:w-96"
             placeholder="Modify the name of your deck" />

         <button @click="updateDeck(deck.id)">
            <img src="../../../../public/assets/img/deck/edit.png" alt="Modify the name of the deck"
                class="size-4">  
         </button>           
   </form>

   <div class="flex items-center justify-start">
        <Input class="mr-8 sm:mr-16 pl-2"
               placeholder="Search for a card" />

      <router-link :to="{ name: 'newCard', params: {id: deck.id} }">
         <img src="../../../../public/assets/img/deck/new-deck.png" alt="Add a new card"
              class="size-4 lg:size-5">
      </router-link>
   </div>

   <h2 class="mt-6 sm:mt-10
              text-sm sm:text-lg">
     Liste des cartes du deck {{ deck.name }}
   </h2>

   <p class="text-center mt-12"
      v-show="cards.length === 0">
       You have no cards in this deck.
   </p>
   
   <ul class="mt-4 sm:mt-8">
      <li v-for="(card, index) in cards" :key="card.id"
          class="flex content-center
                 mb-2 sm:mb-4
                 text-xs sm:text-sm
                 text-primary">

          <button class="sm:px-2" @click="deleteCard(card.id, index)">
            <img src="../../../../public/assets/img/deck/delete.png" alt="delete deck"
                        class="size-3 mr-2
                               sm:size-4 sm:mr-4">
          </button>
           <router-link :to="{ name: 'card', params: { deck_id: deck.id, card_id: card.id } }"
                        class="ml-2 sm:ml-6">
              {{ card.recto_name }}
           </router-link>
      </li>
   </ul>
</template>