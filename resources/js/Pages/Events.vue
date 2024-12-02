<script setup>
import BaseLayout from "@/Layouts/BaseLayout.vue";
import { Head, Link } from "@inertiajs/vue3";

defineProps({
    events: {
        type: Array,
        required: true,
    },
});

function formatDate(date) {
    const dateConverted = new Date(date);
    const year = dateConverted.getFullYear();
    const month = String(dateConverted.getMonth()).padStart(2, "0");
    const day = String(dateConverted.getDay()).padStart(2, "0");

    const hours = String(dateConverted.getHours()).padStart(2, "0");
    const minutes = String(dateConverted.getMinutes()).padStart(2, "0");

    return `${year}. ${month}. ${day} ${hours}:${minutes}`;
}
</script>
<template>
    <Head title="Események" />
    <BaseLayout>
        <div class="flex gap-6 flex-wrap">
            <div
                v-for="event in events"
                class="w-72 h-96 border-black border rounded-lg bg bg-white dark:bg-gray-800 shadow-md p-4 hover:scale-105 transition-transform cursor-pointer"
            >
                <Link :href="route('event.details', event.id)">
                    <div class="card-header flex justify-center items-center">
                        <img
                            class="h-40"
                            :src="'data:image/png;base64,' + event.image"
                        />
                    </div>
                    <div
                        class="card-body mt-6 break-words text-ellipsis overflow-hidden"
                    >
                        <h1 class="text-black dark:text-white text-xl h-16">
                            {{ event.title }}
                        </h1>
                        <!-- {{ event.topic }} -->
                        <p>{{ formatDate(event.time) }}</p>
                        <p>{{ event.course.name }}</p>
                        <p>Helyszín: {{ event.classroom.name }}</p>
                        <p>{{ event.teacher.name }}</p>
                    </div>
                </Link>
            </div>
        </div>
    </BaseLayout>
</template>
