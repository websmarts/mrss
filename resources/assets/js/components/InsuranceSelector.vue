<template>
<div>

  <div class="list-item" >
      <div class="control"  @click="expanded = !expanded" ><span class="glyphicon" v-bind:class="expandedClass" aria-hidden="true"></span></div>  
      <div class="body">
        <div class="body-top">
          <div class="thumb"><img :src="product.image_path" class="responsive"></div>

            <select :value="cartQty" @input="selectProduct($event.target.value)" class="form-control" placeholder="Select ...">
              <option value="0">Select ...</option>
              <option :value="opt.qty" v-for="opt in product.options" :key="opt.id">{{ opt.description }} (${{ (opt.price).toFixed(2) }}pw each)</option>
            </select>
        </div><!-- end body-top -->
        
        <el-collapse-transition>
          <div v-if="expanded" class="body-bottom my-list-item-expanded" >


            <div style="display: flex;">
              
              <div style="flex:1" v-html="product.options[0].description"></div>
              <div style="flex:1"><img :src="product.image_path" class="item-image-large"></div>
            </div>
            <div v-html="product.notes"></div>

          </div>
        </el-collapse-transition>
      </div><!-- end body -->
    
  </div><!-- end list-item -->

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