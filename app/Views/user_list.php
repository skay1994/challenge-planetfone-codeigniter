<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Usuarios</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="p-12">
<div id="app" class="container flex justify-center mx-auto">
    <div class="flex flex-col">
        <div class="w-full">
            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecione o Limite</label>
            <select id="countries" class="bg-gray-50 border border-gray-300 p-2.5 rounded-lg" @change="fetch" v-model="limit">
                <option value="5" selected>5</option>
                <option value="10">10</option>
            </select>
            <div class="border-b border-gray-200 shadow">
                <table>
                    <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-2 text-xs text-gray-500">
                            ID
                        </th>
                        <th class="px-6 py-2 text-xs text-gray-500">
                            Nome
                        </th>
                        <th class="px-6 py-2 text-xs text-gray-500">
                            Email
                        </th>
                        <th class="px-6 py-2 text-xs text-gray-500">
                            Username
                        </th>
                        <th class="px-6 py-2 text-xs text-gray-500">
                            Ações
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white">
                    <tr class="whitespace-nowrap" v-for="user in items" :key="user.id">
                        <td class="px-6 py-4 text-sm text-gray-500">
                            {{ user.id }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">
                                {{ user.name }}
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-500">{{ user.email }}</div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">
                            {{ user.username }}
                        </td>
                        <td class="px-6 py-4">
                            <button type="button" class="px-4 py-1 text-sm text-white bg-blue-400 rounded" @click="getUser(user.id)">Ver mais</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal hidden h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50">
        <div class="bg-white rounded shadow-lg w-10/12 md:w-1/3">
            <div class="border-b px-4 py-2 flex justify-between items-center">
                <h3 class="font-semibold text-lg">Detalhes do Usuário</h3>
                <button type="button" class="text-black" @click="toggleModal">&cross;</button>
            </div>
            <div class="p-3" v-if="user">
                <ul class="list-none space-y-1 max-w-md list-inside text-gray-500 dark:text-gray-400">
                    <li>ID: {{ user.id }}</li>
                    <li>Nome: {{ user.name }}</li>
                    <li>Email: {{ user.email }}</li>
                    <li>Username: {{ user.username }}</li>
                </ul>
            </div>
            <div class="flex justify-end items-center w-100 border-t p-3">
                <button class="bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-white mr-1 close-modal" @click="toggleModal">Fechar</button>
            </div>
        </div>
    </div>
</div>
<script src="https://unpkg.com/axios@1.1.2/dist/axios.min.js"></script>
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<script>
    const {createApp} = Vue

    createApp({
        data: () => ({
            url: window.location.origin,
            items: [],
            user: null,
            limit: 5
        }),
        methods: {
            fetch() {
                axios.get(`${this.url}/api/users`, {
                    params: { limit: this.limit }
                })
                    .then(res => this.items = res.data)
            },
            toggleModal() {
                const modal = document.querySelector('.modal');
                if(modal.classList.contains('hidden')) {
                    return modal.classList.remove('hidden')
                }

                modal.classList.add('hidden');
            },
            getUser(id) {
                this.user = null

                axios.get(`${this.url}/api/users/${id}`)
                    .then(res => {
                        this.user = res.data
                        this.toggleModal();
                    })
            }
        },
        mounted() {
            this.fetch()
        }
    }).mount('#app')
</script>
</body>
</html>