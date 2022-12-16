<template>
  <header>
    <div class="navbar">
      <img
        alt="Vue logo"
        class="logo"
        src="@/assets/logo.svg"
        width="125"
        height="125"
      />
      <nav>
        <RouterLink to="/">Home</RouterLink>
        <RouterLink to="/about">About</RouterLink>
      </nav>
    </div>
  </header>
  <main class="container">
    <div class="alert alert-primary">Your name is {{ name }}</div>
    <RouterView />
  </main>
</template>

<script setup lang="ts">
import { RouterLink, RouterView } from "vue-router";
import { onMounted, ref } from "vue";

const name = ref("");

onMounted(async () => {
  await fetch("http://localhost/api/")
    .then((res) => res.json())
    .then((json) => (name.value = json.name));
});
</script>

<style scoped></style>
