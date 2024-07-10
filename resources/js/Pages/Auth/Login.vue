<script setup>
import { useForm } from '@inertiajs/vue3';
import TextInput from "../Components/TextInput.vue";

const form = useForm({
    email: null,
    password: null,
    remember: null
})

const submit = () => {
    form.post('/login', {
        onError: () => form.reset('password', 'remember')
    })
}

</script>

<template>

    <Head title="Login - " />
    <h1 class="title">Login a new account</h1>

    <div class="w-2/4 max-auto"></div>

    <form @submit.prevent="submit">

        <TextInput name="email" type="email" v-model="form.email" :message="form.errors.email" />
        <TextInput name="password" type="password" v-model="form.password" :message="form.errors.password" />

        <div class="flex item-center justify-between">
            <div class="flex item-center gap-2">
                <label for="">Remember me</label>
                <input type="checkbox" v-model="form.remember">
            </div>

            <p class="text-slate-600">Need an account? <Link href="/register" class="text-link">Register</Link></p>
        </div>

        <div class="mt-5">
            <button class="btn btn-primary w-full" :disabled="form.processing">Login</button>
        </div>

    </form>
</template>
