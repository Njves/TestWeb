
<template>
    <div v-for="user in users" class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{ user.name }}</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
        <FormComponent :path="'api/user'" @update="update" :custom="user"></FormComponent>
    </div>

</template>
<script setup>

import { ref, onMounted } from 'vue';
import FormComponent from "@/components/FormComponent.vue";
const users = ref(null);

const getData = async () => {
    const response = await fetch('api/user');
    const json = await response.json();
    users.value = json.users
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
