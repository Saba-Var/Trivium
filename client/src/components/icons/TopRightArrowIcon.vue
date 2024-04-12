<script setup lang="ts">
const props = defineProps<{
  class?: string
  color?: string
}>()
</script>

<template>
  <svg
    :class="props.class"
    width="29"
    height="29"
    viewBox="0 0 29 29"
    :fill="props.color || 'none'"
    xmlns="http://www.w3.org/2000/svg"
  >
    <path
      d="M2 27L27 2M27 2H2M27 2V27"
      :stroke="props.color || 'white'"
      stroke-width="4"
      stroke-linecap="round"
      stroke-linejoin="round"
    />
  </svg>
</template>
