<script setup lang="ts">
import FooterLinks from '@/components/shared/FooterLinks/FooterLinks.vue'
</script>

<template>
  <footer class="md:py-11">
    <div class="md:flex px-10 md:px-10 lg:gap-10 md:gap-24 2xl:gap-40">
      <p
        class="border-b border-opacity-40 md:border-none border-light-grey font-black text-2xl py-6 md:py-0"
      >
        Trivium
      </p>

      <FooterLinks />
    </div>

    <p
      class="py-6 md:h-16 text-mid-blue text-xs border-opacity-40 border-light-grey border-t px-10 mt-7 md:mt-11 md:text-right"
    >
      © 2024 Trivium. All rights reserved
    </p>
  </footer>
</template>
