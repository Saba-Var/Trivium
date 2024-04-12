<script setup lang="ts">
import QuizCard from '@/components/quizzes/QuizCard.vue'
import { useQuizzes } from '@/composables/useQuizzes'

const props = defineProps<{
  activeCategoryId: number | null
}>()

const { data: quizzes } = useQuizzes({
  filters: { categories: [props.activeCategoryId] }
})
</script>

<template>
  <ul class="mt-3 grid grid-cols-1 gap-12">
    <QuizCard :quiz="quiz" :key="quiz.id" v-for="quiz in quizzes?.data?.data"></QuizCard>
  </ul>
</template>
