<script setup lang="ts">
import StatisticBlock from '@/components/landing/StatisticBlock/StatisticBlock.vue'
import HomeHero from '@/components/landing/HomeHero/HomeHero.vue'
import { useCategories } from '@/composables/useCategories'
import { useQuizzes } from '@/composables/useQuizzes'

const { data: categories } = useCategories()
const { data: quizzes } = useQuizzes()
</script>

<template>
  <HomeHero />

  <StatisticBlock class-name="bg-[#FF5613]" :count="quizzes?.data?.length" text="Quiz games" />

  <StatisticBlock
    :count="categories?.data?.length"
    class-name="bg-[#4B69FD]"
    text="Different genres"
  />
</template>
