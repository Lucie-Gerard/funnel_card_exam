<script>

// Cet header est utilisé pour la partie principale de l'app (decks, cartes, etc)
</script>

<template>
    <header class="sp:mb-4 sm:mb-8">
        <nav class="flex items-center justify-between bg-bgPrimary">
            <h1 class="ml-8">
                <router-link :to="{ name: 'decks' }">
                    <img src="../../../public/assets/img/logo.png" alt="logo to home"
                        class="size-6 sm:size-10">
                </router-link>
            </h1>
            <ul class="flex divide-x divide-stroke text-xs 
                       sm:text-base">
                <li class="mr-8
                           sp:py-2 sp:px-2
                           sm:py-4 sm:px-4 ">
                    <router-link :to="{ name: 'decks' }">
                                Decks
                    </router-link>
                </li>

                <!-- Ces deux li seront utilisés lorsque la fonctionnalité login sera implémentée -->
                 
                <!-- <li class="sp:py-2 sp:px-2
                           sm:py-4 sm:px-4"">
                    <router-link :to="{ name: 'account' }">
                                Your account
                    </router-link>
                </li>
                <li class="flex items-center px-2">
                    <router-link :to="{ name: 'login' }">
                        <img src="../../../public/assets/img/nav/disconnect.png" alt="Disconnect"
                            class="size-4">
                    </router-link>
                </li> -->
            </ul>
        </nav>
    </header>
</template>