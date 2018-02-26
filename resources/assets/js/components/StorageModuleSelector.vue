<template>
<div>
  <div class="my-list-item" style="display:flex;">
    <div style="flex:.5"><span @click="expanded = !expanded" class="glyphicon" v-bind:class="expandedClass" aria-hidden="true"></span></div>
    <div style="flex:1"><img :src="product.image_path" width="75"></div>
    <div style="flex:3">
      <select :value="cartQty" @input="selectProduct($event.target.value)" class="form-control" placeholder="Select ...">
        <option value="">Select ...</option>
        <option :value="opt.qty" v-for="opt in product.options">{{ opt.description }} (${{ opt.price }})</option>
      </select>
    </div>
    
    
  </div>

  <transition name="slide-fade">
  <div v-if="expanded" class="my-list-item-expanded" >


    <div style="display: flex;">
      <div style="flex:1"><img src="/images/no_image.jpg"></div>
      <div style="flex:1" v-html="product.description"></div>
    </div>
    <div v-html="product.notes"></div>

  </div>
</transition>

</div>
</template>

<script>
export default {
  props: ['product'],
  data() {
    return {
      expanded: false,

    }
  },
  computed: {

    cartQty() {
      return this.$store.getters.getCartProductQuantity(this.product.id);
    },
  
    expandedClass() {
      if(this.expanded){
        return {
            'glyphicon glyphicon-menu-down': true,
            'glyphicon glyphicon-menu-right': false
          }
      }
      return {
            'glyphicon glyphicon-menu-down': false,
            'glyphicon glyphicon-menu-right': true
          }
    },
  },
  methods: {
     selectProduct(strqty){
      const qty = parseInt(strqty)
      let selectedOption = _.find(this.product.options,['qty', qty])
      this.$store.dispatch('updateCartProducts',{id: this.product.id,qty: qty, ext_price: selectedOption.price})
    }  
  },
  
}

</script>

<style>



</style>
