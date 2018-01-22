<template>
 <div id="booking-page">

  <div class="booking-sidebar">Order total: $23.00</div>
  <h3>Prices &amp; <br />Booking</h3>
      
       <service-selector @change="changed" :activeKey="activeSection.key" :tabs="tabs">Select the service <br />you require</service-selector>
       
       <!-- Insert the Storage or the DIY Removal products section -->
       <transition name ="slide-fade">
         <h3 v-show="activeSection.key =='Storage' ">Storage Products</h3>
       </transition>
        <transition name ="slide-fade">
          <h3 v-show="activeSection.key =='Removal' ">DIY Removal Products</h3>
        </transition>
       <component :is="displaySection"></component>
        
       
       <div class="app-footer" >
          <div><strong>Summary</strong></div>
          <div style="display: flex">
            <div style="flex: 3">

              <div style="display:flex">
                <div style="flex:2">Weekly fee</div><div style="flex:1">$29.95pw</div>
              </div>
              <div style="display:flex">
                <div style="flex:2">Moving fee</div><div style="flex:1">N/A</div>
              </div>
              <div style="display:flex">
                <div style="flex:2">Packing supplies &amp; extras</div><div style="flex:1">$15.70</div>
              </div>

            </div>
            <div style="flex:1"><button class="btn btn-success">Continue</button></div>

          </div>
      </div>

  </div>
</template>


<script>


export default {
  name: 'app',
  data() {
    return {
      tabs: [
        {name: 'Storage', key: 'Storage'},
        {name: 'DIY Removals',key: 'Removal'}
      ],
      activeSection: {name: 'Storage', key: 'Storage'}//{name: 'Default',key: 'default'}
      
    }
  },
  computed: {
    displaySection(){
      return this.activeSection.key + 'ProductSection'
    },
   
  },
  methods: {
    changed(section) {
      this.activeSection = section
    }
  },
  created() {
    // console.log('products',products)
    this.$store.dispatch('initStore',products)
  }
}
</script>