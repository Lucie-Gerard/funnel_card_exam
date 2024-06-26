<script setup>
//csrf token
const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

import DefaultButton from '../modules/DefaultButton.vue';
import { useRoute } from 'vue-router'
import axios from 'axios';
import { ref } from 'vue';

components: [
    DefaultButton
];

const route = useRoute();
const id = route.params.id;

const recto = ref('');
const verso = ref('');

function postCard() {
    axios.post('/deck/' + id + '/create-card', {
        'recto_name': recto,
        'verso_name': verso
    })
    .then(response => {
        console.log('Card successfully created');
    })
    .catch(error => {
        console.log(error);
    });
}

</script>

<template>
    <h2 class="text-xs sm:text-sm md:text-lg">
       Create your card
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
    

    <form method="POST"
          class="flex flex-col place-items-center
                 mt-4 sm:mt-8 md:mt-12">
        <input type="hidden" name="_token" :value="csrf">

        <div class="text-xs sm:text-sm md:text-base 
                    w-60 sm:w-1/2 md:w-2/3 lg:w-1/2
                    mb-4 sm:mb-8">
            <div>
                <label for="recto"
                    class="font-semibold text-xs sm:text-sm">
                    Recto: 
                </label>
                <textarea name="recto_name" id="recto" v-model="recto" cols="10" rows="10"
                        placeholder="Key word or definition"
                        class="border-2 border-stroke 
                               mb-4 sm:mb-8
                               min-h-40 sm:min-h-64 md:min-h-80
                               w-full">
                </textarea>
            </div>
            
            <div>
                <label for="verso"
                    class="font-semibold text-xs sm:text-sm">
                    Verso:
                </label>
                <textarea name="verso_name" id="verso" v-model="verso" cols="10" rows="10"
                          placeholder="Answer"
                          class="border-2 border-stroke
                                 min-h-40 sm:min-h-64 md:min-h-80
                                 w-full">
                </textarea>
            </div>
        </div>
        
        <DefaultButton @click="postCard">
            Create
        </DefaultButton>
    </form>
</template>