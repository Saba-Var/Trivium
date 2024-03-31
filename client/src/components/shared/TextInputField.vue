<script setup lang="ts">
import WarningIcon from '@/components/icons/WarningIcon.vue'
import { ref, type InputTypeHTMLAttribute } from 'vue'
import { useField, ErrorMessage } from 'vee-validate'
import EyeIcon from '@/components/icons/EyeIcon.vue'

const props = defineProps<{
  type?: InputTypeHTMLAttribute
  placeholder?: string
  label?: string
  name: string
}>()

const { value, errorMessage } = useField(() => props.name)

const inputType = ref<InputTypeHTMLAttribute>(props.type || 'text')

const togglePasswordVisibility = () => {
  inputType.value = inputType.value === 'password' ? 'text' : 'password'
}
</script>

<template>
  <div class="w-full flex flex-col gap-1 relative lg:gap-[6px]">
    <label class="text-mid-black text-sm" :for="props.name">{{ props.label }}</label>
    <input
      :class="[
        `border w-full rounded-[10px] p-3 lg:p-4 outline-blue-200 !pr-10`,
        errorMessage ? 'border-main-red outline-main-red' : '',
        errorMessage && type === 'password' ? 'pr-16' : ''
      ]"
      :placeholder="props.placeholder"
      :type="inputType"
      v-model="value"
    />
    <ErrorMessage class="absolute -bottom-6 text-main-red text-base" :name="props.name" />

    <div class="absolute flex gap-2 right-4 bottom-4 lg:bottom-5 items-center">
      <WarningIcon class="h-4" v-if="errorMessage" />

      <button
        @click="togglePasswordVisibility"
        v-if="props.type === 'password'"
        class="h-4 relative"
        type="button"
      >
        <div
          v-if="inputType !== 'text'"
          :class="[
            'absolute h-5 w-[2px] flex items-center justify-center top-1/2 -translate-y-1/2 right-[40%] -translate-x-1/2 -rotate-45'
          ]"
        >
          <div class="bg-slate-400 w-px h-full"></div>
          <div class="bg-white w-px h-full"></div>
        </div>

        <EyeIcon />
      </button>
    </div>
  </div>
</template>
