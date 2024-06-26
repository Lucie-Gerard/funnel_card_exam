<script setup>
import DefaultHeader from './DefaultHeader.vue';

components: [
    DefaultHeader
]

// Ce layout est utilisé pour la partie principale de l'app (decks, cartes, etc)
</script>

<template>
    <div class="bg-bgSecondary container min-h-screen
                border-2 rounded-sm border-bgSecondary 
                pb-5 mx-0
                sp:mx-auto sp:my-2
                sm:my-8">

        <DefaultHeader></DefaultHeader>

        <main class="px-2
                     sm:px-4
                     md:px-8
                    ">
            <RouterView></RouterView>
        </main>
    </div>
</template>