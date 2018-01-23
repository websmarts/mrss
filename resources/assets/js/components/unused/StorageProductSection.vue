<template>
  <div>
 
    <template v-for='product in products'>
       
          <storage-module :product="product"></storage-module>

    </template>

  </div>
</template>

<script>
export default {
  computed: {
     products() {
      return this.$store.state.products
    }
  }
}

</script>