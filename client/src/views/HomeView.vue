<script setup lang="ts">
import StatisticBlock from '@/components/landing/StatisticBlock/StatisticBlock.vue'
import { useCategories } from '@/composables/useCategories'
import { getCsrfToken } from '@/services/requests/csrf'
import { useQuery } from '@tanstack/vue-query'

const { data } = useCategories()
console.log(data)

const { data: csrfData } = useQuery({
  queryKey: ['csrf'],
  queryFn: getCsrfToken
})
</script>

<template>
  <StatisticBlock class-name="bg-[#FF5613]" :count="200" text="Quiz games" />
  <StatisticBlock :count="34" text="Different genres" class-name="bg-[#4B69FD]" />
</template>
