<script setup>
import { computed } from 'vue';

const emit = defineEmits(['update:checked']);

const props = defineProps({
    size: {
        type: String,
        default: 'sm'
    },
    username: {
        type: String,
    }
});

const withClass = computed(() => {
    return {
        sm: 'w-6 h-6'
    }[props.size];
});
</script>

<template>
    <img :src="`https://api.dicebear.com/9.x/adventurer-neutral/svg?seed=${props.username}`" :class="[withClass, 'rounded-full overflow-hidden']" />
</template>