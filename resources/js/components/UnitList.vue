
<template>
    <div v-for="unit in units" class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{ unit.name }}</h5>

        </div>
        <FormComponent :path="'api/unit'" @update="update" :custom="unit"></FormComponent>
    </div>

</template>
<script setup>

import { ref, onMounted } from 'vue';
import FormComponent from "@/components/FormComponent.vue";

const units = ref(null);

const getData = async () => {
    const response = await fetch('api/unit');
    const json = await response.json();
    units.value = json.units
}
onMounted(async () => {
    await getData()
});

const update = async () => {
    await getData()
}
</script>

<style scoped>
.card {
    margin: 8px;
}
</style>
