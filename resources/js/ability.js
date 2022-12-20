import { defineAbility } from "@casl/ability";
import { useAuthStore } from "./store/auth";

const ability = () => {
    return defineAbility((can, cannot) => {
        const store = useAuthStore();
        if (store.authenticatedUser) {
            store.allPermissionsReturn.forEach((permission) => {
                can(...permission);
            });
        }
    });
};

export default ability;
