<script setup lang="ts">
const props = defineProps<{
  isActive: boolean
  title: string
}>()
</script>

<template>
  <li
    :class="[
      'flex-shrink-0 cursor-pointer pb-[18px]',
      props.isActive ? 'border-b border-b-black' : ''
    ]"
  >
    <button :class="['text-mid-blue text-sm font-semibold', props.isActive ? '!text-black' : '']">
      {{ props.title }}
    </button>
  </li>
</template>
