<script setup>
import { RouterView } from "vue-router";
import Nav from "./Nav.vue";
import Main from "./Main.vue";

components: {
    Nav,
    Main
}
</script>

<template>
    <div class="bg-bgSecondary container mx-auto h-screen 
                border-2 rounded-sm border-bgSecondary 
                pb-5 my-4">
        <header class="mb-8">
            <Nav/>
        </header>

        <Main></Main>
    
    </div>

</template>
