<script setup lang="ts">
import { Field, ErrorMessage } from 'vee-validate'

const props = defineProps<{
  name: string
  label: string
  placeholder?: string
}>()
</script>

<template>
  <div class="w-full flex flex-col gap-1 lg:gap-[6px]">
    <label class="text-mid-black text-sm">{{ props.label }}</label>
    <Field
      class="border w-full rounded-[10px] p-3 lg:p-4 outline-blue-200"
      :placeholder="props.placeholder"
      :name="props.name"
    />
    <ErrorMessage name="email" />
  </div>
</template>
