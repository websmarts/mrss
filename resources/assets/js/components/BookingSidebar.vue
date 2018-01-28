<template>

  <div v-show="showMe()" class="booking-sidebar" style="font-size:70%">
    <slot></slot>
    <div>Weekly($): {{ costs.weekly.toFixed(2) }}</div>
    <div>One off($): {{ costs.fixed.toFixed(2) }}</div>
  </div>

</template>

<script>
export default {
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
    
  }

}
</script>