<script setup>

</script>

<template>
    <div class="flex flex-col items-center">
        <h2 class="mt-8 mb-12">
            Create an account
        </h2>

        <form
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

            <button class="border-2 border-stroke rounded-md w-32 text-primary font-semibold">
                Create account
            </button>
        </form>
    </div>
</template>