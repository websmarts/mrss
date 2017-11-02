<template>
  <div id="app">


       <h1>Mr Self Storage Shop</h1>
       <service-selector @change="changed" :activeKey="activeSection.key" :tabs="tabs">Select the service you require</service-selector>
       
       <!-- Insert the Storage or the DIY Removal products section -->
       <component :is="displaySection"></component>
       
       <div class="footer" >
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