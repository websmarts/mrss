<template>
<div>
    <h4>Enquiry Summary</h4>
    <p style="font-weight: 900"> Storage fee (Weekly) : ${{  costs.weekly.toFixed(2) }}</p>

    <p>Includes:</p>
    Number of storage modules: {{ itemQty('storage-module') }}<br />
    Number of removal modules: {{  itemQty('removal-module')  }}<br />
    Number of insurance units: {{  itemQty('insurance')  }}<br />


    <p style="font-weight 900">Packing Supplies and Extras:  ${{  costs.fixed.toFixed(2) }}</p>
    <ul>
      <li v-for="product in extraProducts"> {{ productInfo(product.id).description }} (${{ product.price }}), X {{ product.qty }}</li>
    </ul>

    <h5>Transport:</h5>

    <p >For prepayments of 12 or 24 months, discounts of up tp 15% are available<br />
      <el-checkbox v-model="prepayment_interest"></el-checkbox> Tick to register your interest.
    </p>
  <div><router-link class="btn btn-success btn-rounded" to="/submit">Continue final submit</router-link></div>
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
   
   

    
    
  },
  methods: {
    productInfo(pid){
      return _.find(PRODUCTS,['id',pid])
    },
    itemQty(product_type) {
      // return the number of storage modules in cart
      let product = _.find(PRODUCTS,['product_type',product_type]);
      let qty = null
      if (product && this.$store.state.cart.products.hasOwnProperty(product.id)){
        qty = this.$store.state.cart.products[product.id].qty
      }
      return qty
    }

  }
 

}
</script>
