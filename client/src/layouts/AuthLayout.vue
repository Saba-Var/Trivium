<script setup lang="ts">
import GirlWithUfoIcon from '@/components/icons/GirlWithUfoIcon.vue'
import BackIcon from '@/components/icons/BackIcon.vue'
import { useRoute } from 'vue-router'

const route = useRoute()

const authViewsData = {
  SignUp: {
    icon: GirlWithUfoIcon,
    backgroundColor: '#f4fcfe'
  }
}

const currentViewName = route.name as keyof typeof authViewsData
const PageIcon = authViewsData[currentViewName].icon
const backgroundColor = authViewsData[currentViewName].backgroundColor
</script>

<template>
  <div class="flex flex-col lg:flex-row min-h-screen relative">
    <RouterLink
      class="absolute lg:fixed top-4 left-4 lg:top-10 lg:left-10 text-xl font-black"
      to="/"
    >
      Trivium
    </RouterLink>

    <div
      :class="`w-full lg:w-[45%] pt-14 mb-10 lg:mb-0 lg:pt-0 flex items-center justify-center ${currentViewName === 'SignUp' && '!justify-start lg:justify-start'}`"
      :style="{ backgroundColor }"
    >
      <PageIcon class="max-w-[70%] h-4/6" />
    </div>

    <div class="w-full lf:w-[55%] relative px-3 lg:px-0 lg:pl-20 pb-20">
      <button
        @click="$router.go(-1)"
        class="text-mid-blue text-sm font-medium absolute lg:top-10 flex items-center gap-3"
      >
        <BackIcon />
        <p>Back</p>
      </button>

      <div class="pt-10 lg:pt-32 lg:pr-[40%]">
        <RouterView />
      </div>
    </div>
  </div>
</template>
