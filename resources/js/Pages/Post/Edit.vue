<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import CreateOrUpdatePostForm from "./Partials/CreateOrUpdatePostForm.vue";

const props = defineProps({
    post: {
        type: Object,
    },
});
</script>

<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Update the post
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <section class="max-w-xl">
                        <CreateOrUpdatePostForm action="update" :post="post" />
                    </section>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
