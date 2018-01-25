<template>
<div>

  <h4><slot></slot></h4>
  <div>
    <el-radio v-model="radio7" label="1" border>Option A</el-radio>
    <el-radio v-model="radio7" label="2" border>Option B</el-radio>
  </div>
  <div v-show="! selectedService" style="padding-left:60px; font-style: italic">
  
  <p>Select <strong>Storage</strong> option if you require us to store your storage modules for you</p>

  <p>Select <strong> DIY Removal</strong> if you do not require us to provide storage for your modules and only require us to deliver them to a location of your choosing. </p>


  </div>
  <div style="display: flex" class="tabs">
    <template v-for="tab in tabs">
      <div style="flex:1"  @click="select(tab)" :class="[selectedService.name == tab.name ? 'active' : '']">
        {{ tab.name }} &nbsp;<span v-show="selectedService.name == tab.name" style="font-size: 140%" class="glyphicon glyphicon-ok" ></span>
      </div>

     
    </template>
    
    
  </div>
  
</div>
</template>

<script>

export default {
  props:['tabs','selectedService'],
  data() {
    return {
      radio7: ''
    }
  },
  methods: {
    select(tab) {
      this.$emit('input', tab)
    }, 
  }
  
}

</script>

<style>
div.tabs div.active {
  font-weight: bold;
  background: green;
  
}
div.tabs div {
  padding:20px;
  background:#333;
  color: white;
  border: 1px solid #ddd;
}

</style>