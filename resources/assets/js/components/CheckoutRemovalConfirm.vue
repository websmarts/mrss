<template>
<div>
    <h4>DIY Removal Summary</h4>

<p style="text-align: right; padding-right: 8px; font-size:90%">Drop-off location: {{ pickupSuburb }}<br />Return location: {{ returnSuburb }}</p>

    <table class="table">
      <tr>
        <td><span style="font-weight: 900;">DIY Removal Fee:</span></td>
        <td width="100" class="price">${{ removalFee }}</td>
      </tr>
    

      <tr><td colspan="2">&nbsp;</td></tr>

  <template v-if="extraProducts.length">
      <tr>
        <td><span style="font-weight: 900;">Packing Supplies and Extras:</span></td>
        <td width="100">${{ costs.fixed.toFixed(2) }}</td>
      </tr> 
      
      <tr v-for="product in extraProducts" :key="product.id">
        <td> {{ product.name + ', '+ product.options[0].description | truncate(40) }}  X {{ product.qty_ordered }}</td>
       <td width="100" ></td>
      </tr>
  </template>
      
    </table>

 
  <div style="display:flex; justify-content: space-between;margin-top:20px;">
    <router-link class="btn btn-info btn-rounded" to="/">Back</router-link>
    <router-link class="btn btn-success btn-rounded" to="/submit">Continue</router-link>
  </div>

</div>
</template>

<script>
export default {
  data() {
    return {
      prepayment_interest: ''
     
    }
  },
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
    service() {
      return this.$store.state.service
    },
    removalFee() {
      let fee = parseFloat(this.$store.getters.getRemovalFee);
      if ( isNaN(fee) ){
        return this.$store.getters.getRemovalFee
      } else {
        return fee.toFixed(2);
      }
        
    },
    pickupSuburb() {
      return this.$store.getters.pickupSuburb
      
    },
    returnSuburb() {
      return this.$store.getters.returnSuburb
      
    }
   
  },
  methods: {
    
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
