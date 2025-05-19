<script setup>
import UpdateInfo from './Partials/UpdateInfo.vue'
defineProps({
    user:Object,
    status:String
})
</script>
<template>
    <div>
        <Head title=" - Profile"></Head>
        <UpdateInfo :user="user" :status="status"/>
    </div>
</template>
