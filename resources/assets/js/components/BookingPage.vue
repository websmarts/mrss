<template>
 <div id="booking-page">

  <booking-sidebar >Costs</booking-sidebar>

  <div class="h3">Prices &amp; Booking</div>

      
       <service-selector>Select the service you require</service-selector>


      <div style="border: 1px solid #444; padding:10px; margin-bottom: 10px;margin-top: 15px;" v-show="service">
        <location-selector v-model="pickupLocation">
          <h4>Your Location</h4>
          <p>This is where we deliver the Modules for loading.</p>
        </location-selector>

        <location-selector v-model="returnLocation">
          <h4>Your Return Location</h4>
          <p>This is where we deliver the Modules for unloading at the end of the storage term.</p>
          <template slot="notes">
            <p> If you do not know your return location yet, select "unknown" and let us know later on. If you chose DIY Removals, this is the location you are moving to.</p>
          </template>
        </location-selector>
      </div>


       <!-- <component :is="displaySection"></component> -->
       <!-- <module-selector v-model="modules" :products="fetchProductByType('storage_module')">Select the number of Modules </module-selector>
       <extras-selector v-model="extras" :products="fetchProductByType('extra')"></extras-selector> -->
       <div id="products" v-show="service">
          <div>
            <div>Storage modules</div>
            <storage-module-selector :product="fetchProductsByType('storage-module')[0]"></storage-module-selector>
          </div>

          <div>
            <div>Removal modules</div>
            <removal-module-selector :product="fetchProductsByType('removal-module')[0]"></removal-module-selector>
          </div>

          <div>
            <div>Packing supplies and Extras</div>
             <template v-for="product in fetchProductsByType('extra')">
               <extra-selector :product="product"></extra-selector>
             </template>
          </div>

          <div>
            <div>Insurance options</div>
            <insurance-selector :product="fetchProductsByType('insurance')[0]"></insurance-selector>
          </div>

       </div><!-- end #products -->
       
       <div class="app-footer" v-show="service">
          <booking-summary></booking-summary>
      </div>

  </div>
</template>


<script>


export default {
  name: 'app',
  data() {
    return {
      
      pickupLocation: '',
      returnLocation: '',
      }
  },
  computed: {
    service() {
      return this.$store.getters.getService;
    }
  },
  methods: {
    
    fetchProductsByType(product_type) {
     return _.orderBy( _.filter(PRODUCTS,['product_type',product_type]),['display_order'],['desc'])
    },
    serviceSelected() {
      return this.service;
    }
    
  }
}
</script>