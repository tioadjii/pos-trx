<script setup>
import { Head } from "@inertiajs/vue3";
</script>

<template>
    <Head title="Super Admin Dashboard" />
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="text-center">
            <h1 class="text-3xl font-bold text-red-600">
                Halaman Super Admin (IT)
            </h1>
            <p class="mt-4">Halo, {{ $page.props.auth.user.name }}!</p>
            <p class="mt-2">Role Anda: {{ $page.props.auth.user.role }}</p>
        </div>
    </div>
</template>
