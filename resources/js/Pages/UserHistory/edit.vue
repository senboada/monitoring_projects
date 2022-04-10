<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/inertia-vue3";
</script>
<template>
    <AppLayout title="Edit">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit User History
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <form @submit.prevent="submit" class="mb-6">
                        <div
                            class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7"
                        >
                            <div class="grid grid-cols-1">
                                <label
                                    class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold"
                                    >Project</label
                                >
                                <select
                                    v-model="form.cod_project"
                                    class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                    placeholder="Projects"
                                >
                                    <option
                                        v-for="project in projects"
                                        v-bind:value="project.id"
                                        :key="project.id"
                                    >
                                        {{ project.title }}
                                    </option>
                                </select>
                            </div>

                            <div class="grid grid-cols-1">
                                <label
                                    class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold"
                                    >Title</label
                                >
                                <input
                                    id="title"
                                    v-model="form.title"
                                    class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                    type="text"
                                    placeholder="Title"
                                />
                            </div>

                            <div class="grid grid-cols-1">
                                <label
                                    class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold"
                                    >Description</label
                                >
                                <textarea
                                    id="description"
                                    v-model="form.description"
                                    class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                    type="text"
                                    placeholder="Description"
                                />
                            </div>
                        </div>

                        <div
                            role="alert"
                            v-if="Object.keys(errors).length !== 0"
                        >
                            <div
                                class="bg-red-500 text-white font-bold rounded-t px-4 py-2"
                            >
                                Errors
                            </div>
                            <div
                                class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700"
                            >
                                <p>{{ errors }}</p>
                            </div>
                        </div>

                        <div
                            class="flex justify-end md:gap-8 gap-4 pt-5 pb-5 pr-5"
                        >
                            <Link
                                :href="route('userhistories.index')"
                                class="w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2"
                                type="button"
                            >
                                Cancelar
                            </Link>
                            <button
                                type="submit"
                                class="w-auto bg-purple-500 hover:bg-purple-700 rounded-lg shadow-xl font-medium text-white px-4 py-2"
                            >
                                Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
<script>
export default {
    components: {
        AppLayout,
        Link,
    },
    props: {
        errors: Object,
        userhistory: Object,
        projects: Array,
    },
    data() {
        return {
            form: {
                cod_project: this.$props.userhistory.cod_project,
                title: this.$props.userhistory.title,
                description: this.$props.userhistory.description,
            },
        };
    },
    methods: {
        submit() {
            this.$inertia.put(
                route("userhistories.update", this.$props.userhistory.id),
                this.form
            );
        },
    },
};
</script>
