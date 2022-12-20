import { defineStore } from "pinia";
import router from "../router";

export const useAuthStore = defineStore("auth", {
    state: () => {
        return {
            authenticated: false,
            user: {},
            allPermissions: [],
        };
    },
    getters: {
        authenticatedUser(state) {
            return state.authenticated;
        },
        userReturn(state) {
            return state.user;
        },
        allPermissionsReturn(state) {
            return state.allPermissions;
        },
    },
    actions: {
        login(e) {
            return axios
                .get("/api/user", {
                    headers: {
                        "Content-Type": "application/json",
                        Authorization: "Bearer " + e.data.token,
                    },
                })
                .then(({ data }) => {
                    this.allPermissions = data.allPermissions;
                    //console.log(data);
                    this.user = data.user;
                    this.authenticated = true;
                    //window.location.href = "/";
                    router.push({ name: "dashboard" });
                })
                .catch(({ response: { data } }) => {
                    this.allPermissions = [];
                    this.user = {};
                    this.authenticated = false;
                });
        },
        logout() {
            this.allPermissions = [];
            this.user = {};
            this.authenticated = false;
            router.push({ name: "login" });
        },
    },
    persist: true,
});
