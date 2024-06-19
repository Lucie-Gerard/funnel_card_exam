<script setup>

</script>

<template>
    <div class="flex flex-col items-center">
        <h2 class="mb-16">
            <img src="../../../../public/assets/img/logo.png" alt="logo Funnel_Card"
                 class="size-24">
        </h2>

        <form action="post"
              class="flex flex-col text-center items-center">
            <label for="username">Username</label>
            <input id="username" type="text"
            placeholder=""
                   class="border-2 border-stroke rounded-sm mt-2 mb-8 pl-2">

            <label for="password">Password</label>
            <input id="password" type="text"
            placeholder=""
                   class="border-2 border-stroke rounded-sm mt-2 mb-8 pl-2">

            <button class="border-2 border-stroke rounded-md w-28 text-primary font-semibold">
                Log in
            </button>

            <button class="border-2 border-stroke rounded-md w-28 mt-4 text-primary font-semibold">
                Sign up
            </button>
        </form>
    </div>
</template>