<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 ">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 shadow-md overflow-hidden bg-base-200 sm:rounded-lg">
            <div class="flex flex-row justify-center my-4">
                <slot name="logo" />
            </div>


            <slot />
        </div>
    </div>
</template>
