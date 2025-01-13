<script setup>
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";

defineProps({
    event: {
        type: Object,
        required: true,
    },
});

const form = useForm({
    nev: "",
    email: "",
    email2: "",
});

const submit = () => {
    form.post();
};

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
    <AppLayout>
        <template #header>
            <h2
                class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
            >
                Event detalis
            </h2>
        </template>

        <Head title="Események" />
        <BaseLayout>
            <main class="flex justify-center items-center w-full h-full mt-20">
                <div
                    class="bg-white dark:bg-gray-800 shadow-lg hover:shadow-2xl transition w-4/5 min-h-[60vh] flex justify-evenly items-start p-8 rounded-2xl"
                >
                    <div class="max-w-[35%] dark:text-white">
                        <h1 class="text-2xl">{{ event.title }}</h1>
                        <hr class="border-[1.5px] rounded-full mb-6" />
                        <p><b>Tanár:</b> {{ event.teacher.name }}</p>
                        <p><b>Tanterem:</b> {{ event.classroom.name }}</p>
                        <p><b>Szak:</b> {{ event.course.name }}</p>
                        <p class="mb-6">
                            <b>Időpont: </b>
                            {{ formatDate(event.time) }} ({{ event.duration }}
                            perc)
                        </p>
                        <p class="text-justify">{{ event.description }}</p>

                        <form @submit.prevent="submit">
                            <div class="mt-4">
                                <InputLabel for="nev" value="Név" />
                                <TextInput
                                    id="nev"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.nev"
                                    required
                                />
                                <InputError class="mt-2" />
                            </div>
                            <div class="mt-4">
                                <InputLabel for="email" value="Email" />
                                <TextInput
                                    id="email"
                                    type="email"
                                    class="mt-1 block w-full"
                                    v-model="form.email"
                                    required
                                />
                                <InputError class="mt-2" />
                            </div>
                            <div class="mt-4">
                                <InputLabel for="email2" value="Email újra" />
                                <TextInput
                                    id="email2"
                                    type="email"
                                    class="mt-1 block w-full"
                                    v-model="form.email2"
                                    required
                                />
                                <InputError class="mt-2" />
                            </div>
                            <PrimaryButton class="mt-6"
                                >Jelentkezés</PrimaryButton
                            >
                        </form>
                    </div>
                    <div>
                        <p class="mb-6 text-xl text-center dark:text-white">
                            <b>Szabad helyek száma:</b> 0
                        </p>
                        <img
                            class="h-96"
                            :src="'data:image/png;base64,' + event.image"
                        />
                    </div>
                </div>
            </main>
        </BaseLayout>
    </AppLayout>
</template>
