<script setup>
const props = defineProps(['modelValue']);

const emit = defineEmits(['update:modelValue']);
</script>

<template>
    <input type="text" class="border-2 border-stroke rounded-sm
                              text-xs sm:text-sm md:text-base"
           :value="modelValue"
           @input="$emit('update:modelValue', $event.target.value.toLowerCase())">
</template>