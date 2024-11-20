<script setup>
import { ref, computed } from 'vue';
import { usePage } from '@inertiajs/vue3';

const page = usePage();
const pricingTier = computed(() => page.props.subscriptionOptions);

const showAnnualSubscriptions = ref(0);
</script>

<!-- TODO if the user is already subscribed either take them to the dashboard or take them to the billing portal -->

<template>
    <section id="pricing" class="leading-7 bg-base-100 min-h-screen md:py-24">
        <div class="box-border px-4 mx-auto md:max-w-[75%]">
            <div class="flex flex-col items-center leading-7 text-center md:py-12">
                <h2 class="font-display text-3xl tracking-tight sm:text-4xl">
                    Simple, Transparent Pricing
                </h2>
                <p class="box-border mt-2 border-solid sm:text-2xl">
                    <!-- Subheading -->
                    Say something about your product!
                </p>
            </div>

            <div class="flex flex-row justify-end">
                <div class="form-control">
                    <label class="label cursor-pointer">
                        <span class="label-text mr-4">{{showAnnualSubscriptions ? 'Annually' : 'Monthly'}}</span>
                        <input type="checkbox" class="toggle" v-model="showAnnualSubscriptions" checked />
                    </label>
                </div>
            </div>
            <!-- pricing row -->
            <div class="flex flex-col items-center justify-center w-full space-y-4 md:space-y-0 md:space-x-16 md:flex-row">
                <div v-for="priceTier in pricingTier"
                    class="flex flex-col relative w-full max-w-xl items-center text-center p-4 rounded-xl"
                    :class="priceTier.mostPopular ? 'bg-primary-20' : 'bg-secondary-20'"> 
                    <div v-if="priceTier.mostPopular"
                        class="absolute  animate-pulse -top-0 right-0 bg-primary text-primary-content px-2 rounded-bl-lg rounded-tr-lg">
                        Most Popular!
                    </div>
                    <!-- Tier Title and Price -->
                    <h3 class="m-0 text-lg font-semibold leading-tight sm:text-xl md:text-2xl">
                        {{ priceTier.title }}
                    </h3>

                    <div class="flex items-end leading-7 py-4">
                        <p class="m-0 text-5xl font-semibold leading-none text-transparent bg-clip-text w-24 h-12 bg-gradient-to-r from-primary to-accent ">
                            {{ (showAnnualSubscriptions ? priceTier.yearly.price : priceTier.monthly.price) }}
                        </p>
                        <p class="m-0">
                            / {{ showAnnualSubscriptions ? 'year' : 'month' }}
                        </p>
                    </div>

                    <!-- Tier Features -->
                    <ul class="p-0 my-4 py-4">
                        <li v-for="feature in priceTier.features"
                            class="flex flex-row justify-center items-center w-full mb-2 font-semibold text-text">
                            <svg class="w-5 h-5 mr-2 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                            {{ feature }}
                        </li>
                        <li v-for="feature in priceTier.notFeatures"
                            class="flex flex-row justify-center items-center w-full mb-2 font-semibold text-text opacity-50">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2 text-accent stroke-[3]" fill="none"
                                stroke="currentColor" viewBox="0 0 50 50">
                                <path
                                    d="M 7.71875 6.28125 L 6.28125 7.71875 L 23.5625 25 L 6.28125 42.28125 L 7.71875 43.71875 L 25 26.4375 L 42.28125 43.71875 L 43.71875 42.28125 L 26.4375 25 L 43.71875 7.71875 L 42.28125 6.28125 L 25 23.5625 Z">
                                </path>
                            </svg>
                            {{ feature }}
                        </li>
                    </ul>

                    <!-- Start Now Button -->
                    <div class="w-full px-8 pt-12 pb-4">
                        <a :href="'/checkout/subscription/' + (showAnnualSubscriptions ? priceTier.yearly.stripe_id : priceTier.monthly.stripe_id)" class="btn w-full mt-auto" :class="priceTier.mostPopular ? 'btn-primary text-primary-content' : 'btn-secondary text-secondary-content'">
                            Start Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
