<script setup lang="ts">
import MobileHeader from '@/components/shared/MobileHeader.vue'
import BurgerMenuIcon from '@/components/icons/BurgerMenuIcon.vue'
import SearchIcon from '@/components/icons/SearchIcon.vue'
import { RouterLink } from 'vue-router'
import { ref } from 'vue'

const showMobileHeader = ref(false)

const toggleMobileHeader = () => {
  if (showMobileHeader.value) {
    document.body.style.overflow = 'auto'
  } else {
    document.body.style.overflow = 'hidden'
  }

  showMobileHeader.value = !showMobileHeader.value
}
</script>

<template>
  <div
    class="flex fixed w-full bg-white z-50 p-4 border-b border-mid-blue border-opacity-20 justify-between lg:px-24 lg:mb-16 3xl:mb-20 4xl:mb-24"
  >
    <RouterLink to="/">
      <p class="text-black text-2xl font-black">Trivium</p>
    </RouterLink>

    <div class="flex gap-6 items-center">
      <div class="flex items-center gap-2 lg:hidden">
        <SearchIcon />
        <p class="text-mid-blue text-sm">Search</p>
      </div>

      <BurgerMenuIcon @click="toggleMobileHeader" class="lg:hidden" />

      <RouterLink to="/auth/sign-up" class="hidden lg:block">
        <button class="bg-black font-bold text-sm rounded px-5 py-3 text-white">Sign Up</button>
      </RouterLink>

      <RouterLink to="/auth/log-in" class="hidden lg:block">
        <button class="font-bold text-sm rounded px-5 py-3 bg-white text-purple-900">Login</button>
      </RouterLink>
    </div>
  </div>

  <MobileHeader @toggle="toggleMobileHeader" v-if="showMobileHeader" />
</template>
