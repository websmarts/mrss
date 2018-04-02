<template>
<div>
    <h4>DIY Removal Summary</h4>

    <table class="table">
      <tr>
        <td><span style="font-weight: 900;">DIY Removal Fee:</span></td>
        <td><span style="width: 100px;font-weight: 900; font-siz: 110%;color: #f48">${{ costs.weekly.toFixed(2) }}</span></td>
      </tr>
    

      <tr><td colspan="2">&nbsp;</td></tr>

      <tr>
        <td colspn="2"><span style="font-weight: 900;">Packing Supplies and Extras:</span></td>
      </tr> 
      
      <tr v-for="product in extraProducts">
        <td> {{ product.name }} {{ product.description }}  X {{ product.qty_ordered }}</td>
        <td>${{ product.ext_price }}</td>
      </tr>

      
    </table>

 
  <div style="display:flex; justify-content: space-between">
    <router-link class="btn btn-success btn-rounded" to="/submit">Continue final submit</router-link>
    <router-link class="btn btn-info btn-rounded" to="/">Back to booking</router-link>
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
        return this.$store.getters.getCartProducts('extra')
    },
    locationPremium(){
      return this.$store.getters.getLocationPremium;
    },
    service() {
      return this.$store.state.service
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
