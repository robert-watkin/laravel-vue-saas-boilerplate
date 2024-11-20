<script setup>
import { ref } from 'vue';

const questions = ref([
    {
        id: 1,
        question: 'How do I modify the questions and answers?',
        answer: 'You need to open the FAQ.vue component. You can find it in the resources/js/Components/FAQ.vue file. You can modify the questions and answers in the questions array. Each question is an object with a question and answer property. You can add more questions by adding more objects to the questions array.',
        show: false
    },
    {
        id: 2,
        question: 'How do I change the styling of the FAQ section?',
        answer: 'You can change the styling of the FAQ section by modifying the tailwind classes in the FAQ.vue component. You can find the component in the resources/js/Components/FAQ.vue file. You can modify the classes in the template section to change the styling of the FAQ section.',
        show: false
    },
    {
        id: 3,
        question: 'What is the cost?',
        answer: 'Lorem ipsum dolar sit amet, consectetur adipiscing elit. Nulla nec purus feugiat, molestie ipsum et, fermentum nisl. Donec turpis nulla, lacinia ut nunc in, tincidunt lacinia nunc. Nulla facilisi. Nulla nec purus feugiat, molestie ipsum et, fermentum nisl. Donec turpis nulla, lacinia ut nunc in, tincidunt lacinia nunc. Nulla facilisi.',
        show: false
    },
    {
        id: 4,
        question: 'How do I get started?',
        answer: 'Lorem ipsum dolar sit amet, consectetur adipiscing elit. Nulla nec purus feugiat, molestie ipsum et, fermentum nisl. Donec turpis nulla, lacinia ut nunc in, tincidunt lacinia nunc. Nulla facilisi. Nulla nec purus feugiat, molestie ipsum et, fermentum nisl. Donec turpis nulla, lacinia ut nunc in, tincidunt lacinia nunc. Nulla facilisi.',
        show: false
    },
]);



</script>

<template>
    <div class="flex flex-col max-w-4xl mx-auto px-4 py-12 items-center leading-7 text-center">
        <h2 id="pricing" class="font-display text-3xl tracking-tight sm:text-4xl" v-motion-pop-visible>
            FAQ
        </h2>
        <p class="box-border mt-2 text-xl  border-solid sm:text-2xl">
            <!-- Subheading -->
        </p>
        <div class="w-full space-y-2">
            <div v-for="question in questions" class="collapse collapse-arrow bg-base-200" v-motion-pop-visible>
                <input type="radio" name="my-accordion-2" checked="checked" />
                <div class="collapse-title text-xl font-medium">
                    Q: {{ question.question }}
                </div>
                <div class="collapse-content">
                    <!-- generate lorem impsum -->
                    <p>A: {{ question.answer }}</p> 
                </div>
            </div>
        </div>
    </div>
</template>
