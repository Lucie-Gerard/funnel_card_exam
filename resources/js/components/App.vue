<script setup>
import Nav from "../layouts/Nav.vue";
import Index from "./Index.vue";

components: {
    Nav,
        Index
}
</script>

<template>
    <div class="bg-bgSecondary container mx-auto h-screen 
                border-2 rounded-sm border-bgSecondary 
                pb-5">
        <header>
            <Nav />
        </header>
        <main>
            <Index />
        </main>
    </div>

</template>
