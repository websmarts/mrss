<template>
<div>
    <h4>Storage Enquiry Summary</h4>

    <table class="table">
      <tr>
        <td><span style="font-weight: 900;">Weekly Fee:</span></td>
        <td width="100" class="price">${{  costs.weekly.toFixed(2) }}</span></td>
      </tr>
      <tr>
        <td> - {{ getProperty('description','storage-module') }}</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td> - {{ getProperty('description','insurance') }}</td>
        <td>&nbsp;</td>
      </tr>

      <tr><td colspan="2">&nbsp;</td></tr>

      <tr>
        <td><span style="font-weight: 900;">Packing Supplies and Extras:</span></td>
        <td width="100">${{ costs.fixed.toFixed(2) }}</td>
      </tr> 
      
      <tr v-for="product in extraProducts" :key="product.id">
        <td style="padding-bottom: 8px;"> {{ product.name + ', '+ product.options[0].description | truncate(40) }}  X {{ product.qty_ordered }}</td>
        <td width="100" ></td>
      </tr>

      <tr><td colspan="2">&nbsp;</td></tr>

      <tr>
        <td colspn="2"><span style="font-weight: 900;">Delivery</span></td>
      </tr> 
      <tr>
        <td> - {{ pickupSuburb }} </td>
        <td class="price"> FREE </td>
      </tr>
      <tr>
        <td colspn="2"><span style="font-weight: 900;">Return (at end of storage)</span></td>
      </tr> 
      <tr>
        <td> - {{ returnSuburb }}</td>
        <td width="100" >${{  storageReturnFee  }}<br />per module</td>
      </tr>    
    </table>

    <p>For prepayments of 12 or 24 months, discounts of up to 15% are available</p>
    <p style="margin-top:12px;margin-bottom: 40px"><el-checkbox v-model="prepayment_interest"></el-checkbox> Tick to register your interest.</p>
 
  <div style="display:flex; justify-content: space-between; margin-top:20px;">
    <router-link class="btn btn-info btn-rounded" to="/">Back</router-link>
    <router-link class="btn btn-success btn-rounded" to="/submit">Continue</router-link>
  </div>

</div>
</template>

<script>
export default {
  // data() {
  //   return {
  //     prepayment_interest: ''
     
  //   }
  // },
  computed: {
    costs() {
     return this.$store.getters.getCost;
    },
    extraProducts() {
        let products =  this.$store.getters.getCartProducts('extra')
        
        products.forEach(function(product){
          let P = _.filter(PRODUCTS,{id: product.product_id})
          product.options = P[0].options
			})
        
      return products
    },
    locationPremium(){
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
    service() {
      return this.$store.state.service
    },
    pickupSuburb() {
      return this.$store.getters.pickupSuburb
      
    },
    returnSuburb() {
      return this.$store.getters.returnSuburb
      
    },
    prepayment_interest: {
      get() {
        return this.$store.state.prepayment_interest
      },
      set(value){
        this.$store.dispatch('updatePrepaymentInterest',value)
      }
    }


    

   
  },
  methods: {

    getProperty(prop,group){

      var item = this.itemInfo(group)
      
      if(item !== null && typeof item === 'object' && item.hasOwnProperty(prop) ) {
        return item[prop]
      } 
    },
    
    itemInfo(product_group) {
      // Return the product option for the matching cart item 
      // Match option to cart item by QTY value
      let product = _.find(PRODUCTS,['product_group',product_group]);
      
      if (product && this.$store.state.cart.products.hasOwnProperty(product.id)){
        return this.$store.state.cart.products[product.id]
      }
    }

  }
 

}
</script>
