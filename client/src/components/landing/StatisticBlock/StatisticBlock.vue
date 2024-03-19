<script setup lang="ts">
import TopRightArrowIcon from '@/components/icons/TopRightArrowIcon.vue'
import type { Props } from './types'

const props = defineProps<Props>()
</script>

<template>
  <div :class="`text-white py-20 px-12 ${props.className}`">
    <p class="text-7xl font-black flex flex-col">{{ Math.floor(props.count / 5) * 5 }}+</p>

    <RouterLink to="/quizzes" class="flex gap-6 items-center">
      <p class="text-5xl font-black underline">
        {{ props.text }}
      </p>
      <div>
        <TopRightArrowIcon />
      </div>
    </RouterLink>
  </div>
</template>
