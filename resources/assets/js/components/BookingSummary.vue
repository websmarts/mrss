<template>
<div class="booking-summary-container">
  <div><strong>Summary ({{ service }})</strong></div>
  <div style="display: flex">
    <div style="flex: 3" v-if="this.$store.state.service =='storage'">
        <div style="display:flex" >
          <div style="flex:2">Weekly fee</div><div style="flex:1">${{ costs.weekly.toFixed(2) }} pw</div>  
        </div>
         <div style="display:flex; margin-top:10px;">
        <div style="flex:2">Packing supplies &amp; extras</div><div style="flex:1">${{ costs.fixed.toFixed(2) }}</div>
      </div>
        <div style="display:flex;margin-top:10px" >
          <div style="flex:2">Delivery:<br />- {{ pickupSuburb }}</div><div style="flex:1">FREE</div>  
        </div>
        <div style="display:flex; margin-top:10px;">
          <div style="flex:2">Return(at end of storage):<br />- {{ returnSuburb }}</div><div style="flex:1">${{ locationPremium.return > -1 ? locationPremium.return.toFixed(2) : 'POA' }} per module</div>  
        </div>
    </div>

    <div style="flex: 3" v-if="this.$store.state.service =='removal'">
      <div style="display:flex; margin-top:10px" >
        <div style="flex:2">DIY removal fee</div><div style="flex:1">${{ removalFee }}</div>
      </div>
      <div style="display:flex; margin-top:10px;">
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
    locationPremium() {
      return this.$store.getters.getLocationPremium;
    },
    removalFee() {
      // number of DIY modules cost PLUS location premium
      return "No DIY module cost + locationpremium";
    },
    service() {
      return this.$store.state.service;
    },
    pickupSuburb() {
      let location = _.find(LOCATIONS, {
        id: this.$store.state.cart.pickupLocation
      });
      return location ? location.suburb : null;
    },
    returnSuburb() {
      let location = _.find(LOCATIONS, {
        id: this.$store.state.cart.returnLocation
      });
      return location ? location.suburb : null;
    },
    another() {}
  }
};
</script>
<style>
.btn.btn-rounded {
  border-radius: 18px;
}
</style>