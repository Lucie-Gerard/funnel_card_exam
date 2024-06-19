<script setup>
import { RouterView } from "vue-router";
import Nav from "./Nav.vue";

components: {
    Nav
}
</script>

<template>
    <div class="bg-bgSecondary container mx-auto h-screen 
                border-2 rounded-sm border-bgSecondary 
                pb-5 my-4">
        <header class="mb-8">
            <Nav/>
        </header>

        <main class="px-8">
            <RouterView>
            </RouterView>
        </main>
    
    </div>

</template>
