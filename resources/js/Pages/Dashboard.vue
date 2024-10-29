<script setup>
import { Head } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import BlogCard from "@/Components/BlogCard.vue";
import { computed, onMounted } from "vue";
import { usePage } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps({
    posts: {
        type: Array,
        default: [],
    },
});

const { auth } = usePage().props;

const myPosts = computed(() => {
    return props.posts.filter((post) => post.user.id === auth.user.id);
});

const allPosts = computed(() => {
    return props.posts.filter((post) => post.user.id !== auth.user.id);
});
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <div class="mx-auto max-w-6xl my-4">
            <!-- My posts -->
            <div class="flex flex-col">
                <div class="flex items-center justify-between">
                    <h3 class="font-medium text-lg text-gray-700 my-2">
                        My Posts
                    </h3>

                    <PrimaryButton>
                        <a :href="route('posts.create')">Post</a>
                    </PrimaryButton>
                </div>

                <div v-if="myPosts.length">
                    <div class="grid grid-cols-3 gap-5">
                        <template v-for="post in myPosts" :key="post.id">
                            <BlogCard :post="post" />
                        </template>
                    </div>
                </div>

                <div v-else>
                    <p class="text-center">No posts available.</p>
                </div>
            </div>

            <!-- All the other posts -->
            <div class="flex flex-col">
                <h3 class="font-medium text-lg text-gray-700 my-2">
                    All Posts
                </h3>

                <div v-if="allPosts.length">
                    <div class="grid grid-cols-3 gap-5">
                        <template v-for="post in allPosts" :key="post.id">
                            <BlogCard :post="post" />
                        </template>
                    </div>
                </div>

                <div v-else>
                    <p class="text-center">No posts available.</p>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
