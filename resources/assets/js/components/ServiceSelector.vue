<template>
<div>
  <div id="service-selector">
    <el-radio-group :value="service" @input="setService" >
      <el-radio   label="storage" border>Storage</el-radio>
      <el-radio   label="removal" border>DIY Removal</el-radio>
    </el-radio-group>
  </div>
    
  
  <div v-show="!service" >
  
  <p>Select <strong>Storage</strong> option if you require us to store your storage modules for you</p>

  <p>Select <strong> DIY Removal</strong> if you do not require us to provide storage for your modules and only require us to deliver them to a location of your choosing. </p>


  </div>

  
</div>
</template>

<script>

export default {
  
  computed: {
    service() {
      return this.$store.getters.getService;
    }
  },
  methods: {
    setService(service) {
      this.$store.commit('SET_SERVICE',service);
    },
  },

  
}

</script>

<style>
.el-radio-group {
  width: 90%;
}
.is-bordered {
  width: 45%;
}

</style>