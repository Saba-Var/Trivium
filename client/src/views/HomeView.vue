<script setup lang="ts">
import BackgroundBlock from '@/components/landing/BackgroundBlock/BackgroundBlock.vue'
import StatisticBlock from '@/components/landing/StatisticBlock/StatisticBlock.vue'
import HeroTitle from '@/components/landing/HeroTitle/HeroTitle.vue'
import HomeHero from '@/components/landing/HomeHero/HomeHero.vue'
import { useCategories } from '@/composables/useCategories'
import { useQuizzes } from '@/composables/useQuizzes'

const { data: categories } = useCategories()
const { data: quizzes } = useQuizzes()
</script>

<template>
  <HeroTitle class="lg:hidden" />

  <div class="lg:flex items-end relative">
    <HomeHero />

    <StatisticBlock
      :count="quizzes?.data?.meta?.total || 0"
      class="bg-mid-red lg:hidden"
      text="Quiz games"
    />

    <StatisticBlock
      class="bg-dark-purple lg:order-1 lg:h-56 lg:w-[40%]"
      :count="categories?.data?.length || 0"
      text="Different genres"
    />

    <BackgroundBlock />
  </div>
</template>
