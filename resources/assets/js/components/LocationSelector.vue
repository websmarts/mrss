<template>
<div>
  <slot></slot>

  <select class="form-control" :value="value" @input="updateLocation($event.target.value)">
    <option value="Rokeby">Rokeby</option>
    <option value="Warragul">Warragul</option>
  </select>
</div>
</template>

<script>

export default {
  props:['value'],
  methods: {
    updateLocation: function(location) {
      this.$emit('input',location)
    }
  }



}


</script>