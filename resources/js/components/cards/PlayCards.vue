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

const displayAnswer = ref(false);
const nextCard = ref(0);
const score = ref(0);
</script>

<template>
    <h2 class="mb-4 sm:mb-8 
               text-xs sm:text-sm md:text-base">
       Do you remember this card ?
    </h2>

    <section>
        <!-- Montre les cartes jusqu'à la dernière puis devient hidden -->
        <div v-show="cards.length > nextCard"
             class="flex flex-col place-items-center">
            <div v-for="(card, index) in cards" :key="card.id">
                <div class="text-xs sm:text-sm md:text-base 
                            w-60 sm:w-96
                            min-h-60 sm:min-h-80
                            mb-1 border-2 border-stroke"
                        v-show="index === nextCard">
                        <!-- Permet de montrer carte par carte -->
                    <p class="px-4 sm:px-8
                            mt-2 sm:mt-4">
                        {{ card.recto_name }}
                    </p>

                    <hr class="w-48 sm:w-80 mx-auto
                            my-2 sm:my-4 dm:my-6">

                    <p class="px-4 sm:px-8
                            mt-2 sm:mt-4"
                    v-show="displayAnswer">
                        {{ card.verso_name }}
                    </p>
                </div>
            </div>

            <p class="text-xs sm:text-sm mb-4 sm:mb-6">
                Card {{ nextCard + 1 }} of {{ cards.length }} <br>
            </p>

            <DefaultButton @click.stop="displayAnswer=true">
                Show the answer
            </DefaultButton>
            <!-- Montre la réponse et la div ci-dessous -->
                
            <div class="flex items-end 
                        gap-4 sm:gap-8 md:gap-12 lg:gap-16
                        mt-4 sm:mt-8"
                v-show="displayAnswer"
                @click="displayAnswer=false">
                <!-- Cache la réponse et cette div pour afficher la prochaine carte sans la réponse (je sais, c'est un peu hacky) -->

                <p class="text-xs sm:text-sm md:text-base">
                    Was your answer correct ?
                </p>
                <div @click="nextCard++">
                    <DefaultButton @click="score++">
                        Yes
                    </DefaultButton>
                    <DefaultButton class="ml-2 sm:ml-5 md:ml-8">
                        No
                    </DefaultButton>
                </div>
            </div>
        </div>
        <!-- Affiche cette div une fois la dernière carte jouée et affiche le score plus un bouton pour rediriger vers la page index -->
        <div v-show="cards.length === nextCard"
             class="flex flex-col place-items-center">
            <div class="flex justify-center items-center
                        border-2 border-stroke
                        mt-4 sm:mt-8 md:mt-12
                        w-48 sm:w-60 md:w-72
                        h-24 sm:h-36 md:h-48">
                <p class="text-xs sm:text-sm md:text-base">
                    You are done for today ! <br>
                    You have a score of {{ score }} out of {{ cards.length }}
                </p>
            </div>
            <DefaultButton class="mt-2 sm:mt-4 md:mt-8">
                <router-link to="/">
                    Home
                </router-link>
            </DefaultButton>
        </div>
    </section>
</template>