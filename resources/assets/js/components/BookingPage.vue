<template>
 <div id="booking-page">

  <booking-sidebar :service="service" >Costs</booking-sidebar>

  <div class="h3">Prices &amp; Booking</div>

      <p v-if="! this.$store.state.service">Select the service you require</p>
      <p v-show="this.$store.state.service =='removal'">Removal service selected</p>
      <p v-show="this.$store.state.service =='storage'">Storage service selected</p>
      <service-selector></service-selector>


      <div style="border: 1px solid #444; padding:10px; margin-bottom: 10px;margin-top: 15px;" v-show="service">
        <h4>Your Location</h4>
        <el-select class="placeholder-red" v-model="pickupLocation" filterable placeholder="Select pickup location">
          <el-option
            v-for="item in pickupLocations"
            :key="item.id"
            :label="item.suburb"
            :value="item.id">
          </el-option>
        </el-select>


        <!-- <location-selector :value="pickupLocation" @update="updatePickupLocation">
          <h4>Your Location</h4>
          <p>This is where we deliver the Modules for loading.</p>
        </location-selector> -->

        <!-- <location-selector :value="returnLocation" @update="updateReturnLocation">
          <h4>Your Return Location</h4>
          <p>This is where we deliver the Modules for unloading at the end of the storage term.</p>
          <template slot="notes">
            <p> If you do not know your return location yet, select "unknown" and let us know later on. If you chose DIY Removals, this is the location you are moving to.</p>
          </template>
        </location-selector> -->

        <h4>Your Return Location</h4>
        <p style="font-size:85%">Where we return modules after your storage term or move. If you don&apos;t know the location yet select &apos;Unknown or Other&apos;</p>
        <el-select class="placeholder-red"  v-model="returnLocation" filterable placeholder="Select return location">
          <el-option
            v-for="item in returnLocations"
            :key="item.id"
            :label="item.suburb"
            :value="item.id">
          </el-option>
        </el-select>

      </div>


       <!-- <component :is="displaySection"></component> -->
       <!-- <module-selector v-model="modules" :products="fetchProductByType('storage_module')">Select the number of Modules </module-selector>
       <extras-selector v-model="extras" :products="fetchProductByType('extra')"></extras-selector> -->
       <div id="products" v-show="service">
          <div v-show="service == 'storage'">
            <div class="item-heading">Storage modules</div>
            <storage-module-selector :product="fetchGroupProducts('storage-module')[0]"></storage-module-selector>
          </div>

          <div  v-show="service == 'removal'">
            <div class="item-heading">Removal modules</div>
            <removal-module-selector :product="fetchGroupProducts('removal-module')[0]"></removal-module-selector>
          </div>
         

          <div>
            <div class="item-heading">Packing Supplies and Extras</div>
             <template v-for="product in fetchGroupProducts('extra')">
               <extra-selector :key="product.id" :product="product"></extra-selector>
             </template>
          </div>

          <div  v-show="service == 'storage'">
            <div class="item-heading">Insurance options</div>
            <insurance-selector :product="fetchGroupProducts('insurance')[0]"></insurance-selector>
          </div>

       </div><!-- end #products -->
       
       <div class="app-footer" v-show="validform">
          <booking-summary></booking-summary>
      </div>

  </div>
</template>


<script>


export default {
  name: 'app',
  data() {
    return {
      pickupLocations: LOCATIONS,
      returnLocations: LOCATIONS
       
      }
  },
  computed: {
    service() {
      return this.$store.getters.getService;
    },
    validform () {
      return this.service && this.pickupLocation  && this.returnLocation
    },
    pickupLocation: {
      get: function() {
        
        return this.$store.state.cart.pickupLocation > 0 ? this.$store.state.cart.pickupLocation : null ;
      },
      set: function(location){
        this.$store.dispatch('updatePickupLocation',location)
      }
      
    },
    returnLocation: {
      get: function() {
        return this.$store.state.cart.returnLocation > 0 ? this.$store.state.cart.returnLocation : null ;
      },
      set: function(location) {
        this.$store.dispatch('updateReturnLocation',location)
      }
      
    }
  },
  methods: {
    
    fetchGroupProducts(product_group) {
     return _.orderBy( _.filter(PRODUCTS,['product_group',product_group]),['display_order'],['desc'])
    },
    serviceSelected() {
      return this.service;
    },
    
    
  },
  mounted() {

  }
}
</script>

