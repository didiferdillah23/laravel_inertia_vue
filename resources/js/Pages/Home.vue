<script setup>
defineProps({
   users: Object
})

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
        <table>
            <thead>
                <tr class="bg-slate-200">
                    <th>Avatar</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Registration Date</th>
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
