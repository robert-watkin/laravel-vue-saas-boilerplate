<script setup>
defineProps({
    message: String,
});
</script>

<template>
    <div v-show="message">
        <p class="text-sm text-error">
            {{ message }}
        </p>
    </div>
</template>
