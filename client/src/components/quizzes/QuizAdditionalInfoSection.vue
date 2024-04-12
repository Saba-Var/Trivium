<script setup lang="ts">
const props = defineProps<{ title: string; value: string | number }>()
</script>

<template>
  <div class="flex gap-3 h-10">
    <slot name="icon"></slot>

    <div class="flex flex-col">
      <p class="text-mid-black text-sm font-semibold">{{ props.title }}</p>
      <p class="text-dark-blue text-sm">{{ props.value }}</p>
    </div>
  </div>
</template>
