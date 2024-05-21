
<template>
    <div v-for="note in notes" class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{ note.text }}</h5>
        </div>
        <FormComponent :path="'api/note'" @update="update" :custom="note"></FormComponent>
    </div>

</template>
<script setup>

import { ref, onMounted } from 'vue';
import FormComponent from "@/components/FormComponent.vue";
const notes = ref(null);

const getData = async () => {
    const response = await fetch('api/note');
    const json = await response.json();
    notes.value = json.notes
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
