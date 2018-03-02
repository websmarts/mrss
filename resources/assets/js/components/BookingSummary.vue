<template>
<div class="booking-summary-container">
  <div><strong>Summary ({{ service }})</strong></div>
  <div style="display: flex">
    <div style="flex: 3">

      <div style="display:flex">
        <div style="flex:2">Weekly fee</div><div style="flex:1">${{ costs.weekly.toFixed(2) }} pw</div>
      </div>
      <div style="display:flex">
        <div style="flex:2">Moving fee</div><div style="flex:1">${{ locationPremium.toFixed(2) }}</div>
      </div>
      <div style="display:flex">
        <div style="flex:2">Packing supplies &amp; extras</div><div style="flex:1">${{ costs.fixed.toFixed(2) }}</div>
      </div>

    </div>
    <div style="flex:1"><router-link class="btn btn-success btn-rounded" to="/confirm">Continue</router-link></div>

  </div>
</div>

</template>

<script>
export default {
  computed: {
    costs() {
     return this.$store.getters.getCost;
    },
    locationPremium(){
      return this.$store.getters.getLocationPremium;
    },
    service() {
      return this.$store.state.service
    }

    
  }

}
</script>
<style>
.btn.btn-rounded {
  border-radius: 18px;
}
</style>