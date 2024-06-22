<script setup>
import AuthButton from '../modules/AuthButton.vue';

components: [
    AuthButton
]
</script>

<template>
    <div>
        <header>
            <h2 class="mb-16 flex justify-center">
                <img src="../../../../public/assets/img/logo.png" alt="logo Funnel_Card"
                     class="size-24">
            </h2>
        </header>
        
        <main class="flex flex-col items-center">
            <form
                  class="flex flex-col text-center items-center">
                <label for="username">Username</label>
                <input id="username" type="text"
                placeholder=""
                       class="border-2 border-stroke rounded-sm mt-2 mb-8">

                <label for="password">Password</label>
                <input id="password" type="text"
                placeholder=""
                       class="border-2 border-stroke rounded-sm mt-2 mb-8">

                <AuthButton class="mb-4">
                    <router-link :to="{ name: 'decks' }">
                        Log in
                    </router-link>
                </AuthButton> 
            </form>
        
            <AuthButton>
                <router-link :to="{ name: 'register' }">
                    Sign up
                </router-link>
            </AuthButton> 
        </main>
        
    </div>
</template>