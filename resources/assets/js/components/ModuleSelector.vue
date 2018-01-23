<template>
<div>
  <div><slot></slot></div>
  <div style="display:flex; padding:10px; border:1px solid #48c; background: #ededed">
    <div style="flex:.5"><span style="font-size: 160%" @click="expanded = !expanded" class="glyphicon" v-bind:class="expandedClass" aria-hidden="true"></span></div>
    <div style="flex:1">THUMB</div>
    <div style="flex:2">
      <select v-model="selected" class="form-control">
        <option value="0">Select  ...</option>
        <option :value="opt.code" v-for="opt in product.options">{{ opt.description }}:{{ opt.price }}</option>
      </select>
    </div>
    
    
  </div>

  <transition name="slide-fade">
  <div v-if="expanded" style="padding:20px; border: 1px solid #222; border-left: 10px solid #222 " >


    <div style="display: flex;">
      <div style="flex:1"> Large IMAGE </div>
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
      selected: ''
      
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
    
  },
  mounted() {
    //console.log('Product',this.product)
  }
 
}

</script>

<style>



</style>
