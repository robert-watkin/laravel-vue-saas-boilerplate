<script setup>
import SiteLayout from '@/Layouts/SiteLayout.vue';
</script>

<template>
    <SiteLayout title="Cancelled">
        <div class="max-w-7xl mx-auto py-48 mb-48">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl font-extrabold  sm:text-4xl">Thanks for Purchasing!</h2>
                <p class="mt-4 text-lg ">Your purchase was successful. You will receive an email confirmation shortly.</p>
                <a href="/dashboard"><Button class="btn btn-primary mt-4">Dashboard</Button></a>
            </div>
        </div>
    </SiteLayout>
</template>