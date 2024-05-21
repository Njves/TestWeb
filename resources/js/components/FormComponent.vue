<template>
    <div class="container form">
        <form @submit.prevent="sendObject" method="POST">
        <div class="mb-3" v-for="(_, key) in custom" :key="key">
            <label for="input" class="form-label">{{ key }}</label>
            <input type="text" :name="key" class="form-control" v-model="custom[key]" id="input">
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </div>
</template>
<script setup>
const props = defineProps({
    custom: {
        type: Object,
        required: true,
        default: () => { },
    },
    path: {
        type: String,
        required: true
    }
})

const emit = defineEmits(['update'])

const sendObject = async (target) => {
    let data = {}
    for(let element of target.target.elements) {
        if(element.name && element.value)
        data[element.name] = element.value
    }
    const response = await fetch(props.path, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
    });

    if (!response.ok) {
        const message = `An error has occured: ${response.status}`;
        throw new Error(message);
    }
    emit('update')

}

</script>

<style scoped>
    .form {
        margin: 8px;
    }
</style>
