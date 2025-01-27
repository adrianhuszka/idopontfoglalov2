<script setup>
import BaseLayout from "@/Layouts/BaseLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import { ref } from "vue";

const props = defineProps({
    events: {
        type: Array,
        required: true,
    },
    courses: {
        type: Array,
        required: true,
    },
    teachers: {
        type: Array,
        required: true,
    },
});

const dates = ref(new Set());

props.events.forEach((event) => {
    const date = event.time.split(" ")[0].replaceAll("-", ". ") + ".";
    const time = event.time.split(" ")[1].slice("0, -3");
    dates.value.add(event.time);
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
        <div
            class="mb-16 flex justify-center items-center rounded-2xl text-white"
        >
            <input
                type="text"
                v-model="input"
                placeholder="Kereső..."
                class="flex rounded-2xl w-96 dark:bg-slate-500 text-teal-50 dark:placeholder-slate-50"
            />
        </div>
        <div
            class="flex rounded-2xl justify-evenly text-white dark:placeholder-slate-50 items-center flex-row w-full gap-10 mb-14"
        >
            <select
                name=""
                id="nap"
                class="flex rounded-2xl w-96 dark:bg-slate-500 text-teal-50 dark:placeholder-slate-50 text-center focus:outline-none"
                style="appearance: revert; background-image: none"
            >
                <option value="0">Válassz időpontot!</option>
                <option v-for="date in dates"></option>
            </select>

            <select
                name=""
                id="ora"
                class="flex rounded-2xl w-96 dark:bg-slate-500 text-teal-50 dark:placeholder-slate-50 text-center"
                style="appearance: revert; background-image: none"
            >
                <option value="0">Válassz időpontot!</option>
                <option v-for="date in dates" :value="date">{{ date }}</option>
            </select>

            <select
                name=""
                id="szak"
                class="flex rounded-2xl w-96 dark:bg-slate-500 text-teal-50 dark:placeholder-slate-50 text-center"
                style="appearance: revert; background-image: none"
            >
                <option value="0">Válassz szakot!</option>
                <!-- <option value="4">Automatikai technikus</option>
                <option value="3">Erősáramú elektrotechnikus</option>
                <option value="5">
                    Informatikai rendszer- és alkalmazás-üzemeltető technikus
                </option>
                <option value="8">Közismeret</option>
                <option value="6">Szoftverfejlesztő és -tesztelő</option>
                <option value="7">Távközlési technikus</option> -->
                <option v-for="courses in courses" :value="courses.id"></option>
            </select>

            <select
                name=""
                id="oktatok"
                class="flex rounded-2xl w-96 dark:bg-slate-500 text-teal-50 dark:placeholder-slate-50 text-center appearance-none bg-white"
                style="appearance: revert; background-image: none"
            >
                <option value="0">Válassz oktatót!</option>
            </select>
        </div>
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
