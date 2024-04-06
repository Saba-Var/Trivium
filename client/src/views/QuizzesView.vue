<script setup lang="ts">
import CategorySelectSlider from '@/components/quizzes/CategorySelectSlider.vue'
import { ref } from 'vue'

const activeCategoryId = ref<number | null>(null)

const categoryChangeHandler = (categoryId: number) => {
  activeCategoryId.value = categoryId
}
</script>

<template>
  <div class="px-4 py-5">
    <CategorySelectSlider
      :activeCategoryId="activeCategoryId"
      @categoryChangeHandler="categoryChangeHandler"
    />
  </div>
</template>
