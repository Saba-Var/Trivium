<script setup lang="ts">
import CategorySelectSlider from '@/components/quizzes/CategorySelectSlider.vue'
import QuizzesFilterButton from '@/components/quizzes/QuizzesFilterButton.vue'
import { ref } from 'vue'

const activeCategoryId = ref<number | null>(null)

const categoryChangeHandler = (categoryId: number) => {
  activeCategoryId.value = categoryId
}
</script>

<template>
  <div class="px-4 py-5 lg:px-24">
    <div class="flex flex-col gap-5 lg:flex-row">
      <CategorySelectSlider
        :activeCategoryId="activeCategoryId"
        @categoryChangeHandler="categoryChangeHandler"
      />

      <QuizzesFilterButton />
    </div>
  </div>
</template>
