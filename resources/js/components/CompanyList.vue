
<template>
    <div v-for="company in companies" class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{ company.name }}</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
        <FormComponent :path="'api/company'" @update="update" :custom="company"></FormComponent>
    </div>

</template>
<script setup>

import { ref, onMounted } from 'vue';
import FormComponent from "@/components/FormComponent.vue";
const companies = ref(null);

const getData = async () => {
    const response = await fetch('api/company');
    const json = await response.json();
    companies.value = json.companies
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
