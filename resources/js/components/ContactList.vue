
<template>
    <div v-for="contact in contacts" class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{ contact.name }}</h5>

        </div>
        <FormComponent :path="'api/contact'" @update="update" :custom="contact"></FormComponent>
    </div>

</template>
<script setup>

import { ref, onMounted } from 'vue';
import FormComponent from "@/components/FormComponent.vue";
const contacts = ref(null);

const getData = async () => {
    const response = await fetch('api/contact');
    const json = await response.json();
    contacts.value = json.contacts
}
onMounted(async () => {
    await getData()
});

const update = async() => {
    await getData()
}
</script>

<style scoped>
.card {
    margin: 8px;
}
</style>
