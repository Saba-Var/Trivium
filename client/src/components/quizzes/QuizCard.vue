<script setup lang="ts">
import QuizAdditionalInfoSection from '@/components/quizzes/QuizAdditionalInfoSection.vue'
import { generateStorageUrl } from '@/utils/generateStorageUrl'
import EnergyIcon from '@/components/icons/EnergyIcon.vue'
import CheckIcon from '@/components/icons/CheckIcon.vue'
import BulbIcon from '@/components/icons/BulbIcon.vue'
import { formatDate } from '@/utils/formatDate'
import type { Quiz } from '@/types/backend'
import { computed } from 'vue'

const props = defineProps<{ quiz: Quiz }>()

const quizImage = computed(() => {
  return props.quiz.image?.startsWith('https://')
    ? props.quiz.image
    : generateStorageUrl(props.quiz.image)
})
</script>

<template>
  <div class="px-6 pt-6 pb-8 shadow-lg">
    <img class="max-h-[235px] mx-auto mb-8" :src="quizImage" />

    <ul class="flex gap-3 flex-wrap mb-3">
      <li
        class="flex items-center gap-3"
        :key="category.id"
        v-for="(category, index) in quiz.categories"
      >
        <p class="text-dark-purple text-sm font-semibold">
          {{ category.title }}
        </p>
        <div
          v-if="index !== quiz.categories.length - 1"
          class="bg-gray-300 h-1 w-1 rounded-full"
        ></div>
      </li>
    </ul>

    <p class="text-main-black text-2xl font-semibold mb-5">{{ quiz.title }}</p>

    <div class="flex flex-wrap justify-items-center gap-5">
      <QuizAdditionalInfoSection
        :title="quiz.user_result ? 'Completed' : 'Not Completed'"
        :value="quiz.user_result ? formatDate(quiz.user_result.created_at) : 'N/A'"
      >
        <template #icon>
          <div
            :class="[
              'h-10 w-10 rounded-full flex justify-center items-center',
              props.quiz.user_result ? 'bg-green-200' : 'bg-gray-100'
            ]"
          >
            <CheckIcon v-if="props.quiz.user_result" class="w-5 h-5" color="#12B76A" />
            <BulbIcon v-else />
          </div>
        </template>
      </QuizAdditionalInfoSection>

      <QuizAdditionalInfoSection
        title="Total time"
        :value="quiz.user_result ? `${quiz.user_result.time} Minutes` : 'N/A'"
      />

      <QuizAdditionalInfoSection title="Total users" :value="quiz.users_count" />

      <QuizAdditionalInfoSection
        title="Difficulty level"
        :value="quiz.difficulty.slice(0, 1).toUpperCase() + quiz.difficulty.slice(1)"
      >
        <template #icon>
          <div class="h-10 w-10 rounded-full flex justify-center items-center bg-[#F4EBFF]">
            <EnergyIcon />
          </div>
        </template>
      </QuizAdditionalInfoSection>

      <QuizAdditionalInfoSection
        v-if="quiz.user_result"
        title="Points"
        :value="quiz.user_result.correct_answers + '/' + quiz.user_result.correct_answers"
      >
        <template #icon>
          <div class="h-10 w-10 rounded-full flex justify-center items-center bg-[#F4EBFF]">
            <EnergyIcon />
          </div>
        </template>
      </QuizAdditionalInfoSection>
    </div>
  </div>
</template>
