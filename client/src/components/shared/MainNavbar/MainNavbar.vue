<script setup lang="ts">
import BurgerMenuIcon from '@/components/icons/BurgerMenuIcon.vue'
import SearchIcon from '@/components/icons/SearchIcon.vue'
import { RouterLink } from 'vue-router'
</script>

<template>
  <div
    class="flex p-4 border-b border-mid-blue border-opacity-20 justify-between lg:px-24 lg:mb-16 3xl:mb-20 4xl:mb-24"
  >
    <p class="text-black text-2xl font-black">Trivium</p>

    <div class="flex gap-6 items-center">
      <div class="flex items-center gap-2 lg:hidden">
        <SearchIcon />
        <p class="text-mid-blue text-sm">Search</p>
      </div>

      <BurgerMenuIcon className="lg:hidden" />

      <RouterLink to="/auth/sign-up" class="hidden lg:block">
        <button class="bg-black font-bold text-sm rounded px-5 py-3 text-white">Sign Up</button>
      </RouterLink>

      <RouterLink to="/auth/log-in" class="hidden lg:block">
        <button class="font-bold text-sm rounded px-5 py-3 bg-white text-purple-900">Login</button>
      </RouterLink>
    </div>
  </div>
</template>
