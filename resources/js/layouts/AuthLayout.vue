<script setup>
import { RouterView } from 'vue-router';

// Ce layout sera utilisé pour les parties login et register de l'app
</script>

<template>
    <div class="flex flex-col text-center mt-12 bg-bgPrimary">
       <RouterView></RouterView>
    </div>
</template>