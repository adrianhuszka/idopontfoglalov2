<script setup>
import SecondaryButton from "@/Components/SecondaryButton.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
defineProps({
    users: {
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
    <AppLayout title="Users">
        <template #header>
            <h2
                class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
            >
                Users
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg text-gray-800 dark:text-gray-200"
                >
                    <table class="w-full">
                        <thead class="h-16 bg-gray-700">
                            <tr>
                                <th>Felhasználónév</th>
                                <th>Teljes neve</th>
                                <th>Email</th>
                                <th>Email Visszaigazolva</th>
                                <th>Létrehozva</th>
                                <th>Műveletek</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="user in users"
                                :key="user.id"
                                class="border-t-2 border-slate-600 h-20"
                            >
                                <td class="pl-9">
                                    <div class="flex items-center">
                                        <img
                                            class="w-12 h-12 rounded-full object-cover"
                                            :src="user.profile_photo_url"
                                            :alt="user.name"
                                        />

                                        <div class="ms-4 leading-tight">
                                            <div
                                                class="text-gray-900 dark:text-white"
                                            >
                                                {{ user.username }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">{{ user.name }}</td>
                                <td class="text-center">
                                    {{ user.email }}
                                </td>
                                <td class="text-center">
                                    {{
                                        user.email_verified_at ? "Igen" : "Nem"
                                    }}
                                </td>
                                <td class="text-center">
                                    {{ formatDate(user.created_at) }}
                                </td>
                                <td class="text-center">
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
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
