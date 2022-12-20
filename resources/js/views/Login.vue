<script setup>
import { useAuthStore } from "../store/auth";
let store = useAuthStore();
async function logIn(name) {
    await axios.get("/sanctum/csrf-cookie");
    await axios
        .post("http://localhost:8000/api/login", {
            email: `${name}@example.com`,
            password: "12345678",
        })
        .then((e) => {
            //console.log(e.data);
            store.login(e);
        })
        .catch((e) => console.log(e));
}
</script>
<template>
    <div style="display: flex; flex-direction: column; width: 200px">
        <button @click="logIn('owner')" style="margin-bottom: 10px">
            Log in as Owner
        </button>
        <button @click="logIn('admin')">Log in as Admin</button>
    </div>
</template>
