<template>
<div>
    <h4>Enquiry Summary</h4>
    <h5> Storage fee (Weekly)</h5>
    <p>Includes:</p>


    <h5>Paching Supplies and Exras:</h5>

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
    storageProducts() {
      // cart product_i  where product_type='module'
      const id = _.find(PRODUCTS,['product_type','storage_module'])
        console.log('ID',id)
    },
    extraProducts(){

    },
    insuranceProducts() {

    }
    
  }

}
</script>
