import { defineStore } from "pinia";

export const useAuthStore = defineStore({
  id: "auth",
  state: () => ({
    user: JSON.parse(sessionStorage.getItem("user") ?? "null"),
    returnURL: null,
  }),
});
