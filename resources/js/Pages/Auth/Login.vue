<script setup>
import Container from '../../Components/Container.vue';
import Title from '../../Components/Title.vue';
import TextLink from '../../Components/TextLink.vue';
import InputField from '../../Components/InputField.vue';
import PrimaryBtn from '../../Components/PrimaryBtn.vue';
import ErrorMessages from '../../Components/ErrorMessages.vue';
import CheckBox from '../../Components/CheckBox.vue';
import SessionMessages from '../../Components/SessionMessages.vue';

import { useForm } from '@inertiajs/vue3';


defineProps({
    status: String
});

const form = useForm({
    email: "",
    password: "",
    remember: null,
});



const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset("password")
    })
}
</script>

<template>

    <Head title=" - Login" />
    <Container class="w-1/2">
        <div class=" mb-8 text-center ">
            <Title>Login to your account</Title>
            <p>Do You Need an Account ?
                <TextLink routeName="register" label="Register" />
            </p>
        </div>

        <!-- ERRORS MESSAGES -->
        <ErrorMessages :errors="form.errors" />
        <SessionMessages :status="status" />
        <form @submit.prevent="submit" class="grid gap-4">


            <InputField type="email" icon="at" label="Email" placeholder="youremail@email.com" v-model="form.email" />

            <InputField type="password" icon="key" label="Password" placeholder="Password" v-model="form.password" />


            <div class="flex items-center justify-between ">
                <CheckBox name="remember_me" v-model="form.remember">Remember Me.</CheckBox>
                <TextLink routeName="password.request" label="Forgot Password?" />
            </div>

            <PrimaryBtn :disabled="form.processing">Login</PrimaryBtn>
        </form>
    </Container>
</template>
