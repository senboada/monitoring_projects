<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/inertia-vue3";
</script>
<template>
    <AppLayout title="Company">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Projects
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <Link
                        :href="route('projects.create')"
                        class="flex-shrink-0 bg-blue-500 text-white text-base font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-blue-200"
                        type="button"
                    >
                        Add (+)
                    </Link>

                    <table
                        class="rounded-t-lg mt-5 min-w-full mx-auto bg-gray-800 text-gray-100"
                    >
                        <thead>
                            <tr class="text-left border-b border-gray-300">
                                <th
                                    scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider"
                                >
                                    Company
                                </th>
                                <th
                                    scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider"
                                >
                                    title
                                </th>
                                <th
                                    scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-100 uppercase tracking-wider"
                                >
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody
                            class="bg-gray-700 border-b border-gray-600 text-gray-200"
                        >
                            <tr v-for="project in projects" :key="project.id">
                                <td
                                    class="px-6 py-4 whitespace-nowrap"
                                    v-if="project.company"
                                >
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium">
                                                {{ project.company.name }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td
                                    class="px-6 py-4 whitespace-nowrap"
                                    v-if="project.company"
                                >
                                    <div class="text-sm">
                                        {{ project.title }}
                                    </div>
                                </td>
                                <td class="flex m-2" v-if="project.company">
                                    <Link
                                        :href="
                                            route('projects.edit', project.id)
                                        "
                                        class="flex-shrink-0 bg-purple-600 text-white text-base font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200 ml-8"
                                        type="button"
                                    >
                                        Edit
                                    </Link>

                                    <Link
                                        :href="
                                            route('projects.show', project.id)
                                        "
                                        class="flex-shrink-0 bg-blue-600 text-white text-base font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200 ml-8"
                                        type="button"
                                    >
                                        Show
                                    </Link>

                                    <Link
                                        method="delete"
                                        :href="
                                            route(
                                                'projects.destroy',
                                                project.id
                                            )
                                        "
                                        as="button"
                                        class="ml-8 flex-shrink-0 bg-pink-500 text-white text-base font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 focus:ring-offset-pink-200"
                                        type="button"
                                    >
                                        Delete
                                    </Link>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
<script>
export default {
    props: {
        projects: Array,
    },
    components: {
        AppLayout,
        Link,
    },
};
</script>
