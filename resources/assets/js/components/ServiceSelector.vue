<template>
<div>

  <h3><slot></slot></h3>
  <div style="display: flex" class="tabs">
    <template v-for="tab in tabs">
      <div style="flex:1"  @click="select(tab)" :class="[selected.name == tab.name ? 'active' : '']">
        {{ tab.name }} &nbsp;<span v-show="selected.name == tab.name" style="font-size: 140%" class="glyphicon glyphicon-ok" ></span>
      </div>
    </template>
    
    
  </div>

</div>
</template>

<script>

export default {
  props:['tabs','activeKey'],
  data() {
    return {
      selected: {}
    }
  },
  methods: {
    select(tab) {
      this.selected=tab
      this.$emit('change', this.selected)
    }, 
  },
  created() {
    // if this.startKey is defined then find the tab with that 
    let findkey = this.activeKey
    let tab = _.find(this.tabs, {'key': findkey})
    console.log('Tab:', tab);
    if(tab){
      this.selected = tab
    }
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