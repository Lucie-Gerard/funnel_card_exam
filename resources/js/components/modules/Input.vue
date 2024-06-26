<script setup>
const props = defineProps(['modelValue']);

const emit = defineEmits(['update:modelValue']);

/* Props pour lier cet input aux vues qui utilisent ce composant input avec v-model
   et emits pour leur envoyer la valeur */
</script>

<template>
    <input type="text" class="border-2 border-stroke rounded-sm
                              text-xs sm:text-sm md:text-base"
           :value="modelValue"
           @input="$emit('update:modelValue', $event.target.value)">
</template>