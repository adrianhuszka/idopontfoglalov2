<script setup>
import { Head, Link } from "@inertiajs/vue3";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
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
    <AppLayout title="Events">
        <template #header>
            <h2
                class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
            >
                Events
            </h2>
        </template>

        <BaseLayout>
            <div
                class="mb-16 flex justify-center items-center rounded-2xl text-white"
            >
                <input
                    type="text"
                    v-model="input"
                    placeholder="Kereső..."
                    class="flex rounded-2xl w-96 dark:bg-slate-500 text-teal-50 dark:placeholder-slate-50 mt-6"
                />
            </div>
            <div
                class="flex rounded-2xl justify-evenly text-white dark:placeholder-slate-50 items-center flex-row w-full gap-10 mb-14"
            >
                <select
                    name=""
                    id="nap"
                    class="flex rounded-2xl w-96 dark:bg-slate-500 text-teal-50 dark:placeholder-slate-50 text-center focus:outline-none"
                    style="appearance: revert"
                >
                    <option value="0">Válassz időpontot!</option>
                </select>

                <select
                    name=""
                    id="ora"
                    class="flex rounded-2xl w-96 dark:bg-slate-500 text-teal-50 dark:placeholder-slate-50 text-center"
                    style="appearance: revert"
                >
                    <option value="0">Válassz időpontot!</option>
                </select>

                <select
                    name=""
                    id="szak"
                    class="flex rounded-2xl w-96 dark:bg-slate-500 text-teal-50 dark:placeholder-slate-50 text-center"
                    style="appearance: revert"
                >
                    <option value="0">Válassz szakot!</option>
                    <option value="4">Automatikai technikus</option>
                    <option value="3">Erősáramú elektrotechnikus</option>
                    <option value="5">
                        Informatikai rendszer- és alkalmazás-üzemeltető
                        technikus
                    </option>
                    <option value="8">Közismeret</option>
                    <option value="6">Szoftverfejlesztő és -tesztelő</option>
                    <option value="7">Távközlési technikus</option>
                </select>

                <select
                    name=""
                    id="oktatok"
                    class="flex rounded-2xl w-96 dark:bg-slate-500 text-teal-50 dark:placeholder-slate-50 text-center appearance-none bg-white"
                    style="appearance: revert"
                >
                    <option value="0">Válassz oktatót!</option>
                </select>
            </div>
            <div class="flex gap-6 flex-wrap p-5">
                <div
                    v-for="event in events"
                    class="w-72 h-[25rem] border-black border rounded-lg bg bg-white dark:bg-gray-800 shadow-md p-4 hover:scale-105 transition-transform cursor-pointer"
                >
                    <Link :href="route('admin.event.details', event.id)">
                        <div
                            class="card-header flex justify-center items-center"
                        >
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
                            <p class="dark:text-white">
                                {{ formatDate(event.time) }}
                            </p>
                            <p class="dark:text-white">
                                {{ event.course.name }}
                            </p>
                            <p class="dark:text-white">
                                Helyszín: {{ event.classroom.name }}
                            </p>
                            <p class="dark:text-white">
                                {{ event.teacher.name }}
                            </p>
                            <SecondaryButton
                                class="bg-green-500 hover:bg-green-700 border-0 mr-2"
                                href="#"
                            >
                                <svg
                                    width="15px"
                                    height="15px"
                                    viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <title />

                                    <g id="Complete">
                                        <g id="edit">
                                            <g>
                                                <path
                                                    d="M20,16v4a2,2,0,0,1-2,2H4a2,2,0,0,1-2-2V6A2,2,0,0,1,4,4H8"
                                                    fill="none"
                                                    class="stroke-green-500"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                />

                                                <polygon
                                                    fill="none"
                                                    points="12.5 15.8 22 6.2 17.8 2 8.3 11.5 8 16 12.5 15.8"
                                                    class="stroke-green-500"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                />
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </SecondaryButton>
                            <SecondaryButton
                                class="bg-red-500 hover:bg-red-700 border-0"
                                href="#"
                            >
                                <svg
                                    width="15px"
                                    height="15px"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M18 6L17.1991 18.0129C17.129 19.065 17.0939 19.5911 16.8667 19.99C16.6666 20.3412 16.3648 20.6235 16.0011 20.7998C15.588 21 15.0607 21 14.0062 21H9.99377C8.93927 21 8.41202 21 7.99889 20.7998C7.63517 20.6235 7.33339 20.3412 7.13332 19.99C6.90607 19.5911 6.871 19.065 6.80086 18.0129L6 6M4 6H20M16 6L15.7294 5.18807C15.4671 4.40125 15.3359 4.00784 15.0927 3.71698C14.8779 3.46013 14.6021 3.26132 14.2905 3.13878C13.9376 3 13.523 3 12.6936 3H11.3064C10.477 3 10.0624 3 9.70951 3.13878C9.39792 3.26132 9.12208 3.46013 8.90729 3.71698C8.66405 4.00784 8.53292 4.40125 8.27064 5.18807L8 6M14 10V17M10 10V17"
                                        class="stroke-red-500"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                            </SecondaryButton>
                        </div>
                    </Link>
                </div>
            </div>
        </BaseLayout>
    </AppLayout>
</template>
