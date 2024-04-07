<script setup lang="ts">
import CategorySliderItem from '@/components/quizzes/CategorySliderItem.vue'
import { useCategories } from '@/composables/useCategories'
import { defineProps, defineEmits } from 'vue'

const { data: categoriesData } = useCategories()

const props = defineProps<{
  activeCategoryId: number | null
}>()

const emits = defineEmits(['categoryChangeHandler'])
</script>

<template>
  <ul
    class="flex overflow-x-auto gap-4 h-11 scrollbar-hide border-b border-b-mid-blue border-opacity-30"
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
</template>
