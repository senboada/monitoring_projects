<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/inertia-vue3";
</script>
<template>
    <AppLayout title="Create">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Project Detail
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div
                        class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7"
                    >
                        <div class="grid grid-cols-1">
                            <div
                                class="bg-white dark:bg-slate-900 rounded-lg px-6 py-8 ring-1 ring-slate-900/5 shadow-xl"
                            >
                                <h3
                                    class="text-slate-900 dark:text-white text-base font-medium tracking-tight"
                                >
                                    Company
                                </h3>
                                <p
                                    class="text-slate-500 dark:text-slate-400 mt-2 text-sm"
                                >
                                    {{ project.company.name }}
                                </p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1">
                            <div
                                class="bg-white dark:bg-slate-900 rounded-lg px-6 py-8 ring-1 ring-slate-900/5 shadow-xl"
                            >
                                <h3
                                    class="text-slate-900 dark:text-white text-base font-medium tracking-tight"
                                >
                                    Title
                                </h3>
                                <p
                                    class="text-slate-500 dark:text-slate-400 mt-2 text-sm"
                                >
                                    {{ project.title }}
                                </p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1">
                            <div
                                class="bg-white dark:bg-slate-900 rounded-lg px-6 py-8 ring-1 ring-slate-900/5 shadow-xl"
                            >
                                <h3
                                    class="text-slate-900 dark:text-white text-base font-medium tracking-tight"
                                >
                                    Status
                                </h3>
                                <p
                                    class="text-slate-500 dark:text-slate-400 mt-2 text-sm"
                                >
                                    {{ project.status }}
                                </p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1">
                            <div
                                class="bg-white dark:bg-slate-900 rounded-lg px-6 py-8 ring-1 ring-slate-900/5 shadow-xl"
                            >
                                <h3
                                    class="text-slate-900 dark:text-white text-base font-medium tracking-tight"
                                >
                                    Description
                                </h3>
                                <p
                                    class="text-slate-500 dark:text-slate-400 mt-2 text-sm"
                                >
                                    {{ project.description }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end md:gap-8 gap-4 pt-5 pb-5 pr-5">
                        <Link
                            :href="route('projects.index')"
                            class="w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2"
                            type="button"
                        >
                            Back
                        </Link>
                    </div>
                    <br />
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
        project: Object,
    },
};
</script>
