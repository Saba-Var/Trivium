<script setup lang="ts">
import ErrorPage from '@/components/shared/ErrorPage/ErroPage.vue'
</script>

<template>
  <ErrorPage title="Internal server error!" :errorCode="500" />
</template>
