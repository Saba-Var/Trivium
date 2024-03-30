<script setup lang="ts">
const props = defineProps<{ disabled?: boolean; text: string }>()
</script>

<template>
  <button
    :class="[
      'p-4 bg-black rounded-[10px] font-semibold text-white text-base mt-3',
      props.disabled ? 'opacity-50 cursor-not-allowed' : 'hover:bg-gray-900'
    ]"
    :disabled="props.disabled"
  >
    {{ props.text }}
  </button>
</template>
