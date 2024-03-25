<script setup lang="ts">
import TopRightArrowIcon from '@/components/icons/TopRightArrowIcon.vue'
import { onMounted, ref, watch } from 'vue'

const props = defineProps<{
  class?: string
  count: number
  text: string
}>()

const number = ref(0)

const increaseHandler = () => {
  number.value = 0
  const interval = setInterval(() => {
    if (number.value < props.count) {
      number.value += 1
    } else {
      clearInterval(interval)
    }
  }, 100)
}

watch(() => props.count, increaseHandler)

onMounted(() => {
  if (number.value === 0) {
    increaseHandler()
  }
})
</script>

<template>
  <div :class="`text-white py-20 px-12 lg:pt-7 lg:pb-16 lg:pr-40 ${props.class}`">
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
