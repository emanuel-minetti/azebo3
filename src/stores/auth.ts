import { defineStore } from "pinia";
import router from "@/router";

// noinspection JSUnusedLocalSymbols
export const useAuthStore = defineStore({
  id: "auth",
  state: () => ({
    user: JSON.parse(sessionStorage.getItem("user") ?? "null"),
    redirectURL: null,
  }),
  actions: {
    // eslint-disable-next-line @typescript-eslint/no-unused-vars
    login(username: string, password: string) {
      const user = {
        id: 1,
        name: "Hallo Du",
        validTo: new Date(new Date().getTime() + 30 * 60000),
      };
      this.user = user;
      sessionStorage.setItem("user", JSON.stringify(user));
      // noinspection JSIgnoredPromiseFromCall
      router.push(this.redirectURL || "/");
    },
  },
});
