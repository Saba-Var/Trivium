<script setup lang="ts">
import { useCategories } from '@/composables/useCategories'
import { defineProps, defineEmits } from 'vue'

const { data: categoriesData } = useCategories()

const props = defineProps<{
  activeCategoryId: number | null
}>()

const emits = defineEmits(['categoryChangeHandler'])

const categoryChangeHandler = (categoryId: number | null) => {
  emits('categoryChangeHandler', categoryId)
}
</script>

<template>
  <ul class="flex overflow-x-auto gap-4 scrollbar-hide">
    <li class="flex-shrink-0">
      <button
        :class="[
          'text-mid-blue text-sm font-semibold pb-4',
          props.activeCategoryId === null ? '!text-black border-b border-b-black' : ''
        ]"
        @click="categoryChangeHandler(null)"
      >
        All Quizzes
      </button>
    </li>

    <li class="flex-shrink-0" v-for="category in categoriesData?.data" :key="category.id">
      <button
        :class="[
          'text-mid-blue text-sm font-semibold pb-4',
          props.activeCategoryId === category.id ? '!text-black border-b border-b-black' : ''
        ]"
        @click="categoryChangeHandler(category.id)"
      >
        {{ category.title }}
      </button>
    </li>
  </ul>
</template>
