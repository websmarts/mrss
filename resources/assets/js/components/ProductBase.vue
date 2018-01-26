<template>
<div>
  
  <div style="display:flex; padding:10px; border:1px solid #444; background: #ededed">
    <div style="flex:.5"><span style="font-size: 220%" @click="expanded = !expanded" class="glyphicon" v-bind:class="expandedClass" aria-hidden="true"></span></div>
    <div style="flex:1"><img src="/images/no_image_tn.jpg"></div>
    <div style="flex:2"> {{ product.name }}</div>
    
    <div style="flex:1">
      <!-- <div style="display: flex">
        <button  class="btn btn-primary left-rounded" @click="decrement"><span style="font-size:14px" class="glyphicon glyphicon-minus"></span></button>
        <div  style=" width:1.2em; text-align: center; font-size:24px;font-weight:normal;padding-top:4px;" >{{ ordered }}</div>
        <button    class="btn btn-primary right-rounded"  @click="increment"><span style="font-size:14px"  class="glyphicon glyphicon-plus"></span></button>
      </div>
      <div style="text-align: center; padding-top:15px;font-size:75%" v-show="product.options[0].price">( ${{ product.options[0].price.toFixed(2) }} ea)</div> -->
      <el-input-number :value="ordered" @change="handleChange" :min="0" ></el-input-number>
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
      quantity: 0,
      
      
    }
  },
  computed: {
    ordered() {
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
    handleChange(qty) {
     
     console.log(qty)
      let payload = {
        'product': this.product,
        'option': 0,
        'qty': qty
      }
      this.$store.dispatch('setProductQty', payload)
    },
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

.el-input-number {
  max-width:120px;
}
.el-input-number__increase,
.el-input-number__decrease {
  position: absolute;
  z-index: 1;
  top: 1px;
  width: 40px;
  height: auto;
  text-align: center;
  background: #004040;
  color: #fff;
  font-weight: 800;
  cursor: pointer;
  font-size: 16px;
}

</style>
