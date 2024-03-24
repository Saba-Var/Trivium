<script setup lang="ts">
import CurvedGoBackIcon from '@/components/icons/CurvedGoBackIcon.vue'
import IntervalServerErrorIcon from '@/components/icons/IntervalServerErrorIcon.vue'
import NotFoundIcon from '@/components/icons/NotFoundIcon.vue'
import type { Props } from './types'

const props = defineProps<Props>()
</script>

<template>
  <div class="flex gap-8 lg:gap-11 py-10 lg:py-14 flex-col items-center w-full border-b">
    <div>
      <p class="text-black font-black text-4xl text-center pb-4 px-10 lg:text-6xl">
        {{ props.title }}
      </p>
      <p class="text-center text-black font-bold text-lg">Error {{ props.errorCode }}</p>
    </div>

    <NotFoundIcon v-if="props.errorCode === 404" />
    <IntervalServerErrorIcon v-if="props.errorCode === 500" />

    <div class="flex items-center gap-3 text-dark-purple text-lg">
      <CurvedGoBackIcon />

      <RouterLink to="/" class="text-dark-purple font-normal">Go home</RouterLink>
    </div>
  </div>
</template>
