<script setup lang="ts">
import { useField, ErrorMessage } from 'vee-validate'

const props = defineProps<{
  name: string
  type?: string
  label?: string
  placeholder?: string
}>()

const { value } = useField(() => props.name)
</script>

<template>
  <div class="w-full flex flex-col gap-1 relative lg:gap-[6px]">
    <label class="text-mid-black text-sm" :for="props.name">{{ props.label }}</label>
    <input
      :class="[`border w-full rounded-[10px] p-3 lg:p-4 outline-blue-200`]"
      :placeholder="props.placeholder"
      :type="type || 'text'"
      v-model="value"
    />
    <ErrorMessage class="absolute -bottom-6 text-main-red text-base" :name="props.name" />
  </div>
</template>
