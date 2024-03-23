<script setup lang="ts">
import MainNavbar from '@/components/shared/MainNavbar/MainNavbar.vue'
import MainFooter from '@/components/shared/MainFooter/MainFooter.vue'
</script>

<template>
  <div class="overflow-x-hidden">
    <MainNavbar />

    <RouterView />

    <MainFooter />
  </div>
</template>
