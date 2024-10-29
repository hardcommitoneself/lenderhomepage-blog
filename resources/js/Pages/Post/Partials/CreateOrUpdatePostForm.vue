<script setup>
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import TextArea from "@/Components/TextArea.vue";
import { useForm, router } from "@inertiajs/vue3";
import { watch } from "vue";
import { toast } from "@steveyuowo/vue-hot-toast";

const props = defineProps({
    action: {
        type: String,
        default: "create",
    },
    post: {
        type: Object,
    },
});

const form = useForm({
    title: props.post?.title ?? "",
    content: props.post?.content ?? "",
});

watch(
    () => form.recentlySuccessful,
    (isSuccessful) => {
        if (isSuccessful) {
            toast({
                message:
                    props.action === "create"
                        ? "Post has been created successfully"
                        : "Post has been updated successfully",
                type: "success",
            });

            if (props.action === "create") router.visit(route("dashboard"));
            if (props.action === "update")
                router.visit(
                    route("posts.show", {
                        post: props.post,
                    })
                );
        }
    }
);
</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">New Post</h2>

            <p class="mt-1 text-sm text-gray-600">
                Create new post with title, content.
            </p>
        </header>

        <form
            @submit.prevent="
                props.action === 'create'
                    ? form.post(route('posts.store'))
                    : form.patch(
                          route('posts.update', {
                              post: post,
                          })
                      )
            "
            class="mt-6 space-y-6"
        >
            <div>
                <InputLabel for="title" value="Title" />

                <TextInput
                    id="title"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.title"
                    required
                    autofocus
                    autocomplete="title"
                />

                <InputError class="mt-2" :message="form.errors.title" />
            </div>

            <div>
                <InputLabel for="title" value="Title" />

                <TextArea
                    id="content"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.content"
                    required
                    autofocus
                    autocomplete="content"
                />

                <InputError class="mt-2" :message="form.errors.content" />
            </div>

            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

                <Transition
                    enter-active-class="transition ease-in-out"
                    enter-from-class="opacity-0"
                    leave-active-class="transition ease-in-out"
                    leave-to-class="opacity-0"
                >
                    <p
                        v-if="form.recentlySuccessful"
                        class="text-sm text-gray-600"
                    >
                        Created.
                    </p>
                </Transition>
            </div>
        </form>
    </section>
</template>
