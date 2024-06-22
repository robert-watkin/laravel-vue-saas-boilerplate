<script setup>
import { computed } from 'vue';
import { usePage } from '@inertiajs/vue3';
import ActionSection from '@/Components/ActionSection.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const page = usePage();

const user = computed(() => page.props.auth.user);
const pricingTier = computed(() => page.props.subscriptionOptions);
const subscription = computed(() => user.value.subscription);
// get pricing tier details where stripe_id is the same as the subscription plan stripe_id need to check both yearly.price_id and monthly.price_id. Will only return 1 result so no longer needs to be in an array
const subscriptionDetails = computed(() => {
    const filtered = pricingTier.value.filter((tier) => {
        return tier["yearly"]["stripe_id"] === subscription.value.stripe_price || tier["monthly"]["stripe_id"] === subscription.value.stripe_price;
    });

    var returnVal = {};
    // determine if it matched on monthly or yearly
    if (filtered[0].yearly.stripe_id === subscription.value.stripe_price) {
        returnVal.price = filtered[0].yearly.price;
        returnVal.pay_period = 'yearly';
    } else {
        returnVal.price = filtered[0].monthly.price;
        returnVal.pay_period = 'monthly';
    }
    // format date from sql datetime to just a date string
    returnVal.title = filtered[0].title;
    returnVal.features = filtered[0].features;
    returnVal.ends_at = subscription.value.ends_at

    return returnVal;
});
</script>

<template>
    <ActionSection>
        <template #title>
            Subscription Details
        </template>

        <template #description>
            Check your current subscription details and manage your subscription
        </template>

        <template #content>
            <div v-if="!subscription">
                <h3 class="text-lg font-medium">
                    You are not currently part of any subscription plan
                </h3>

                <div class="mt-3 max-w-xl text-sm text-base-content">
                    <p>
                        When your subscription is enabled you will see the details here. To start a subscription, click the
                        button below.
                    </p>
                </div>
            </div>

            <div v-else>
                <h3 class="text-lg font-medium">
                    Subscription Plan: {{ subscriptionDetails.title }}
                </h3>

                <div class="mb-3 max-w-xl text-sm stat-desc whitespace-normal">
                    <p>
                        Your subscription plan is currently active. You can manage your subscription using the button below.
                    </p>
                </div>

                <div class="stats w-full stats-vertical lg:stats-horizontal shadow">

                    <div class="stat">
                        <div class="stat-title">Your Plan</div>
                        <div class="stat-value">{{ subscriptionDetails.title }}</div>
                    </div>

                    <div class="stat">
                        <div class="stat-title">Cost</div>
                        <div class="stat-value">{{ subscriptionDetails.price }} <span class="stat-desc">{{
                            subscriptionDetails.pay_period }}</span></div>
                    </div>

                    <div class="stat">
                        <div class="stat-title">Features</div>
                        <ul>
                            <li v-for="feature in subscriptionDetails.features" class="list-item">{{ feature }}</li>
                        </ul>
                    </div>
                </div>

                <!-- DaisyUI alert -->
                <div v-if="subscriptionDetails.ends_at" role="alert" class="alert alert-error mt-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="stroke-current shrink-0 w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="text-error-content">Your subscription has been cancelled and will end at {{
                        subscriptionDetails.ends_at }}</span>
                </div>
            </div>

            <div class="mt-5">
                <div>
                    <a href="/billing-portal" class="text-sm text-gray-600 underline">
                        <PrimaryButton type="button">
                            Manage Subscription
                        </PrimaryButton>
                    </a>
                </div>
            </div>
        </template>
    </ActionSection>
</template>
