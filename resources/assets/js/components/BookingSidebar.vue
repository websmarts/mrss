<template>

  <div v-show="showMe()" class="booking-sidebar" style="font-size:70%">
    <slot></slot>
    
    <div v-show="isStorage" >Weekly($): {{ costs.weekly.toFixed(2) }}</div>
    <div v-show="isRemoval" >DIY Removal($): {{ removalFee }}</div>
    <div>One off($): {{ costs.fixed.toFixed(2) }}</div>
  </div>

</template>

<script>
export default {
  props: ['service'],
  methods: {
    showMe() {
      let costs = this.costs
      return costs.weekly + costs.fixed > 0
    }
  },
  computed: {
    costs() {
     return this.$store.getters.getCost;
    },
    removalFee() {
      let fee = parseFloat(this.$store.getters.getRemovalFee);
      if ( isNaN(fee) ){
        return this.$store.getters.getRemovalFee
      } else {
        return fee.toFixed(2);
      }
        
    },
    isRemoval() {
      return this.service == 'removal'
    },
    isStorage() {
      return this.service == 'storage'
    }
  }

}
</script>