<script setup lang="ts">
import StatisticBlock from '@/components/landing/StatisticBlock/StatisticBlock.vue'
import { useCategories } from '@/composables/useCategories'

const { data } = useCategories()
</script>

<template>
  <StatisticBlock class-name="bg-[#FF5613]" :count="200" text="Quiz games" />
  <StatisticBlock :count="34" text="Different genres" class-name="bg-[#4B69FD]" />
</template>
