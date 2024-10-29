<script setup>
import Avatar from "./Avatar.vue";
import { router } from "@inertiajs/vue3";

const props = defineProps({
    post: {
        type: Object,
    },
});

const handleClick = () => {
    router.visit(route("posts.show", { post: props.post }));
};
</script>

<template>
    <div
        class="flex flex-col gap-4 border rounded-xl bg-white p-4 cursor-pointer transition hover:border-orange-500"
        @click="handleClick"
    >
        <!-- image -->
        <img :src="post.image" class="md:w-[360px] h-[240px] rounded-md" />

        <!-- content -->
        <div class="flex flex-col gap-4 p-2">
            <!-- title -->
            <h5 class="truncate-2-lines h-12">{{ post.title }}</h5>

            <!-- avatar, user name, post date, -->
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <Avatar :username="post.user.name" />

                    <span class="text-sm text-gray-500">{{
                        post.user.name
                    }}</span>
                </div>

                <span class="text-sm text-gray-500">{{
                    new Date(post.created_at).toLocaleDateString("en-US", {
                        year: "numeric",
                        month: "long",
                        day: "numeric",
                    })
                }}</span>
            </div>
        </div>
    </div>
</template>

<style lang="css">
.truncate-2-lines {
    display: -webkit-box;
    line-clamp: 2;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
}
</style>
