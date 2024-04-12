<script setup lang="ts">
import TopRightArrowIcon from '../icons/TopRightArrowIcon.vue'
import QuizCard from '@/components/quizzes/QuizCard.vue'
import { useQuizzes } from '@/composables/useQuizzes'
import { useRoute } from 'vue-router'
import { onMounted, ref } from 'vue'

const page = ref(1)
const route = useRoute()

onMounted(() => {
  if (route.query.page) {
    page.value = +route.query.page
  }
})

const props = defineProps<{
  activeCategoryId: number | null
}>()

const { data: quizzes } = useQuizzes({
  filters: { categories: [props.activeCategoryId] }
})
</script>

<template>
  <ul class="mt-3 grid grid-cols-1 gap-y-12 md:grid-cols-2 md:gap-x-12 lg:grid-cols-3">
    <QuizCard :quiz="quiz" :key="quiz.id" v-for="quiz in quizzes?.data?.data"></QuizCard>
  </ul>

  <button
    class="mx-auto cursor-pointer mt-12 bg-[#f1f1f4] px-5 py-3 gap-3 rounded-lg flex justify-center items-center hover:bg-slate-200 transition-all duration-150"
    v-if="quizzes?.data.meta.last_page !== quizzes?.data.meta.current_page"
  >
    <TopRightArrowIcon class="rotate-[135deg] w-3 h-3" color="#4B69FD" />
    <p class="text-dark-purple text-base font-semibold">Load more</p>
  </button>
</template>
