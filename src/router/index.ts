import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";
import { useAuthStore } from "@/stores";
import LoginView from "@/views/LoginView.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      name: "home",
      component: HomeView,
    },
    {
      path: "/login",
      name: "login",
      component: LoginView,
    },
    {
      path: "/about",
      name: "about",
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import("../views/AboutView.vue"),
    },
  ],
});
router.beforeEach((to, from, next) => {
  const publicPages = ["/login"];
  const authRequired = !publicPages.includes(to.path);
  const authStore = useAuthStore();

  if (authRequired && !authStore.user) {
    next({ name: "login" });
  } else {
    next();
  }
});

export default router;
