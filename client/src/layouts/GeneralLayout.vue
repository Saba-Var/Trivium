<script setup lang="ts">
import MainNavbar from '@/components/shared/MainNavbar.vue'
import MainFooter from '@/components/shared/MainFooter.vue'
</script>

<template>
  <div class="overflow-x-hidden">
    <MainNavbar />

    <div class="pt-16 lg:pt-20">
      <RouterView />
    </div>

    <MainFooter />
  </div>
</template>
