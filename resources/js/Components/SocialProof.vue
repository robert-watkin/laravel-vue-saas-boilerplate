<script setup>

const testimonials = [
    {
        name: 'Sheryl Berge',
        avatar: 'https://randomuser.me/api/portraits/women/2.jpg',
        testimonial: 'I love the fitness apparel and gear I purchased from this site. The quality is exceptional and the prices are unbeatable.'
    },
    {
        name: 'John Doe',
        avatar: 'https://randomuser.me/api/portraits/men/12.jpg',
        testimonial: 'The product is amazing. I love the quality and the prices are unbeatable.'
    },
    {
        name: 'Jane Doe',
        avatar: 'https://randomuser.me/api/portraits/women/15.jpg',
        testimonial: 'I don\'t know what I would do without this product. It has made my life so much easier.'
    },
];
</script>

<template>
    <section id="testimonials" aria-label="What our customers are saying">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl md:text-center" v-motion-pop-visible>
                <h2 class="font-display text-3xl tracking-tight sm:text-4xl">What Our Customers Are
                    Saying</h2>
            </div>
            <div class="flex flex-col md:flex-row justify-between space-y-4 md:space-x-6 mt-12">
                <div v-for="testimonial in testimonials" class="card md:w-1/3 bg-base-200 flex p-4 flex-col items-center gap-6" v-motion-pop-visible>
                    <figure class="relative flex-col shadow-slate-900/10">
                        <blockquote class="relative">
                            <p class="text-lg tracking-tight">{{ testimonial.testimonial }}</p>
                        </blockquote>
                        <figcaption class="relative mt-6 flex w-full items-center justify-between border-t border-accent pt-6">
                            <div>
                                <div class="font-display text-base">{{ testimonial.name }}</div>
                            </div>
                            <div class="overflow-hidden rounded-full bg-slate-50">
                                <img alt="" class="h-14 w-14 object-cover" style="color:transparent"
                                    :src='testimonial.avatar'>
                            </div>
                        </figcaption>
                    </figure>
                </div>
            </div>
        </div>
    </section>
</template>