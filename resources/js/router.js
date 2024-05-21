import { createRouter, createWebHistory } from "vue-router";
import MainComponent from "@/components/MainComponent.vue";
import CompanyList from "@/components/CompanyList.vue";
import NotFound from "@/components/NotFound.vue";
import UnitList from "@/components/UnitList.vue";
import ContactList from "@/components/ContactList.vue";
import UserList from "@/components/UserList.vue";
import NoteList from "@/components/NoteList.vue";
import CreateContactComponent from "@/components/CreateContactComponent.vue";


export default createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            component: MainComponent,
            children: [
                {
                    name: 'company',
                    path: '/companies',
                    component: CompanyList,
                },
                {
                    name: 'unit',
                    path: '/units',
                    component: UnitList,
                },
                {
                    name: 'contacts',
                    path: '/contacts',
                    component: ContactList,
                },
                {
                    name: 'users',
                    path: '/users',
                    component: UserList,
                },
                {
                    name: 'note',
                    path: '/notes',
                    component: NoteList,
                },
                {
                    name: 'create',
                    path: '/',
                    component: CreateContactComponent
                }
            ]
        },
        {
            path: '/:pathMatch(.*)',
            component: NotFound
        }
    ]
});

