<script setup lang="ts">
import CategorySliderItem from '@/components/quizzes/CategorySliderItem.vue'
import { useCategories } from '@/composables/useCategories'
import RightIcon from '@/components/icons/RightIcon.vue'
import { defineProps, defineEmits, ref } from 'vue'

const { data: categoriesData } = useCategories()

const sliderTransformValue = ref(0)

const props = defineProps<{
  activeCategoryId: number | null
}>()

const emits = defineEmits(['categoryChangeHandler'])

const transformChangeHandler = (direction: 'left' | 'right') => {
  if (direction === 'left') {
    sliderTransformValue.value += 0.5
    return
  }

  if (direction === 'right' && sliderTransformValue.value < 0.5) {
    sliderTransformValue.value -= 0.5
  }
}
</script>

<template>
  <div
    class="flex items-center overflow-hidden h-11 gap-2 lg:w-[88%] 2xl:w-[91%] 3xl:w-[93%] border-b border-b-mid-blue border-opacity-30 relative"
  >
    <button
      v-if="sliderTransformValue < 0"
      @click="transformChangeHandler('left')"
      class="absolute left-0 flex h-full w-9 justify-center items-end pb-2 -rotate-180 z-50 bg-white"
    >
      <RightIcon />
    </button>

    <ul
      :style="{ transform: `translateX(${sliderTransformValue * 100}%)` }"
      class="flex overflow-x gap-4 scrollbar-hide w-full h-full transition-all duration-300 ease-in-out"
    >
      <CategorySliderItem
        @click="emits('categoryChangeHandler', null)"
        :isActive="props.activeCategoryId === null"
        title="All Quizzes"
      />

      <CategorySliderItem
        @click="emits('categoryChangeHandler', category.id)"
        :isActive="props.activeCategoryId === category.id"
        v-for="category in categoriesData?.data"
        :title="category.title"
        :key="category.id"
      />
    </ul>

    <button
      @click="transformChangeHandler('right')"
      class="flex absolute lg:flex h-full w-9 right-0 justify-center items-start pt-2 bg-white"
    >
      <RightIcon />
    </button>
  </div>
</template>
