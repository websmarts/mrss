<template>
<div>
  
  <div style="display:flex; padding:10px; border:1px solid #444; background: #ededed">
    <div style="flex:.5"><span style="font-size: 160%" @click="expanded = !expanded" class="glyphicon" v-bind:class="expandedClass" aria-hidden="true"></span></div>
    <div style="flex:1"><img src="/images/no_image_tn.jpg"></div>
    <div style="flex:2"> {{ product.name }}</div>
    
    <div style="flex:1">
      <div style="display: flex">
        <button  class="btn btn-primary left-rounded" @click="decrement"><span style="font-size:14px" class="glyphicon glyphicon-minus"></span></button>
        <div  style=" text-align: center; font-size:24px;font-weight:900" >{{ ordered }}</div>
        <button    class="btn btn-primary right-rounded"  @click="increment"><span style="font-size:14px"  class="glyphicon glyphicon-plus"></span></button>
      </div>
      <div style="text-align: center; padding-top:15px;font-size:75%" v-show="product.options[0].price">( ${{ product.options[0].price.toFixed(2) }} ea)</div>
      
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
      
    }
  },
  computed: {
    ordered() {
       return this.$store.getters.getCartProductQuantity(this.product.id);
    },
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
    increment() {
  
      this.$store.dispatch('incrementProductQty',this.product)
    },
    decrement() {
      this.$store.dispatch('decrementProductQty',this.product) 
    }
  }
 
}

</script>

<style>



</style>
