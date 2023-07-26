<template>
    <div class="row">
        <div class="col">ФИО <input v-model="name" /></div>
        <div class="col">Комания <input v-model="company" /></div>
        <div class="col">Телефон <input v-model="phone" /></div>
    </div>
    <div class="row" style="margin-top: 10px">
        <div class="col">Email <input v-model="email" /></div>
        <div class="col">
            Дата рождения <input type="date" v-model="birth_date" />
        </div>
        <div class="col">Фото <input v-model="foto" /></div>
    </div>
    <button
        style="margin-top: 10px"
        type="button"
        class="btn btn-primary"
        @click.prevent="addClient"
    >
        Отправить
    </button>
    <hr />
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ФИО</th>
                <th scope="col">Комания</th>
                <th scope="col">Телефон</th>
                <th scope="col">Email</th>
                <th scope="col">Дата рождения</th>
                <th scope="col">Фото</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <template v-for="notebook in notebooks">
                <tr>
                    <th scope="row">{{ notebook.id }}</th>
                    <td>{{ notebook.name }}</td>
                    <td>{{ notebook.company }}</td>
                    <td>{{ notebook.phone }}</td>
                    <td>{{ notebook.email }}</td>
                    <td>{{ notebook.birth_date }}</td>
                    <td>{{ notebook.foto }}</td>
                    <td>
                        <button
                            style="margin-right: 10px"
                            type="button"
                            class="btn btn-primary"
                            @click.prevent="editClient(notebook.id)"
                        >
                            Edit
                        </button>
                        <button
                            type="button"
                            class="btn btn-danger"
                            @click.prevent="deleteClient(notebook.id)"
                        >
                            Delete
                        </button>
                    </td>
                </tr>
                <tr v-if="editClientId === notebook.id">
                    <th scope="row">{{ notebook.id }}</th>
                    <td><input v-model="name" /></td>
                    <td><input v-model="company" /></td>
                    <td><input v-model="phone" /></td>
                    <td><input v-model="email" /></td>
                    <td><input type="date" v-model="birth_date" /></td>
                    <td><input v-model="foto" /></td>
                    <td>
                        <button
                            type="button"
                            class="btn btn-primary"
                            @click.prevent="updateClient(notebook.id)"
                        >
                            Update
                        </button>
                    </td>
                </tr>
            </template>
        </tbody>
    </table>
</template>

<script>
export default {
    data() {
        return {
            notebooks: [],
            name: "",
            company: "",
            phone: null,
            email: "",
            birth_date: "",
            foto: "",
            editClientId: null,
        };
    },

    methods: {
        getClient() {
            axios.get("api/v1/notebook").then((response) => {
                this.notebooks = response.data;
            });
        },

        editClient(id) {
            this.editClientId = id;
        },

        deleteClient(id) {
            axios.delete(`api/v1/notebook/${id}`).then((response) => {
                this.getClient();
            });
        },

        addClient() {
            axios
                .post("api/v1/notebook", {
                    name: this.name,
                    company: this.company,
                    phone: this.phone,
                    email: this.email,
                    birth_date: this.birth_date,
                    foto: this.foto,
                })
                .then((res) => {
                    this.getClient();
                    this.name = "";
                    this.company = "";
                    this.phone = null;
                    this.email = "";
                    this.birth_date = "";
                    this.foto = "";
                });
        },

        updateClient(id) {
            axios
                .patch(`api/v1/notebook/${id}`, {
                    name: this.name,
                    company: this.company,
                    phone: this.phone,
                    email: this.email,
                    birth_date: this.birth_date,
                    foto: this.foto,
                })
                .then((res) => {
                    this.getClient();
                    this.editClientId = null;
                    this.name = "";
                    this.company = "";
                    this.phone = null;
                    this.email = "";
                    this.birth_date = "";
                    this.foto = "";
                });
        },
    },

    mounted() {
        this.getClient();
    },
};
</script>
