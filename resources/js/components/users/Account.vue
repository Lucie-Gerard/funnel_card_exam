<script setup>
import DefaultButton from '../modules/DefaultButton.vue';

components: [
    DefaultButton
]
</script>

<template>
    <h2 class="mt-8 mb-12">
        Your account
    </h2>

    <p class="mb-16">
        Here you can change your password.
    </p>

    <form method="" action=""
          class="flex flex-col text-center items-center">
            <label for="Oldpassword">Current password</label>
            <input id="Oldpassword" type="text"
                   class="border-2 border-stroke rounded-sm mt-2 mb-8 pl-2">

            <label for="newPassword">New password</label>
            <input id="newPassword" type="text"
                   class="border-2 border-stroke rounded-sm mt-2 mb-8 pl-2">

            <DefaultButton>
                Modify
            </DefaultButton>
        </form>
</template>
