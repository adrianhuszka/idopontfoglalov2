<script setup>
defineProps({
    event: {
        type: Object,
        required: true,
    },
});
</script>
<template>
    {{ event }}
</template>
