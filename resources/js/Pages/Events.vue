<script setup>
defineProps({
    events: {
        type: Array,
        required: true,
    },
});
</script>
<template>
    {{ events }}
</template>
