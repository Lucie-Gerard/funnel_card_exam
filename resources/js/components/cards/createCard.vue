<script setup>
import DefaultButton from '../modules/DefaultButton.vue';

components: [
    DefaultButton
];
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
                <textarea name="createRecto" id="recto" cols="10" rows="10"
                        placeholder="Key word or definition"
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
                <textarea name="createVerso" id="verso" cols="10" rows="10"
                          placeholder="Answer"
                          class="border-2 border-stroke mb-12
                                 w-full">
                </textarea>
            </div>
        </div>
        
        <DefaultButton>
            Create
        </DefaultButton>
    </form>
</template>