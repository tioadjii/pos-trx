<script setup>
import { Head } from "@inertiajs/vue3";
</script>

<template>
    <Head title="Pesan Menu" />
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="text-center">
            <h1 class="text-3xl font-bold text-blue-600">
                Halaman User (Scan QR / Pesan Menu)
            </h1>
            <p class="mt-4">Halo, {{ $page.props.auth.user.name }}!</p>
            <p class="mt-2">Role Anda: {{ $page.props.auth.user.role }}</p>
        </div>
    </div>
</template>
