<script setup>
import DefaultButton from '../modules/DefaultButton.vue';
import axios from 'axios';
import { onMounted, ref, computed } from 'vue';
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

const answer = ref(false);

const yes = ref(false);
const no = ref(false);

const nextBtn = ref(false);
const nextCard = ref(0);
</script>

<template>
    <h2 class="sp:mb-4 
               text-xs
               sm:text-sm sm:mb-8
               md:text-lg">
       Do you remember this card ?
    </h2>

    <section class="flex flex-col place-items-center">
        <div v-for="(card, index) in cards" :key="card.id"
             class="sp:text-sm sp:w-60 sp:min-h-60 sp:mb-4
                    sm:text-base sm:w-96 sm:min-h-80 sm:mb-8
                    border-2 border-stroke"
                    v-show="!index">
            <p class="px-8 my-4">
                {{ card.recto_name }}
                {{ index }}
                {{ 'count: ' }}
            </p>

            <hr class="sp:w-48 sm:w-80 mx-auto">

            <p class="px-8 mt-4"
               v-show="answer">
                {{ card.verso_name }}
            </p>
        </div>

        <DefaultButton class="mb-4
                              sp:text-xs
                              sm:text-sm" 
                        @click="answer = true">
            Show the answer
        </DefaultButton>

            
        <div class="flex items-end 
                    sp:gap-4 sp:text-xs sp:mt-4
                    sm:gap-8 sm:text-sm sm:mt-8"
             v-show="answer">
             <p>
                Was your answer correct ?
            </p>

            <DefaultButton class=""
                        @click="nextBtn = true">
                Yes
            </DefaultButton>
            <DefaultButton class=""
                        @click="nextBtn = true">
                No
            </DefaultButton>   
        </div>

        <DefaultButton class="sp:text-xs sp:mt-8
                              sm:text-sm sm:mt-12"
                       v-show="nextBtn"
                       @click="nextCard++">
            Next
        </DefaultButton>
    </section>
 

</template>