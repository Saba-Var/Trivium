<script setup lang="ts">
import TopRightArrowIcon from '@/components/icons/TopRightArrowIcon.vue'
import type { Props } from './types'
import { ref, watch } from 'vue'

const props = defineProps<Props>()

const number = ref(0)

watch(
  () => props.count,
  (newVal) => {
    number.value = 0
    const interval = setInterval(() => {
      if (number.value < newVal) {
        number.value += 1
      } else {
        clearInterval(interval)
      }
    }, 100)
  }
)
</script>

<template>
  <div :class="`text-white py-20 px-12 lg:pt-7 lg:pb-16 lg:pr-40 ${props.className}`">
    <p class="text-7xl font-black flex flex-col">
      {{ number + '+' }}
    </p>

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
