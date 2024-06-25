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

const nextBtn = ref(false);
const nextCard = ref(0);
// const nextCard = computed(() => {
// let length = ref(0);
//     length++;

//     return cards.value.length;
// });

console.log(cards)
</script>

<template>
    <h2 class="sp:mb-4 
               text-xs
               sm:text-sm sm:mb-8
               md:text-lg">
       Do you remember this card ?
    </h2>

    <section class="flex flex-col place-items-center">
        <div v-for="(card, index) in cards" :key="card.id">
            <div class="sp:text-sm sp:w-60 sp:min-h-60 sp:mb-4
                    sm:text-base sm:w-96 sm:min-h-80 sm:mb-8
                    border-2 border-stroke"
                    v-if="index === nextCard">
                <p class="px-8 my-4">
                    {{ card.recto_name }}
                    {{ nextCard }}: {{ index }}
                    {{  }}
                </p>

                <hr class="sp:w-48 sm:w-80 mx-auto">

                <p class="px-8 mt-4"
                v-show="answer">
                    {{ card.verso_name }}
                </p>
            </div>
        </div>

        <DefaultButton class="mb-4
                      sp:text-xs
                      sm:text-sm"
                @click="answer=true">
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
                        @click="nextCard++">
                Yes
            </DefaultButton>
            <DefaultButton class=""
                        @click="nextCard++">
                No
            </DefaultButton>   
        </div>
    </section>
</template>