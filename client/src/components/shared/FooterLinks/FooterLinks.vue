<script setup lang="ts">
import type { Sections } from './types'

const sections: Sections = [
  {
    links: [{ title: 'Quizzes', url: '/quizzes' }],
    sectionTitle: 'Content'
  },
  {
    links: [
      { title: 'trivium@gmail.com', isEmail: true },
      { title: '+995 328989', isPhoneNumber: true }
    ],
    sectionTitle: 'Contact us'
  },
  {
    links: [
      { title: 'Facebook', url: '#' },
      { title: 'Linkedin', url: '#' }
    ],
    sectionTitle: 'Social media'
  }
]
</script>

<template>
  <div :key="section.sectionTitle" v-for="section in sections">
    <p class="text-main-black text-sm font-semibold mt-4 md:mt-0 md:mb-6">
      {{ section.sectionTitle }}
    </p>

    <ul class="flex flex-col gap-6">
      <li :key="linkData.title" v-for="linkData in section.links">
        <RouterLink v-if="linkData.url" class="text-dark-blue text-xs" :to="linkData.url">{{
          linkData.title
        }}</RouterLink>
        <a
          v-else-if="linkData.isEmail"
          class="text-dark-blue text-xs"
          :href="'mailto:' + linkData.title"
          >{{ linkData.title }}</a
        >
        <a
          v-else-if="linkData.isPhoneNumber"
          class="text-dark-blue text-xs"
          :href="'tel:' + linkData.title"
          >{{ linkData.title }}</a
        >
      </li>
    </ul>
  </div>
</template>
