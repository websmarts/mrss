<template>
<div>
  
  <div style="display:flex; padding:10px; border:1px solid #48c; background: #ededed">
    <div style="flex:.5"><span style="font-size: 160%" @click="expanded = !expanded" class="glyphicon" v-bind:class="expandedClass" aria-hidden="true"></span></div>
    <div style="flex:1">THUMB</div>
    <div style="flex:2"> {{ product.name }}</div>
    
    <div style="flex:1; display: flex">
      <button  class="btn btn-primary left-rounded" @click="decrement"><span style="font-size:14px" class="glyphicon glyphicon-minus"></span></button>
      <div  style="flex:1; text-align: center; font-size:24px;font-weight:900" >{{ product.qty }}</div>
      <button    class="btn btn-primary right-rounded"  @click="increment"><span style="font-size:14px"  class="glyphicon glyphicon-plus"></span></button>
    </div>
  </div>


  <transition name="slide-fade">
  <div v-if="expanded" style="padding:20px; border: 1px solid #222; border-left: 10px solid #222 " >


    <div style="display: flex;">
      <div style="flex:1"> IMAGE </div>
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
    cost() {
      return this.product.price * this.product.qty
    },
    expandedClass() {
      if(this.expanded){
        return {
            'glyphicon-circle-arrow-down': true,
            'glyphicon-circle-arrow-right': false
          }
      }
      return {
            'glyphicon-circle-arrow-down': false,
            'glyphicon-circle-arrow-right': true
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
