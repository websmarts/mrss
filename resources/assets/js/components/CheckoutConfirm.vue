<template>
  <div>
   

    <template v-if="service =='storage'" >
      <checkout-storage-confirm></checkout-storage-confirm>
    </template>
    <template v-if="service =='removal'" >
      <checkout-removal-confirm></checkout-removal-confirm>
    </template>
  </div>
</template>

<script>
export default {
  data() {
    return {
    }
  },
  computed: {
    service() {
      return this.$store.state.service
    }
   
   

    
    
  }


}
</script>
