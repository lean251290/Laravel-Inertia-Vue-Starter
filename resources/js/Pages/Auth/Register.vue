<script setup>
import Container from '../../Components/Container.vue';
import Title from '../../Components/Title.vue';
import TextLink from '../../Components/TextLink.vue';
import InputField from '../../Components/InputField.vue';
import PrimaryBtn from '../../Components/PrimaryBtn.vue';
import ErrorMessages from '../../Components/ErrorMessages.vue';

import { useForm } from '@inertiajs/vue3';


const form = useForm({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
});



const submit = () => {
    form.post(route('register.store'), {
        onFinish: () => form.reset("password", "password_confirmation")
    })
}
</script>

<template>
    <Head title=" - Register"/>
    <Container class="w-1/2">
        <div class=" mb-8 text-center ">
            <Title>Register New Account</Title>
            <p>Do You Have an Account ?
                <TextLink routeName="login.show" label="Login" />
            </p>
        </div>

        <!-- ERRORS MESSAGES -->
         <ErrorMessages :errors="form.errors" />
        <form @submit.prevent="submit" class="grid gap-4">

            <InputField icon="user" label="Name" placeholder="Name" v-model="form.name" />

            <InputField type="email" icon="at" label="Email" placeholder="youremail@email.com" v-model="form.email" />

            <InputField type="password" icon="key" label="Password" placeholder="Password" v-model="form.password" />

            <InputField type="password" icon="key" label="Confirm Password" placeholder="Confirm Password"
                v-model="form.password_confirmation" />

            <p class="text-slate-500 text-sm dark:text-slate-400">
                By creating an account, you agree to our Terms of Service and
                Privacy Policy.
            </p>
            <PrimaryBtn :disabled="form.processing">Register</PrimaryBtn>
        </form>
    </Container>
</template>
