<script setup>
import Container from '../../Components/Container.vue';
import InputField from '../../Components/InputField.vue';
import PrimaryBtn from '../../Components/PrimaryBtn.vue';
import ErrorMessages from '../../Components/ErrorMessages.vue';
import SessionMessages from '../../Components/SessionMessages.vue';

import { useForm } from '@inertiajs/vue3';


const form = useForm({
    email: "",
});

const submit = () => {
    form.post(route('password.email'));
}


defineProps({
    status: String,
});

</script>

<template>

    <Head title=" - Forgot Password" />
    <Container class="w-1/2">
        <div class=" mb-8 text-center ">
            <p>
                Forgot your password? No problem. Just let us know your email
                address and we will email you a password reset link that will
                allow you to choose a new one.
            </p>
        </div>

        <!-- ERRORS MESSAGES -->
        <ErrorMessages :errors="form.errors" />

        <!-- SESSION MESSAGES -->
        <SessionMessages :status="status" />
        <form @submit.prevent="submit" class="grid gap-4">

            <InputField type="email" icon="at" label="Email" placeholder="youremail@email.com" v-model="form.email" />


            <PrimaryBtn :disabled="form.processing">Send Password Reset Link
            </PrimaryBtn>
        </form>
    </Container>
</template>
