<template>
  <div id="app">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <router-link class="navbar-brand" to="/">Malouf Challenge</router-link>
      <!-- <a class="navbar-brand" href="/">Malouf Challenge</a> -->
    </nav>
  </div>
  <router-view />
</template>

<style>

</style>


import { createApp } from 'vue'


createApp({
    components: {
        PageComponent,
        SecondComponent,
    }
}).mount('#app')
