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
    <h2 class="mb-4 sm:mb-8 
               text-xs sm:text-sm md:text-base">
       Do you remember this card ?
    </h2>

    <section class="flex flex-col place-items-center">
        <div v-for="(card, index) in cards" :key="card.id">
            <div class="text-xs sm:text-sm md:text-base 
                        w-60 sm:w-96
                        min-h-60 sm:min-h-80
                        mb-4 sm:mb-8
                        border-2 border-stroke"
                    v-if="index === nextCard">
                <p class="px-4 sm:px-8
                          mt-2 sm:mt-4">
                    {{ card.recto_name }}
                    {{ nextCard }}: {{ index }}
                    {{  }}
                </p>

                <hr class="w-48 sm:w-80 mx-auto
                           my-2 sm:my-4 dm:my-6">

                <p class="px-4 sm:px-8
                          mt-2 sm:mt-4"
                v-show="answer">
                    {{ card.verso_name }}
                </p>
            </div>
        </div>

        <DefaultButton class="mb-4"
                @click="answer=true">
            Show the answer
        </DefaultButton>

            
        <div class="flex items-end 
                    gap-4 sm:gap-8
                    text-xs sm:text-sm
                    mt-4 sm:mt-8"
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