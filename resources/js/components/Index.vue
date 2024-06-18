<script setup>

</script>

<template>
    <div class="px-8">
        <div class="flex justify-between mt-8 mb-10">
            <div class="flex items-center justify-start">
                <h2 class="font-tillana text-lg mr-8">Your decks</h2>

                <vue-router to="">
                    <img src="../../../public/assets/img/deck/new-deck.png" alt="add a new deck"
                        class="size-4 hover:size-5">
                </vue-router>
            </div>

            <form class="flex items-center justify-end">
                <input type="text" placeholder="Search a deck"
                    class="border-2 border-stroke rounded-sm mr-8 pl-2">
                <button class="">
                    <img src="../../../public/assets/img/deck/search-icon.png" alt="search for a deck"
                        class="size-6">
                </button>
            </form>
        </div>
        
        <p class="text-center">
            You have no deck yet. <br>
            Build your first deck
        </p>

        <section class="flex">
                <div class="flex flex-col place-items-center w-28 border-2 border-stroke rounded-sm">
                    <h3 class="my-4">German</h3>

                    <vue-router to="" class="item-center">
                        <img src="../../../public/assets/img/deck/edit.png" alt="edit"
                            class="size-6 mb-4 justify-center">
                    </vue-router>

                    <vue-router to="" class="item-center">
                        <img src="../../../public/assets/img/deck/play.png" alt="play"
                            class="size-6 mb-4 justify-center">
                    </vue-router>

                    <vue-router to="" class="item-center">
                        <img src="../../../public/assets/img/deck/delete.png" alt="delete"
                            class="size-6 mb-4 justify-center">
                    </vue-router>
                </div>
        </section>
    </div>
</template>