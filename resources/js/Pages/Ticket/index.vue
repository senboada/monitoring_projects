<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/inertia-vue3";
</script>
<template>
    <AppLayout title="Ticket">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Tickets
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <Link
                        :href="route('tickets.create')"
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
                                    class="px-4 py-2 text-left text-xs font-medium text-gray-100 uppercase tracking-wider"
                                >
                                    User History
                                </th>
                                <th
                                    scope="col"
                                    class="px-4 py-2 text-left text-xs font-medium text-gray-100 uppercase tracking-wider"
                                >
                                    title
                                </th>
                                <th
                                    scope="col"
                                    class="px-10 py-5 text-center text-xs font-medium text-gray-100 uppercase tracking-wider"
                                >
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody
                            class="bg-gray-700 border-b border-gray-600 text-gray-200"
                        >
                            <tr
                                v-for="ticket in tickets"
                                :key="ticket.id"
                                :class="validateStatus(ticket.status)"
                            >
                                <td
                                    class="px-6 py-4 whitespace-nowrap"
                                    v-if="ticket.userhistory"
                                >
                                    <div class="text-sm">
                                        {{
                                            ticket.userhistory.title.substring(
                                                0,
                                                30
                                            )
                                        }}...
                                    </div>
                                </td>
                                <td
                                    class="px-6 py-4 whitespace-nowrap"
                                    v-if="ticket.userhistory"
                                >
                                    <div class="text-sm">
                                        {{ ticket.title.substring(0, 30) }}...
                                    </div>
                                </td>
                                <td class="flex m-2" v-if="ticket.userhistory">
                                    <Link
                                        :href="route('tickets.edit', ticket.id)"
                                        class="flex-shrink-0 bg-purple-600 text-white text-base font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200 ml-2"
                                        type="button"
                                    >
                                        Edit
                                    </Link>

                                    <Link
                                        :href="route('tickets.show', ticket.id)"
                                        class="flex-shrink-0 bg-blue-600 text-white text-base font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200 ml-2"
                                        type="button"
                                    >
                                        Show
                                    </Link>

                                    <Link
                                        method="delete"
                                        :href="
                                            route('tickets.destroy', ticket.id)
                                        "
                                        as="button"
                                        class="ml-2 flex-shrink-0 bg-pink-500 text-white text-base font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 focus:ring-offset-pink-200"
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
        tickets: Array,
    },
    components: {
        AppLayout,
        Link,
    },
    methods: {
        validateStatus(status) {
            if (status === "active") {
                return "bg-gray-600";
            } else if (status === "in process") {
                return "bg-blue-600";
            } else if (status === "finished") {
                return "bg-green-600";
            }
        },
    },
};
</script>
