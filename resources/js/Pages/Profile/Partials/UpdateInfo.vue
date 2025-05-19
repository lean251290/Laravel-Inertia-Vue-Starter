<script setup>
import Container from "../../../Components/Container.vue";
import Title from "../../../Components/Title.vue";
import InputField from "../../../Components/InputField.vue";
import PrimaryBtn from "../../../Components/PrimaryBtn.vue";
import SessionMessages from "../../../Components/SessionMessages.vue";
import ErrorMessages from "../../../Components/ErrorMessages.vue";
import { router, useForm } from "@inertiajs/vue3";


const props = defineProps({
    user: Object,
    status:String
});

const form = useForm({
    name: props.user.name,
    email: props.user.email,
});
const resendEmail = (e) => {
    router.post(
        route('verification.send'),
        {}, //PAYLOAD(DATA)
        {
            onStart: () => (e.target.disabled = true),
            onFinish: () => (e.target.disabled = false),
        }
    );
};
</script>

<template>
    <Container class="mb-6">
        <div class="mb-6">
            <Title>Update Information</Title>
            <p>Update your account's profile information and email address.</p>
        </div>


        <ErrorMessages :errors="form.errors"/>
        <form @submit.prevent="form.patch(route('profile.update'))" class="space-y-6">
            <InputField placeholder="Name" label="Name" class="w-1/2" icon="id-badge" v-model="form.name" />

            <InputField placeholder="Email" label="Email" class="w-1/2" icon="at" v-model="form.email" />
            <div v-if="user.email_verified_at === null">
                <SessionMessages :status="status"/>
                <p>
                    Yor email is unverified.
                    <button @click="resendEmail"
                        class="text-indigo-500 font-medium underline dark:text-indigo-400 disabled:text-slate-400 disabled:cursor-wait">
                        Click here to re-send the verification email.
                    </button>
                </p>
            </div>
            <PrimaryBtn :disabled="form.processing">Save</PrimaryBtn>
        </form>
    </Container>
</template>
