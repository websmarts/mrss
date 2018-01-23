<template>
 <div id="booking-page">

  <booking-sidebar>Sidebar info</booking-sidebar>

  <h3>Prices &amp; <br />Booking</h3>
      
       <service-selector v-model="service" :tabs="tabs" :selectedService="selectedService">Select the service <br />you require</service-selector>
       
       

        <div style="background: #def;padding:10px; margin-bottom: 10px;margin-top: 15px;">
        <location-selector v-model="pickupLocation">
          <h4>Your Location</h4>
          <p>This is where we deliver the Modules for loading.</p>
        </location-selector>

        <location-selector v-model="returnLocation">
          <h4>Your Return Location</h4>
          <p>This is where we deliver the Modules for unloading at the end of the storage term. If you do not know your return location yet, select "unknown" and let us know later on.</p>
          <p>If you chose DIY Removals, this is the location you are moving to.</p>
        </location-selector>
      </div>


       <!-- <component :is="displaySection"></component> -->
       <!-- <module-selector v-model="modules" :products="fetchProductByType('storage_module')">Select the number of Modules </module-selector>
       <extras-selector v-model="extras" :products="fetchProductByType('extra')"></extras-selector> -->
        <template v-for="product_type in ['module','extra','insurance']">
          <div>{{ headings[product_type] }}</div>
          <template v-for="product in fetchProductsByType(product_type)">
            <component :is="product_type +'-selector'" :product="product"></component>
          </template>
        </template>
       
       <div class="app-footer" >
          <booking-summary></booking-summary>
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
      service: {},//{name: 'Default',key: 'default'}
      pickupLocation: '',
      returnLocation: '',
      modules: {},
      extras: [],
      insurance: {},
      headings: {'module': 'Module options','extra': 'Extra products','insurance': 'Insurance options'}


      
      
    }
  },
  computed: {
    selectedService() {
      if (this.service.hasOwnProperty('name')){
        return this.service
      }
      return false
    }
    
   
  },
  methods: {
    fetchProductsByType(product_type) {
      let products = _.orderBy( _.filter(this.$store.state.products,['product_type',product_type]),['order'],['desc'])
      //console.log('fetchProductByType for - '+product_type , products)
      return products
    }
    
  },
  created() {
    // console.log('products',products)
    this.$store.dispatch('initStore',PRODUCTS)
  }
}
</script>