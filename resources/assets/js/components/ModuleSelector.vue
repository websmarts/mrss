<template>
<div>
  <div><slot></slot></div>
  <div style="display:flex; padding:10px; border:1px solid #444; background: #ededed">
    <div style="flex:.5"><span style="font-size: 160%" @click="expanded = !expanded" class="glyphicon" v-bind:class="expandedClass" aria-hidden="true"></span></div>
    <div style="flex:1"><img src="/images/no_image_tn.jpg"></div>
    <div style="flex:3">
      <select :value="selected.code" @input="selectProduct($event.target.value)" class="form-control" placeholder="Select ...">
        <option value="">Select ...</option>
        <option :value="opt.code" v-for="opt in product.options">{{ opt.description }} (${{ opt.price }})</option>
      </select>
    </div>
    
    
  </div>

  <transition name="slide-fade">
  <div v-if="expanded" style="padding:20px; border: 1px solid #222; border-left: 10px solid #222 " >


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
      selected: {},
      qty: 0,
      price: 0

    }
  },
  computed: {
  
    expandedClass() {
      if(this.expanded){
        return {
            'glyphicon-collapse-down': true,
            'glyphicon-expand': false
          }
      }
      return {
            'glyphicon-collapse-down': false,
            'glyphicon-expand': true
          }
    },
  },
  methods: {
    selectProduct(code){
      //console.log('Selected code=',code)
      if(!code){
        this.qty = 0
        this.selected = {} 
        this.price = 0 
      } else {
        this.qty = 1
        this.selected = _.find(this.product.options,['code',code])
        this.price=this.selected.price
      }  
      
      this.$store.dispatch('updateCartProducts',{id: this.product.id,code:code,qty: this.qty,price: this.price})
    }  
  },
  
}

</script>

<style>



</style>
