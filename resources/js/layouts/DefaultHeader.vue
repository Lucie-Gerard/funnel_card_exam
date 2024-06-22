<script>
</script>

<template>
    <header class="mb-8">
        <nav class="flex items-center justify-between bg-bgPrimary">
            <h1 class="ml-8">
                <router-link :to="{ name: 'decks' }">
                    <img src="../../../public/assets/img/logo.png" alt="logo to home"
                        class="size-10">
                </router-link>
            </h1>
            <ul class="flex text-sm divide-x divide-stroke">
                <li class="py-4 px-4">
                    <router-link :to="{ name: 'decks' }">
                                Your decks
                    </router-link>
                </li>
                <li class="py-4 px-4">
                    <router-link :to="{ name: 'account' }">
                                Your account
                    </router-link>
                </li>
                <li class="flex items-center px-2">
                    <router-link :to="{ name: 'login' }">
                        <img src="../../../public/assets/img/nav/disconnect.png" alt="Disconnect"
                            class="size-4">
                    </router-link>
                </li>
            </ul>
        </nav>
    </header>
</template>