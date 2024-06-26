<script setup>
import AuthButton from '../modules/AuthButton.vue';

components: [
    AuthButton
]

// Pas encore fonctionnel
</script>

<template>
    <div class="">
        <header>
            <h1 class="flex justify-center mb-4">
                <router-link :to="{ name: 'login' }">
                    <img src="../../../../public/assets/img/logo.png" alt="Page login"
                         class="size-12">
                </router-link>
                
            </h1>
        </header>
        <main class="">
            <h2 class="mb-8">
                Create an account
            </h2>

            <form method="POST" action=""
                  class="flex flex-col text-center items-center">
                <label for="username">Your username</label>
                <input id="username" type="text"
                       class="border-2 border-stroke rounded-sm mt-2 mb-8 pl-2">

                <label for="password">Your password</label>
                <input id="password" type="text"
                       class="border-2 border-stroke rounded-sm mt-2 mb-8 pl-2">

                <label for="email">Your email</label>
                <input id="email" type="text"
                       class="border-2 border-stroke rounded-sm mt-2 mb-8 pl-2">

                <AuthButton>
                    Create account
                </AuthButton>
            </form>
        </main>
        
    </div>
</template>