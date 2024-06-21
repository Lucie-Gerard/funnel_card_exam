<script setup>
//csrf token
const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

</script>

<template>
    <h2 class="mb-16">
        Create a new deck
    </h2>
    <form method="POST" action="/decks"
          enctype="application/x-www-form-urlencoded"
          class="flex flex-col items-center mb-4">
        <input type="hidden" name="_token" :value="csrf">

        <input type="text"
               name="name"
               class="border-2 border-stroke rounded-sm mb-8 pl-2"
               placeholder="Name your deck" />

        <label for="category">
            Choose a category
        </label>
        <select name="category_id" id="category"
                class="border-2 border-stroke rounded-sm mb-12 mt-4 pl-2">
            <option value="Languages">Languages</option>
            <option value="Math">Math</option>
            <option value="Sciences">Sciences</option>
            <option value="Nature">Nature</option>
            <option value="Animals">Animals</option>
        </select>

        <button type="submit"
                class="border-2 border-stroke rounded-md w-32 text-primary font-semibold">
            Create deck
        </button>
    </form>
</template>