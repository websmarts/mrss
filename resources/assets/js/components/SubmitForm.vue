<template>
<div>
<h4>Send Enquiry</h4>
<form class="form-horizontal">

  <div class="row">
    <div class="col-sm-4">First name*</div>
    <div class="col-sm-7" ><el-input v-model="firstname"></el-input></div>
  </div>

  <div class="row">
    <div class="col-sm-4">Last name*</div>
    <div class="col-sm-7" ><el-input v-model="lastname"></el-input></div>
  </div>

  <div class="row">
    <div class="col-sm-4">Address*</div>
    <div class="col-sm-7" ><el-input v-model="address"></el-input></div>
  </div>

  <div class="row">
    <div class="col-sm-4">Suburb*</div>
    <div class="col-sm-7" ><el-input v-model="suburb"></el-input></div>
  </div>

  <div class="row">
      <div class="col-sm-4">Postcode</div>
      <div class="col-sm-2" ><el-input v-model="postcode"></el-input></div>
    
      <div class="col-sm-2 col-sm-offset-1">State</div>
      <div class="col-sm-2" ><el-input v-model="state"></el-input></div>
  </div>

  <div class="row">
    <div class="col-sm-4">Email*</div>
    <div class="col-sm-7" ><el-input v-model="email"></el-input></div>
  </div>

  <div class="row">
    <div class="col-sm-4">Phone*</div>
    <div class="col-sm-7" ><el-input v-model="phone"></el-input></div>
  </div>

  <div class="row">
    <div class="col-sm-4">How did you hear about us?*</div>
    <div class="col-sm-7">
      <el-select v-model="howhear" placeholder="Select">
          <el-option
            v-for="item in howhearOptions"
            :key="item.value"
            :label="item.label"
            :value="item.value"
            :disabled="item.disabled">
          </el-option>
      </el-select>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-4" >Preferred Module delivey date:</div>
     <div class="col-sm-7">
      <el-date-picker
        v-model="module_delivery_date"
        type="date"
        placeholder="Pick a day">
      </el-date-picker>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-4">Comments</div>
    <div class="col-sm-7" ><el-input type="textarea" :rows="2" v-model="comments"></el-input></div>
  </div>
  <div class="row">
    <div class="col-xs-5 col-xs-offset-5"><router-link class="btn btn-success btn-rounded" to="/confirm">Continue</router-link></div>

  </div>
  

</form>
</div>
</template>

<script>
export default {
  data() {
    return {
      firstname: '',
      lastname: '',
      address: '',
      suburb: '',
      postcode: '',
      state: '',
      email: '',
      phone: '',
      howhear: '',
      module_delivery_date: '',
      comments: '',

      howhearOptions: [
        {label: 'Google or internet search', value: 'google'},
        {label: 'Social media', value: 'social'},
      ],
    }
  }
}

</script>