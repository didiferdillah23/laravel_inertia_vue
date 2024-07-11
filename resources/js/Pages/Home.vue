<script setup>
import { ref, watch } from 'vue';
import { router } from "@inertiajs/vue3";
import { debounce } from 'lodash';

const props = defineProps({
   users: Object,
   searchTerm: String,
   can: Object
})

const search = ref(props.searchTerm);

watch(
    search,
    debounce((q) => router.get('/', { search: q }, { preserveState:true }), 500)
);

// Format Date
const getDate = (date) => new Date(date).toLocaleDateString("id-id", {
        year: "numeric",
        month: "long",
        day: "numeric"
    });

</script>

<template>

    <Head title="Home - " />

    <div>

        <div class="flex justify-end mb-4">
            <div class="w-1/4">
                <input type="search" placeholder="search" v-model="search">
            </div>
        </div>

        <table>
            <thead>
                <tr class="bg-slate-200">
                    <th>Avatar</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Registration Date</th>
                    <th v-if="can.delete_user">Delete</th>
                </tr>
            </thead>

            <tbody>
                <tr v-for="user in users.data" key="user.id">
                    <td>
                        <img :src="user.avatar ? 'storage/'+user.avatar : 'storage/avatars/default.png' " class="avatar">
                    </td>
                    <td>{{ user.name }}</td>
                    <td>{{ user.email }}</td>
                    <td>{{ getDate(user.created_at) }}</td>
                    <td v-if="can.delete_user">
                        <button class="bg-red-500 w-6 h-6 rounded-full"></button>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- pagination link -->
        <div class="flex justify-between">
            <div>
                <Link v-for="link in users.links" :key="link.label" 
                    v-html="link.label" 
                    :href="link.url"
                    class="py-1 px-2 bg-slate-100 rounded mx-1"
                    :class="{'text-slate-300' : !link.url, 'text-blue-500 bg-blue-100' : link.active}"
                ></Link>
            </div>

            <p class="text-skate-600 text-sm">Showing {{ users.from }} to {{ users.to }} of {{ users.total }} results</p>
        </div>

    </div>

</template>
