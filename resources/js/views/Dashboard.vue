<script setup>
import { useAuthStore } from "../store/auth";
import { useAbility } from "@casl/vue";

const { can } = useAbility();
let store = useAuthStore();
async function logout() {
    await axios
        .post("http://localhost:8000/api/logout")
        .then((e) => store.logout())
        .catch((e) => console.log(e));
}
</script>
<template>
    <div style="display: flex; flex-direction: column">
        <div>
            Dashboard, email : {{ store.userReturn.email }}, name :
            {{ store.userReturn.name }}, allPermission :
            {{ store.allPermissionsReturn }}
            <button @click="logout">Logout</button>
        </div>
        <br />
        <div>
            <ul>
                <li v-if="can('show', 'post')">Show Post</li>
                <li v-if="can('edit', 'post')">Edit Post</li>
            </ul>
        </div>
    </div>
</template>
