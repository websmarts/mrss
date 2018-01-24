<template>
<div class="booking-summary-container">
  <div><strong>Summary</strong></div>
  <div style="display: flex">
    <div style="flex: 3">

      <div style="display:flex">
        <div style="flex:2">Weekly fee</div><div style="flex:1">${{ cost.weekly.toFixed(2) }} pw</div>
      </div>
      <div style="display:flex">
        <div style="flex:2">Moving fee</div><div style="flex:1">N/A</div>
      </div>
      <div style="display:flex">
        <div style="flex:2">Packing supplies &amp; extras</div><div style="flex:1">${{ cost.fixed.toFixed(2) }}</div>
      </div>

    </div>
    <div style="flex:1"><button class="btn btn-success">Continue</button></div>

  </div>
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