<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="Welcome" />

    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0"
    >
        <div
            v-if="canLogin"
            class="hidden fixed top-0 right-0 px-6 py-4 sm:block"
        >
            <Link
                v-if="$page.props.user"
                :href="route('dashboard')"
                class="text-sm text-gray-700 underline"
            >
                Dashboard
            </Link>

            <template v-else>
                <Link
                    :href="route('login')"
                    class="text-sm text-gray-700 underline"
                >
                    Log in
                </Link>

                <Link
                    v-if="canRegister"
                    :href="route('register')"
                    class="ml-4 text-sm text-gray-700 underline"
                >
                    Register
                </Link>
            </template>
        </div>
        <div>
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div class="mt-8 text-2xl">Prueba Fusepong</div>

            <div class="mt-6 text-gray-500">
                <p>
                    Se debe crear una aplicación web donde se pueda llevar el
                    control del avance de diferentes proyectos de desarrollo,
                    dicho proyecto debe estar dividido en historias de usuario
                    las cuales hacen referencia a las funcionalidades globales
                    de cada proyecto (Ej. En un proyecto e-commerce, una
                    historia de usuario es "Poder tener un carrito de compras
                    por usuario"), y a su vez en cada historia de usuario se
                    podrá levantar un ticket de desarrollo el cual hace
                    referencia a una tarea específica de la historia de usuario
                    a la que corresponde (Ej. un ticket sería "Crear la interfaz
                    del detalle del carrito de compras", esta estaría
                    relacionada a la historia de usuario "Poder tener un carrito
                    de compras por usuario"). El objetivo principal es poder
                    levantar tickets o solicitudes de desarrollo para cada
                    proyecto y poder verificar el estado del mismo.
                </p>
                <p>El usuario podrá desde una página web hacer lo siguiente:</p>
                <p class="ml-5">
                    <ul class="list-disc">
                        <li>Crear una cuenta, y asociarse a una compañía previamente
                    creada (se deben crear varias compañías y estar disponibles
                    a modo listado) - Loguearse en la plataforma</li>
                    <li>Crear una
                    historia de usuario con su primer ticket (cada historia de
                    usuario debe tener al menos un ticket)</li>
                    <li>Levantar un ticket
                    o solicitud de desarrollo completamente nuevo (debe estar
                    relacionado a una historia de usuario)</li>
                    <li>Editar un ticket o
                    solicitud de desarrollo que esté vinculado a una historia de
                    usuario</li>
                    <li>Poder ver un historial de tickets y su estado
                    Cancelar un ticket activo</li>
                    </ul>
                </p>
                <p>El ticket debe estar asociado a una historia de usuario, debe tener un campo de comentarios y un estado (Activo: está creado por el usuario; En Proceso: que está en proceso de desarrollo; Finalizado: que ya salio del proceso de desarrollo)</p>
                <p>En cada proyecto debe haber al menos 2 tickets en estado de desarrollo y 2 tickets en estado Finalizado, esto con el fin de poder verlos y diferenciarlos en el historial.</p>
                <p>Las compañías o empresas podrán tener varios proyectos relacionados (crear al menos 3 compañías con nombre, nit, teléfono, dirección y correo electrónico; de estas 3, una debe tener 1 proyecto y otra debe tener 2 proyectos). Esta información debe estar previamente creada y disponible en la página web.</p>
                <p>Los proyectos pueden tener varias historias de usuario ( cada proyecto debe tener al menos 3 historias de usuario). Esta información debe estar previamente creada y disponible en la página web</p>
                <p>Toda la información debe estar alojada en una Base de datos creada exclusivamente para la prueba </p>
            </div>
        </div>
    </div>
    </div>
</template>

<style scoped>
.bg-gray-100 {
    background-color: #f7fafc;
    background-color: rgba(247, 250, 252, var(--tw-bg-opacity));
}

.border-gray-200 {
    border-color: #edf2f7;
    border-color: rgba(237, 242, 247, var(--tw-border-opacity));
}

.text-gray-400 {
    color: #cbd5e0;
    color: rgba(203, 213, 224, var(--tw-text-opacity));
}

.text-gray-500 {
    color: #a0aec0;
    color: rgba(160, 174, 192, var(--tw-text-opacity));
}

.text-gray-600 {
    color: #718096;
    color: rgba(113, 128, 150, var(--tw-text-opacity));
}

.text-gray-700 {
    color: #4a5568;
    color: rgba(74, 85, 104, var(--tw-text-opacity));
}

.text-gray-900 {
    color: #1a202c;
    color: rgba(26, 32, 44, var(--tw-text-opacity));
}

@media (prefers-color-scheme: dark) {
    .dark\:bg-gray-800 {
        background-color: #2d3748;
        background-color: rgba(45, 55, 72, var(--tw-bg-opacity));
    }

    .dark\:bg-gray-900 {
        background-color: #1a202c;
        background-color: rgba(26, 32, 44, var(--tw-bg-opacity));
    }

    .dark\:border-gray-700 {
        border-color: #4a5568;
        border-color: rgba(74, 85, 104, var(--tw-border-opacity));
    }

    .dark\:text-white {
        color: #fff;
        color: rgba(255, 255, 255, var(--tw-text-opacity));
    }

    .dark\:text-gray-400 {
        color: #cbd5e0;
        color: rgba(203, 213, 224, var(--tw-text-opacity));
    }
}
</style>
