<template>
<div>
  
  <slot></slot>
  <select class="form-control" :value="value.id" @input="updateLocation($event.target.value)">
    <option value="0">Select location ...</option>
    <option v-for="location in locations()" :value="location.id" v-html="location.suburb"></option>
  </select>
  <slot name="notes"></slot>
</div>
</template>

<script>

export default {
  props:['value'],
  methods: {
    updateLocation: function(locationId) {
      
      var location = {id:0} // default to no location

      if(locationId > 0){
        location = _.find(LOCATIONS,['id',parseInt(locationId)])
      }
    
      this.$emit('update',location)
    },
    locations() {
      return LOCATIONS;
    },
    showNotes() {
      this.$notify({
        title: 'Location guide',
        message: 'This is a message that exlains some more information about location selection costs and options',
        duration: 0
      });
    }
  }
}
</script>