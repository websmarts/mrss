<template>
<div>
  
  <div class="my-list-item" style="display:flex">
    <div style="flex:.5"><span  @click="expanded = !expanded" class="glyphicon" v-bind:class="expandedClass" aria-hidden="true"></span></div>
    <div style="flex:1"><img :src="product.image_path" class="item-image-small"></div>
    <div style="flex:3">
       <select :value="cartQty" @input="selectProduct($event.target.value)" class="form-control" placeholder="Select ...">
        <option value="0">Select ...</option>
        <option :value="opt.qty" v-for="opt in product.options">{{ opt.description }} (${{ opt.price }})</option>
      </select>
    </div>
    
  </div>


  <transition name="slide-fade">
  <div v-if="expanded" class="my-list-item-expanded"  >


    <div style="display: flex;">
      <div style="flex:1"><img :src="product.image_path" class="item-image-large"</div>
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
      let selectedOption = {}
           
      if(qty > 0){  
        selectedOption = _.find(this.product.options,['qty', qty])
        selectedOption.qty_ordered = 1
      } else {
        selectedOption = {product_id: this.product.id, qty_ordered: 0 }
      } 

      this.$store.dispatch('updateCartProducts', selectedOption)
    }  
  },
  
}
 


</script>