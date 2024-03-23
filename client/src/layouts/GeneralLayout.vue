<script setup lang="ts">
import MainNavbar from '@/components/shared/MainNavbar/MainNavbar.vue'
import Footer from '@/components/shared/Footer/Footer.vue'
</script>

<template>
  <div class="overflow-x-hidden">
    <MainNavbar />

    <RouterView />

    <Footer />
  </div>
</template>
