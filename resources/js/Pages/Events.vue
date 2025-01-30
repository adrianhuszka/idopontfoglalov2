<script setup>
import BaseLayout from "@/Layouts/BaseLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import { ref } from "vue";
import "boxicons";

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
const times = ref(new Set());

props.events.forEach((event) => {
    const date = event.time.split(" ")[0].replaceAll("-", ". ") + ".";
    const time = event.time.split(" ")[1].slice(0, -3);
    dates.value.add(date);
    times.value.add(time);
});

function formatDate(date) {
    const dateConverted = new Date(date);
    const year = dateConverted.getFullYear();
    const month = String(dateConverted.getMonth() + 1).padStart(2, "0");
    const day = String(dateConverted.getDay()).padStart(2, "0");

    const hours = String(dateConverted.getHours()).padStart(2, "0");
    const minutes = String(dateConverted.getMinutes()).padStart(2, "0");

    return `${year}. ${month}. ${day} ${hours}:${minutes}`;
}

function filtermezo() {
    if (document.getElementById("Kreresömezö").classList == "hidden") {
        document.getElementById("Kreresömezö").classList.remove("hidden");
    } else {
        document.getElementById("Kreresömezö").classList.add("hidden");
    }
}
function filterikoncsere() {
    document.getElementById("ikon").setAttribute("display", "none");
    document.getElementById("filtertext").setAttribute("display", "block");
}
</script>
<style>
button:hover {
    display: block;
    background-color: aquamarine;
}
.hide {
    display: none;
}

.mydiv:hover + .hide:hover {
    background-color: #f1f1f1;
    border: 1px solid black;
    display: absolute;
    left: 50px;
    top: 50px;
    color: chocolate;
}
</style>
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
            <button
                class="mydiv flex rounded-full w-16 h-11 dark:bg-slate-500 text-teal-50 dark:placeholder-slate-50 display-flex justify-center items-center ml-4"
                id="Filtergomb"
                @click="filtermezo()"
                @mouseenter="showDescription = true"
                @mouseleave="showDescription = false"
                alt="Szűrő"
            >
                <box-icon id="ikon" name="filter"></box-icon>
                <p id="filtertext" class="hide">Filter</p>
            </button>
            <div style="display: none" id="filtertext"></div>
        </div>
        <div
            class="flex rounded-2xl justify-evenly dark:text-white text-black dark:placeholder-slate-50 items-center flex-row w-full gap-10 mb-14"
        >
            <div id="Kreresömezö" class="hidden">
                <select
                    name=""
                    id="nap"
                    class="mb-3 flex rounded-2xl w-96 dark:bg-slate-500 dark:text-teal-50 text-black dark:placeholder-slate-50 placeholder-slate-950 text-center focus:outline-none"
                    style="appearance: revert"
                >
                    <option value="0">Válassz időpontot!</option>
                    <option v-for="date in dates" :value="date">
                        {{ date }}
                    </option>
                </select>

                <select
                    name=""
                    id="ora"
                    class="mb-3 flex rounded-2xl w-96 dark:bg-slate-500 text-teal-50 dark:placeholder-slate-50 text-center"
                    style="appearance: revert"
                >
                    <option value="0">Válassz időpontot!</option>
                    <option v-for="date in dates" :value="date">
                        {{ time }}
                    </option>
                </select>

                <select
                    name=""
                    id="szak"
                    class="mb-3 flex rounded-2xl w-96 dark:bg-slate-500 text-teal-50 dark:placeholder-slate-50 text-center"
                    style="appearance: revert"
                >
                    <!-- <option value="0">Válassz szakot!</option>
                    <option value="4">Automatikai technikus</option>
                    <option value="3">Erősáramú elektrotechnikus</option>
                    <option value="5">
                        Informatikai rendszer- és alkalmazás-üzemeltető technikus
                    </option>
                    <option value="8">Közismeret</option>
                    <option value="6">Szoftverfejlesztő és -tesztelő</option>
                    <option value="7">Távközlési technikus</option> -->
                    <option value="0">Válassz szakot!</option>
                    <option v-for="course in courses" :value="course.id">
                        {{ course.name }}
                    </option>
                </select>

                <select
                    name=""
                    id="oktatok"
                    class="flex rounded-2xl w-96 dark:bg-slate-500 text-teal-50 dark:placeholder-slate-50 text-center appearance-none bg-white"
                    style="appearance: revert"
                >
                    <option value="0">Válassz oktatót!</option>
                    <option v-for="teacher in teachers" :value="teacher.id">
                        {{ teacher.name }}
                    </option>
                </select>
            </div>
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
