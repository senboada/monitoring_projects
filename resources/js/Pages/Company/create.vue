<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/inertia-vue3";
</script>
<template>
    <AppLayout title="Create">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Company
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
                                    >Name</label
                                >
                                <input
                                    id="name"
                                    v-model="form.name"
                                    class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                    type="text"
                                    placeholder="Name"
                                />
                            </div>

                            <div class="grid grid-cols-1">
                                <label
                                    class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold"
                                    >Nit</label
                                >
                                <input
                                    id="nit"
                                    v-model="form.nit"
                                    class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                    type="text"
                                    placeholder="Nit"
                                />
                            </div>

                            <div class="grid grid-cols-1">
                                <label
                                    class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold"
                                    >Phone</label
                                >
                                <input
                                    id="phone"
                                    v-model="form.phone"
                                    class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                    type="text"
                                    placeholder="Phone"
                                />
                            </div>

                            <div class="grid grid-cols-1">
                                <label
                                    class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold"
                                    >Address</label
                                >
                                <input
                                    id="address"
                                    v-model="form.address"
                                    class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                    type="text"
                                    placeholder="Address"
                                />
                            </div>

                            <div class="grid grid-cols-1">
                                <label
                                    class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold"
                                    >Email</label
                                >
                                <input
                                    id="email"
                                    v-model="form.email"
                                    class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                    type="text"
                                    placeholder="email"
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
                                :href="route('companies.index')"
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
    },
    data() {
        return {
            form: {
                name: null,
                nit: null,
                phone: null,
                address: null,
                email: null,
            },
        };
    },
    methods: {
        submit() {
            this.$inertia.post(route("companies.store"), this.form);
        },
    },
};
</script>
