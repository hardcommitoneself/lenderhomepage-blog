<script setup>
import Avatar from "@/Components/Avatar.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import DangerButton from "@/Components/DangerButton.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { router, useForm } from "@inertiajs/vue3";
import { usePage } from "@inertiajs/vue3";
import { computed } from "vue";

const props = defineProps({
    post: {
        type: Object,
    },
});

const user = usePage().props.auth.user;

const canEdit = computed(() => {
    return props.post.user.id === user.id;
});

const form = useForm({});

const gotoBack = () => {
    router.visit(route("dashboard"));
};

const gotoEdit = () => {
    router.visit(route("posts.edit", { post: props.post }));
};
</script>

<template>
    <AuthenticatedLayout>
        <div class="mx-auto max-w-4xl my-4">
            <div class="flex flex-col mt-20">
                <h3 class="text-4xl font-bold">{{ post.title }}</h3>
                <div class="mt-5 flex items-center justify-between">
                    <div class="flex items-center">
                        <Avatar :username="post.user.name" />

                        <span class="text-sm text-gray-500 ml-4">{{
                            post.user.name
                        }}</span>

                        <span class="text-sm text-gray-500 ml-10">{{
                            new Date(post.created_at).toLocaleDateString(
                                "en-US",
                                {
                                    year: "numeric",
                                    month: "long",
                                    day: "numeric",
                                }
                            )
                        }}</span>
                    </div>

                    <div class="flex items-center gap-2">
                        <template v-if="canEdit">
                            <SecondaryButton @click="gotoEdit">
                                Edit</SecondaryButton
                            >
                            <form
                                @submit.prevent="
                                    form.delete(
                                        route('posts.destroy', {
                                            post: post,
                                        })
                                    )
                                "
                            >
                                <DangerButton :disabled="form.processing"
                                    >Delete</DangerButton
                                >
                            </form>
                        </template>
                        <SecondaryButton v-else>Follow</SecondaryButton>
                        <PrimaryButton @click="gotoBack">Back</PrimaryButton>
                    </div>
                </div>

                <!-- image -->
                <div class="mt-10">
                    <img :src="post.image" class="w-full rounded-md" />
                </div>

                <!-- content -->
                <p class="mt-10">
                    {{ post.content }}
                </p>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
