<script setup>
import Container from '../../Components/Container.vue';
import Title from '../../Components/Title.vue';
import InputField from '../../Components/InputField.vue';
import PrimaryBtn from '../../Components/PrimaryBtn.vue';
import ErrorMessages from '../../Components/ErrorMessages.vue';

import { useForm } from '@inertiajs/vue3';


const props = defineProps({
    token: String,
    email: String
});


const form = useForm({
    token: props.token,
    email: props.email,
    password: "",
    password_confirmation: "",
});



const submit = () => {
    form.post(route('password.update'), {
        onFinish: () => form.reset("password", "password_confirmation")
    })
}
</script>

<template>

    <Head title=" - Reset Password" />
    <Container class="w-1/2">
        <div class=" mb-8 text-center ">
            <Title>Enter a New Password</Title>
        </div>

        <!-- ERRORS MESSAGES -->
        <ErrorMessages :errors="form.errors" />
        <form @submit.prevent="submit" class="grid gap-4">


            <InputField type="email" icon="at" label="Email" placeholder="youremail@email.com" v-model="form.email" />

            <InputField type="password" icon="key" label="Password" placeholder="Password" v-model="form.password" />

            <InputField type="password" icon="key" label="Confirm Password" placeholder="Confirm Password"
                v-model="form.password_confirmation" />

            <PrimaryBtn :disabled="form.processing">Reset Password</PrimaryBtn>
        </form>
    </Container>
</template>
