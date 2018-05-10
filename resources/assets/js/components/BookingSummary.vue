<template>
<div class="booking-summary-container">
  <div style="color:#fff;margin-bottom:15px;"><strong>Booking summary ({{ service }})</strong></div>
  <div style="display: flex">
    <div style="flex: 3" v-if="this.$store.state.service =='storage'">
        <div style="display:flex" >
          <div style="flex:2">Weekly fee</div><div style="flex:1">${{ costs.weekly.toFixed(2) }} </div>  
        </div>
         <div style="display:flex; margin-top:10px;">
        <div style="flex:2">Packing supplies &amp; extras</div><div style="flex:1">${{ costs.fixed.toFixed(2) }}</div>
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
    <div style="flex:1"><router-link class="btn btn-success btn-rounded" :class="{disabled: isNotValid}" to="/confirm">Continue</router-link></div>

  </div>
</div>

</template>

<script>
export default {
  computed: {
    isNotValid() {
      if(this.service == "storage"){
        return !(parseFloat(this.costs.fixed) + parseFloat(this.costs.weekly)) > 0
      }
      if(this.service == "removal"){
        return ! parseFloat(this.removalFee) > 0
      }
       
    },
    costs() {
      return this.$store.getters.getCost;
    },
    locationPremium() {
      return this.$store.getters.getLocationPremium;
    },
    storageReturnFee() {
      let fee = parseFloat(this.$store.getters.storageReturnFee);
      if ( isNaN(fee) ){
        return this.$store.getters.storageReturnFee
      } else {
        return fee.toFixed(2);
      }

    },
    removalFee() {
     let fee = parseFloat(this.$store.getters.getRemovalFee);
      if ( isNaN(fee) ){
        return this.$store.getters.getRemovalFee
      } else {
        return fee.toFixed(2);
      }
        
    
    },
    service() {
      return this.$store.state.service;
    },
    pickupSuburb() {
      return this.$store.getters.pickupSuburb
      
    },
    returnSuburb() {
      return this.$store.getters.returnSuburb
      
    }
  }
};
</script>
