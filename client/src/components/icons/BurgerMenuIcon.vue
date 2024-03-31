<script setup lang="ts">
const props = defineProps<{ class?: string }>()
</script>

<template>
  <svg
    xmlns="http://www.w3.org/2000/svg"
    :class="props.class"
    viewBox="0 0 20 14"
    width="20"
    height="14"
    fill="none"
  >
    <path
      d="M1 7H19M1 1H19M1 13H19"
      stroke="#344054"
      stroke-width="2"
      stroke-linecap="round"
      stroke-linejoin="round"
    />
  </svg>
</template>
