<script setup>

</script>

<template>
    <div class="flex justify-between mb-10">
        <div class="flex items-center justify-start">
            <h2 class="mr-8">Your decks</h2>

            <router-link :to="{ name: 'createDeck' }">
                <img src="../../../../public/assets/img/deck/new-deck.png" alt="add a new deck"
                    class="size-4 hover:size-5">
            </router-link>
        </div>

        <form class="flex items-center justify-end">
            <input type="text" placeholder="Search for a deck"
                class="border-2 border-stroke rounded-sm mr-8 pl-2">
            <button class="">
                <img src="../../../../public/assets/img/deck/search-icon.png" alt="search for a deck"
                    class="size-6">
            </button>
        </form>
    </div>
        
    <p class="text-center">
        You have no deck yet. <br>
        Build your first deck
    </p>

    <section class="flex">
        <div class="flex flex-col place-items-center px-8 py-4 border-2 border-stroke rounded-sm">
            <h3 class="mb-4">German</h3>

            <router-link :to="{ name: 'cards' }" class="mb-4">
                <img src="../../../../public/assets/img/deck/edit.png" alt="edit and display cards"
                    class="size-6 justify-center">
            </router-link>

            <router-link to="" class="mb-4">
                <img src="../../../../public/assets/img/deck/play.png" alt="play"
                    class="size-6 justify-center">
            </router-link>

            <router-link to="" class="">
                <img src="../../../../public/assets/img/deck/delete.png" alt="delete"
                    class="size-6 justify-center">
            </router-link>
        </div>
    </section>
</template>