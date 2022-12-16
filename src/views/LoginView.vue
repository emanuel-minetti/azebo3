<script setup lang="ts">
import { ref } from "vue";

const username = ref("");
const password = ref("");

function submit(evt: Event) {
  evt.preventDefault();
  console.log("Submitted");
  console.log(username.value);
}
</script>

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
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Passwort</label>
      <input
        type="password"
        class="form-control"
        id="password"
        v-model="password"
      />
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
  </form>
</template>
