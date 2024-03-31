<script setup lang="ts">
import CheckIcon from '@/components/icons/CheckIcon.vue'
import { useField, ErrorMessage } from 'vee-validate'

const props = defineProps<{
  label?: string
  name: string
}>()

const { value, checked, handleChange } = useField(() => props.name, undefined, {
  type: 'checkbox',
  checkedValue: true
})
</script>

<template>
  <div class="relative flex gap-3 items-center">
    <div class="inline-flex items-center">
      <div class="relative flex items-center rounded-full cursor-pointer">
        <input
          class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-full border border-gray-900/20 bg-gray-900/10 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-gray-900 checked:bg-gray-900 checked:before:bg-gray-900 hover:before:opacity-0"
          @change="handleChange"
          :name="props.name"
          :checked="checked"
          :id="props.name"
          :value="value"
          type="checkbox"
        />
        <span
          class="absolute text-white transition-opacity opacity-0 pointer-events-none top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 peer-checked:opacity-100"
        >
          <CheckIcon />
        </span>
      </div>
    </div>

    <label :for="props.name" class="text-mid-black text-sm cursor-pointer">{{ props.label }}</label>
    <ErrorMessage class="absolute -bottom-6 text-main-red text-base" :name="props.name" />
  </div>
</template>
