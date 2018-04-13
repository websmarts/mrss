<template>
<div>

  

  
  <div class="list-item" >
    <div class="control" @click="expanded = !expanded"><span   class="glyphicon" v-bind:class="expandedClass" aria-hidden="true"></span></div>  
    <div class="body">
      <div class="body-top">
        <div class="thumb"><img :src="product.image_path" class="responsive"></div>

          <div class="description">
            {{ product.name }}<br />
            {{ product.options[0].description }}<br />
          </div>
          
          <div class="inputs">
            <el-input-number :value="cartQty" @change="handleChange" :min="0" ></el-input-number> 
            <p style="text-align: center; font-size:75%">
            ($ {{ product.options[0].price.toFixed(2) }} @ea)</p>

            <!-- <p style="text-align: center"><a @click="expanded = !expanded" >{{ expanded ? 'hide' : 'show' }} details</a></p> -->
          </div>
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
      quantity: 0,
      activeNames:''
      
      
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
    
    handleChange(qty) {  

      var option = _.clone(this.product.options[0])
      option.qty_ordered = qty
      this.$store.dispatch('updateCartProducts', option)
    },
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
  background: #00629A;
  color: #fff;
  font-weight: 800;
  cursor: pointer;
  font-size: 16px;
}
.el-input-number__increase:hover, .el-input-number__decrease:hover {
  color:#eee;
}

</style>
