<template>
    <div class="container form">
        <div class="mb-3">
            <label for="email" class="form-label">Эл.Почта</label>
            <input type="text" class="form-control" v-model="contact.email" id="email">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Номер телефона</label>
            <input type="tel" class="form-control" v-model="contact.phone" id="phone">
        </div>
        <button @click="notes.push({'text': ''})" class="btn btn-primary">Добавить примечание</button>
        <div class="mb-3" v-for="note in notes">
            <label class="form-label">Примечание</label>
            <input type="text" class="form-control" v-model="note.text">
        </div>
        <div class="mb-3">
            <label class="form-label">Пользователь</label>
            <select class="form-control" v-model="userOption">
                <option :value="user.id" v-for="user in users">{{ user.name }}</option>

            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Подразделение пользователя</label>
            <select class="form-control" v-model="unitOption">
                <option :value="unit.id" v-for="unit in units">{{ unit.name }}</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Компания пользователя</label>
            <select class="form-control" v-model="companyOption">
                <option :value="company.id" v-for="company in companies">{{ company.name }}</option>
            </select>
        </div>
        <button class="btn btn-primary" @click="save">Сохранить</button>

    </div>
    <pre>
        {{JSON.stringify(contact)}}
        {{JSON.stringify(notes)}}
    </pre>
</template>
<script setup>
import {onMounted, ref} from "vue";
const contact = ref({})
const notes = ref([]);
const userOption = ref(null)
const unitOption = ref(null)
const companyOption = ref(null)
const users = ref(null);
const units = ref(null);
const companies = ref(null);
const getUsers = async () => {
    const response = await fetch('api/user');
    const json = await response.json();
    users.value = json.users
}

const getUnits = async () => {
    const response = await fetch('api/unit');
    const json = await response.json();
    units.value = json.units
}

const getCompanies = async () => {
    const response = await fetch('api/company');
    const json = await response.json();
    companies.value = json.companies
}

const save = async() => {
    contact.user_id = userOption
    let res;
    res = await fetch('api/user', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({'id': userOption.value, 'unit_id': unitOption.value}),
    })
    contact.value.responsible_id = 1
    contact.value.user_id = userOption
    res = await fetch('api/contact', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(contact.value),
    })

    const newContact = await res.json()
    const contactId = newContact.contact.id
    for(const note of notes.value) {
        res = await fetch('api/note', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({'text': note.text, 'contact_id': contactId}),
        })
    }


}
onMounted(() => {
    getUsers()
    getUnits()
    getCompanies()
})

</script>

<style scoped>

</style>
