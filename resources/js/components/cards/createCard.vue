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
    <h2 class="mr-8
               text-xs
               sm:text-sm
               md:text-lg">
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
          class="flex flex-col
                 place-items-center
                 mt-12">
        <input type="hidden" name="_token" :value="csrf">

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
                <textarea name="recto_name" id="recto" v-model="recto" cols="10" rows="10"
                        placeholder="Key word or definition"
                        class="border-2 border-stroke mb-8
                               w-full">
                </textarea>
                <div>Vois {{ recto }}</div>
            </div>
            
            <div>
                <label for="verso"
                    class="font-semibold
                           text-xs
                           sm:text-sm">
                    Verso:
                </label>
                <textarea name="verso_name" id="verso" v-model="verso" cols="10" rows="10"
                          placeholder="Answer"
                          class="border-2 border-stroke mb-12
                                 w-full">
                </textarea>
                <div>Vois {{ verso }}</div>
            </div>
        </div>
        
        <DefaultButton @click="postCard">
            Create
        </DefaultButton>
    </form>
</template>