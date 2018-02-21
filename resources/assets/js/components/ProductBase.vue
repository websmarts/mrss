<template>
<div>

  

  
  <div class="my-list-item" style="display:flex">
    <div style="flex:.5"><span  @click="expanded = !expanded" class="glyphicon" v-bind:class="expandedClass" aria-hidden="true"></span></div>
    <div style="flex:1"><img src="/images/no_image_tn.jpg"></div>
    <div style="flex:2">
      {{ product.name }}<br />
      {{ product.options[0].description }}<br />
     

    </div>
    
    <div style="flex:1">
      <!-- <div style="display: flex">
        <button  class="btn btn-primary left-rounded" @click="decrement"><span style="font-size:14px" class="glyphicon glyphicon-minus"></span></button>
        <div  style=" width:1.2em; text-align: center; font-size:24px;font-weight:normal;padding-top:4px;" >{{ ordered }}</div>
        <button    class="btn btn-primary right-rounded"  @click="increment"><span style="font-size:14px"  class="glyphicon glyphicon-plus"></span></button>
      </div>
      <div style="text-align: center; padding-top:15px;font-size:75%" v-show="product.options[0].price">( ${{ product.options[0].price.toFixed(2) }} ea)</div> -->
      <el-input-number :value="ordered" @change="handleChange" :min="0" ></el-input-number> 
      <p style="text-align: center; font-size:75%">
      (${{ product.options[0].price.toFixed(2) }} @ea)</p>

      <p style="text-align: center"><a @click="expanded = !expanded" >{{ expanded ? 'hide' : 'show' }} details</a></p>
    </div>

  </div>


  <el-collapse-transition>
    <div v-if="expanded" class="my-list-item-expanded" >


      <div style="display: flex;">
        <div style="flex:1"><img src="/images/no_image.jpg"></div>
        <div style="flex:1" v-html="product.options[0].description"></div>
      </div>
      <div v-html="product.notes"></div>

    </div>
  </el-collapse-transition>

</div>
</template>

<script>

export default {
  props: ['product'],
  data() {
    return {
      expanded: false,
      quantity: 0,
      activeNames:'',
      
      
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
    handleCollapseChange(panel){
      console.log('panel',panel)
    },
    handleChange(qty) {
     
     console.log(qty)
      let payload = {
        'id': this.product.id,
        'qty': qty,
        'payment_code': this.product.options[0].payment_period,
        'price': this.product.options[0].price

      }
      this.$store.dispatch('setProductQty', payload)
    },
    // increment() {
  
    //   this.$store.dispatch('incrementProductQty',this.product)
    // },
    // decrement() {
    //   this.$store.dispatch('decrementProductQty',this.product) 
    // }
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
