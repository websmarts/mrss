<template>
<div>
  
  <slot></slot>
  <select class="form-control" :value="value" @input="updateLocation($event.target.value)">
    
    <option v-for="location in locations()" value="location.id" v-html="location.suburb"></option>
  </select>
  <slot name="notes"></slot>
</div>
</template>

<script>

export default {
  props:['value'],
  methods: {
    updateLocation: function(location) {
      this.$emit('input',location)
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