<script setup>
import DefaultHeader from './DefaultHeader.vue';

components: [
    DefaultHeader
]

</script>

<template>
    <div class="bg-bgSecondary container mx-auto h-screen 
                border-2 rounded-sm border-bgSecondary 
                pb-5 my-4">

        <DefaultHeader></DefaultHeader>

        <main class="px-8">
            <RouterView></RouterView>
        </main>
    </div>
</template>