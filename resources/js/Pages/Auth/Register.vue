<script setup>
import { useForm } from '@inertiajs/vue3';
import TextInput from "../Components/TextInput.vue";

const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null,
    avatar: null,
    preview: null
})

const change = (e) => {
    form.avatar = e.target.files[0]
    form.preview = URL.createObjectURL(e.target.files[0])
}

const submit = () => {
    form.post('/register', {
        onError: () => form.reset('password', 'password_confirmation')
    })
}

</script>

<template>

    <Head title="Register - " />
    <h1 class="title">Register a new account</h1>

    <div class="w-2/4 max-auto"></div>

    <form @submit.prevent="submit">

        <div class="grid place-items-center">
            <div class="relative w-28 h-28 rounded-full overflow-hidden border border-slate-300">
                <label for="avatar" class="absolute inset-0 grid content-end cursor-pointer">
                    <span class="bg-white/70 pb-2 text-center">Avatar</span>
                </label>
                <input type="file" @input="change" id="avatar" hidden>

                <img :src="form.preview ?? 'storage/avatars/default.png'" class="oject-cover w-28 h-28">
            </div>
            <p class="error mt-2">{{ form.errors.avatar }}</p>
        </div>

        <TextInput name="email" type="email" v-model="form.email" :message="form.errors.email" />
        <TextInput name="name" v-model="form.name" :message="form.errors.name" />
        <TextInput name="password" type="password" v-model="form.password" :message="form.errors.password" />
        <TextInput name="password confirmation" type="password" v-model="form.password_confirmation" :message="form.errors.password_confirmation" />

        <div class="mt-5">
            <p class="text-slate-600 mb-2">Already a user? <Link href="/login" class="text-link">Login</Link></p>
            <button class="btn btn-primary w-full" :disabled="form.processing">Register</button>
        </div>

    </form>
</template>
