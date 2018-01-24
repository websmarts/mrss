<template>

  <div class="booking-sidebar" style="font-size:70%">
    <slot></slot>
    <div>Weekly($):<br />{{ cost.weekly.toFixed(2) }}</div>
    <div>One off($):<br />{{ cost.fixed.toFixed(2) }}</div>
  </div>

</template>

<script>
export default {
  computed: {
    cost() {
     return this.$store.getters.getCost;
    },
    
  }

}
</script>