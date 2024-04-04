<script setup lang="ts">
import FooterLinks from '@/components/shared/FooterLinks.vue'
</script>

<template>
  <footer class="md:pt-11 z-20 bg-white">
    <div class="md:flex px-10 md:px-10 lg:gap-10 md:gap-24 2xl:gap-40 lg:px-24">
      <RouterLink
        to="/"
        class="border-b border-opacity-40 pb-3 md:border-none block border-light-grey font-black text-2xl my-6 md:py-0 md:mt-3"
        >Trivium</RouterLink
      >

      <FooterLinks />
    </div>

    <p
      class="py-6 md:h-16 text-mid-blue text-xs border-opacity-40 border-light-grey border-t px-10 mt-7 md:mt-11 md:text-right"
    >
      © 2024 Trivium. All rights reserved
    </p>
  </footer>
</template>
