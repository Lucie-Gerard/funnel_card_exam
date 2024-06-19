<script setup>

</script>

<template>
    <nav class="flex items-center justify-between bg-bgPrimary">
        <h1 class="ml-8">
            <router-link to="/">
                <img src="../../../public/assets/img/logo.png" alt="logo to home"
                     class="size-10">
            </router-link>
        </h1>
        <ul class="flex text-sm divide-x divide-stroke">
            <li class="py-4 px-8">
                <router-link to="/">
                             Your decks
                </router-link>
            </li>
            <li class="py-4 px-8">
                <router-link to="/account">
                             Your account
                </router-link>
            </li>
        </ul>
    </nav>
</template>