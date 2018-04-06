<template>
<div>
    <h4>DIY Removal Summary</h4>

    {{ pickupSuburb }}
    {{ returnSuburb }}

    <table class="table">
      <tr>
        <td><span style="font-weight: 900;">DIY Removal Fee:</span></td>
        <td><span style="width: 100px;font-weight: 900; font-size: 110%;color: #f48">${{ removalFee }}</span></td>
      </tr>
    

      <tr><td colspan="2">&nbsp;</td></tr>

      <tr>
        <td colspn="2"><span style="font-weight: 900;">Packing Supplies and Extras:</span></td>
      </tr> 
      
      <tr v-for="product in extraProducts" :key="product.id">
        <td> {{ product.name }} {{ product.description }}  X {{ product.qty_ordered }}</td>
        <td>${{ product.ext_price }}</td>
      </tr>

      
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
        return this.$store.getters.getCartProducts('extra')
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
