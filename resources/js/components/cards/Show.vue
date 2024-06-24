<script setup>
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
    

    <form method="" action=""
          class="flex flex-col
                 place-items-center
                 mt-12">

        <div class="xl:flex-row
                    sp:w-60
                    sm:w-96">
            <div>
                <label for="recto"
                    class="font-semibold
                           text-xs
                           sm:text-sm">
                    Recto: 
                </label>
                <textarea name="recto" id="recto" cols="10" rows="10"
                        :value="card.recto_name"
                        class="border-2 border-stroke mb-8
                               w-full">
                </textarea>
            </div>
            
            <div>
                <label for="verso"
                    class="font-semibold
                           text-xs
                           sm:text-sm">
                    Verso:
                </label>
                <textarea name="verso" id="verso" cols="10" rows="10"
                          :value="card.verso_name"
                          class="border-2 border-stroke mb-12
                                 w-full">
                </textarea>
            </div>
        </div>
        
        <DefaultButton>
            Done
        </DefaultButton>
    </form>
</template>