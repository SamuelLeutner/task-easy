import { createRouter, createWebHistory } from "vue-router";

const routes = [
  {
    path: "/",
    name: "Login",
    component: () => import("@/views/Auth/LoginView.vue"),
  },
  {
    path: "/signup",
    name: "Signup",
    component: () => import("@/views/Auth/SignUpView.vue"),
  },
  {
    path: "/signup/email",
    name: "Signup Email",
    component: () => import("@/views/Auth/UserDataView.vue"),
  },
  {
    path: "/type-user",
    name: "Tipo do perfil",
    component: () => import("@/views/UserType/UserTypeView.vue"),
  },
  {
    path: "/forgot-password",
    name: "Recuperação de senha",
    component: () => import("@/views/ForgotPassword/ForgotPassword.vue"),
  },
  {
    path: "/reset-password",
    name: "Redefinir senha",
    component: () => import("@/views/ForgotPassword/ResetPassword.vue"),
  },
  {
    path: "/workspace-view",
    name: "WorkspaceView",
    component: () => import("@/views/Workspace.vue"),
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

router.beforeEach((to, from, next) => {
  document.title = to.name;
  next();
});

export default router;
