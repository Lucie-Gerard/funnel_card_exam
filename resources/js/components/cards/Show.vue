<script setup>
//csrf token
const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

import DefaultButton from '../modules/DefaultButton.vue';
import axios from 'axios';
import { onMounted, ref } from 'vue';
import { useRoute } from 'vue-router'


components: [
    DefaultButton
];


const route = useRoute();
const card = ref([]);
const deck = ref([]);

const deck_id = route.params.deck_id;
const card_id = route.params.card_id;

onMounted(async() => {
    await axios.get('/api/deck/' + deck_id + '/card/' + card_id)
        .then(response => {
           card.value = response.data.card;
           deck.value = response.data.deck;
        })
        .catch((error) => {
            console.log(error.response.data);
        })
});


const recto = ref('');
const verso = ref('');

function updateCard(deck_id, card_id) {
    axios.put('/deck/' + deck_id + '/card' + card_id, {
        'recto_name': recto,
        'verso_name': verso
    })
    .catch((error) => {
        console.log(error)
    });
}

</script>

<template>
    <h2 class="mr-8
               text-xs
               sm:text-sm
               md:text-lg">
       Modify your card
    </h2>

    <!-- <div class="flex justify-center mt-16">
        <DefaultButton class="mr-20"
            @click="verso === false">
            Recto
        </DefaultButton>
        <DefaultButton
            @click="recto === false">
            Verso
        </DefaultButton>
    </div> -->
    

    <form method="POST" action=""
          class="flex flex-col
                 place-items-center
                 mt-12">
        <input type="hidden" name="_token" :value="csrf">         

        <div class="xl:flex-row
                    sp:w-60
                    sm:w-96">
            <div>
                <div class="flex text-xs sm:text-sm">
                    <label for="verso"
                           class="font-semibold">
                        Recto
                    </label>
                    <p class="sp:ml-4 sm:ml-20">
                        Initial keyword or definition : <br>
                        {{ card.recto_name }}
                    </p>
                </div>
                <textarea name="recto_name" id="recto" v-model="recto" cols="10" rows="5"
                          placeholder="Modify"
                          class="border-2 border-stroke mb-8
                               w-full">
                </textarea>
            </div>
            
            <div>
                <div class="flex text-xs sm:text-sm">
                    <label for="verso"
                           class="font-semibold">
                        Verso
                    </label>
                    <p class="sp:ml-4 sm:ml-20">
                        Initial answer : <br>
                        {{ card.verso_name }}
                    </p>
                </div>
                <textarea name="verso_name" id="verso" v-model="verso" cols="10" rows="5"
                          placeholder="Modify"
                          class="border-2 border-stroke mb-12
                                 w-full">
                </textarea>
            </div>
        </div>
        
        <DefaultButton @click="updateCard(card.id)">
            Done
        </DefaultButton>
    </form>
</template>