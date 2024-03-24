<script setup lang="ts">
import type { Props } from './types'

const props = defineProps<Props>()
</script>

<template>
  <div :class="'ml-10 ' + props.className">
    <h1
      class="text-black text-center text-5xl font-bold mb-5 mt-8 lg:text-left lg:text-6xl xl:text-9xl"
    >
      Trivium
    </h1>
    <p
      class="text-dark-grey font-semibold text-lg text-center mb-5 lg:text-left lg:text-2xl xl:text-3xl"
    >
      Play with us, Explore with us
    </p>
  </div>
</template>
