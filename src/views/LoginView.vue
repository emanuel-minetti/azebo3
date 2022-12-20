<template>
  <h1>Login</h1>
  <form @submit="(evt) => submit(evt)">
    <div class="mb-3">
      <label for="username" class="form-label">Benutzername</label>
      <input
        type="text"
        class="form-control"
        id="username"
        v-model="username"
      />
      <div class="alert alert-warning" v-show="usernameErrorPresent">
        Der Benutzername muss zwischen 3 und 30 Zeichen lang sein.
      </div>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Passwort</label>
      <input
        type="password"
        class="form-control"
        id="password"
        v-model="password"
      />
      <div class="alert alert-warning" v-show="passwordErrorPresent">
        Das Passwort muss zwischen 8 und 30 Zeichen lang sein.
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
  </form>
</template>

<script setup lang="ts">
import { computed, ref } from "vue";
import { useAuthStore } from "@/stores";

const authStore = useAuthStore();
const username = ref("");
const password = ref("");
const error = ref(
  new Map([
    ["username", false],
    ["password", false],
  ])
);
const usernameErrorPresent = computed(() => error.value.get("username"));
const passwordErrorPresent = computed(() => error.value.get("password"));

function submit(evt: Event) {
  evt.preventDefault();
  validate();
  if (Array.from(error.value.values()).every((value) => !value)) {
    authStore.login(username.value, password.value);
  }
}

function validate() {
  validateUsername(username.value);
  validatePassword(password.value);
  console.log(error.value);
}

function validateUsername(username: string) {
  error.value.set("username", !(username.length >= 3 && username.length <= 30));
}

function validatePassword(password: string) {
  error.value.set("password", !(password.length >= 8 && password.length <= 30));
}
</script>
