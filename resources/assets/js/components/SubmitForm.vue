<template>
<div>
<h4>Send Enquiry</h4>
<form class="form-horizontal" @submit.prevent="submit" @keydown="form.errors.clear($event.target.name)">

  <div class="row">
    <div class="col-sm-4">First name*</div>
    <div class="col-sm-7" ><el-input name="firstname" v-model="form.inputs.firstname"></el-input>
    <span style="color: red" v-if="form.errors.has('firstname')" v-text="form.errors.get('firstname')"></span></div>
  </div>

  <div class="row">
    <div class="col-sm-4">Last name*</div>
    <div class="col-sm-7" ><el-input  name="lastname" v-model="form.inputs.lastname"></el-input>
    <span style="color: red" v-if="form.errors.has('lastname')" v-text="form.errors.get('lastname')"></span></div>
  </div>

  <div class="row">
    <div class="col-sm-4">Address*</div>
    <div class="col-sm-7" ><el-input   name="address" v-model="form.inputs.address"></el-input>
    <span style="color: red" v-if="form.errors.has('address')" v-text="form.errors.get('address')"></span></div>
  </div>

  <div class="row">
    <div class="col-sm-4">Suburb*</div>
    <div class="col-sm-7" ><el-input  name="suburb" v-model="form.inputs.suburb"></el-input>
    <span style="color: red" v-if="form.errors.has('suburb')" v-text="form.errors.get('suburb')"></span></div>
  </div>

  <div class="row">
      <div class="col-sm-4">Postcode</div>
      <div class="col-sm-2" ><el-input  name="postcode" v-model="form.inputs.postcode"></el-input>
      <span style="color: red" v-if="form.errors.has('postcode')" v-text="form.errors.get('postcode')"></span></div>
    
      <div class="col-sm-2 col-sm-offset-1">State</div>
      <div class="col-sm-2" ><el-input name="state"  v-model="form.inputs.state"></el-input>
      <span style="color: red" v-if="form.errors.has('state')" v-text="form.errors.get('state')"></span></div>
  </div>

  <div class="row">
    <div class="col-sm-4">Email*</div>
    <div class="col-sm-7" ><el-input  name="email" v-model="form.inputs.email"></el-input>
    <span style="color: red" v-if="form.errors.has('email')" v-text="form.errors.get('email')"></span></div>
  </div>

  <div class="row">
    <div class="col-sm-4">Phone*</div>
    <div class="col-sm-7" ><el-input  name="phone" v-model="form.inputs.phone"></el-input>
    <span style="color: red" v-if="form.errors.has('phone')" v-text="form.errors.get('phone')"></span></div>
  </div>

  <div class="row">
    <div class="col-sm-4">How did you hear about us?*</div>
    <div class="col-sm-7">
      <el-select  @change="form.errors.clear('howhear')" name="howhear" v-model="form.inputs.howhear" placeholder="Select">
          <el-option
            
            v-for="item in howhearOptions"
            :key="item"
            :label="item"
            :value="item"
            >
          </el-option>
      </el-select>
      <div v-if="form.errors.has('module_delivery_date')">
      <span style="color: red" v-if="form.errors.has('howhear')" v-text="form.errors.get('howhear')"></span></div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-4" >Preferred Module delivey date:</div>
     <div class="col-sm-7">
      <el-date-picker
        @change="deliveryDateChange" 
        name="module_delivery_date" 
        v-model="form.inputs.module_delivery_date"
        minDate="new Date()"
        type="date"
        placeholder="Pick a day"
        :default-value="new Date()">
      </el-date-picker>
      <div v-if="form.errors.has('module_delivery_date')">
      <span style="color: red"  v-text="form.errors.get('module_delivery_date')"></span></div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-4">Comments</div>
    <div class="col-sm-7" ><el-input  name="comments" type="textarea" :rows="2" v-model="form.inputs.comments"></el-input>
    <span style="color: red" v-if="form.errors.has('comments')" v-text="form.errors.get('comments')"></span></div>
  </div>
  
  
  <div style="display:flex; justify-content: space-around; margin-top:20px">
    <router-link class="btn btn-info btn-rounded" to="/">Back</router-link>
    <div v-show="form.errors.hasErrors()"><span style="color: red">*** Correct form errors ***</span></div>
    <button type="submit" class="btn btn-success btn-rounded" :class="{disabled: submitting_form}" >{{submit_button_text}}</button>
  </div>

  
  

</form>
</div>
</template>

<script>
class Errors {
  constructor() {
    this.errors = {};
  }

  set(errors) {
    
    this.errors = errors;
    
  }

  setMessage(field,message){
    
      this.errors[field] = [message]
    
  }

  get(field) {
    if (this.errors.hasOwnProperty(field)) {
      return this.errors[field][0];
    }
  }

  has(field) {
    return this.errors.hasOwnProperty(field)
  }

  count() {
    return Object.keys(this.errors).length
  }

  hasErrors() {
    return this.count() > 0
  }

  clear(field) {
   // console.log('Clearing field:',field)
    if(field && this.errors.hasOwnProperty(field)){
      delete(this.errors[field])
      this.errors = Object.assign({},this.errors)
    } else if(field =='all') {
      this.errors = {}
    }
    
  }
}
class Form {
  constructor(inputs, errors) {
    this.inputs = inputs;
    this.errors = new Errors();
  }

  update(data) {
    for (let input in this.inputs) {
      if (data.hasOwnProperty(input)) {
        this.inputs[input] = data[input];
      }
    }
  }

  cancel() {
    this.reset();
  }

  reset() {
    for (let input in this.inputs) {
      this.inputs[input] = null;
    }
  }

  get(input) {
    return this.inputs[input];
  }

  getData()
  {
    return this.inputs
  }

  
}

let formFields = {
  firstname: "",
  lastname: "",
  address: "",
  suburb: "",
  postcode: "",
  state: "",
  email: "",
  phone: "",
  howhear: "",
  module_delivery_date: "",
  comments: ""
};

export default {
  data() {
    return {
      form: new Form(formFields),
      howhearOptions: HOWHEAROPTIONS,
      submit_button_text: 'Submit enquiry',
      submitting_form: false
    };
  },
  methods: {
    cancel() {
      this.form.cancel();
      this.$emit("cancel");
    },
    deliveryDateChange(date)
    {
      //console.log('DELIVERY DATE CHANGE',date)
      // if(date is in past then update to today)
      this.form.errors.clear('module_delivery_date')

      let now = new Date()
      if(date < now ){
        //alert('invalid date selected - delivery date must be in the future')
        this.form.errors.setMessage('module_delivery_date','Delivery date must be in the future')
        //alert('I repeat - invalid date selected - delivery date must be in the future')
        this.form.inputs.module_delivery_date = now
      }
      
      
    },
    
    submit() {
      // Save the data

     

      // Clear out all previous errors
      this.form.errors.clear('all')

      let data = {
        contact_data: this.form.getData(),
        cart: this.$store.state.cart,
        service: this.$store.getters.getService,
        cost: this.$store.getters.getCost,
        premiums:this.$store.getters.getLocationPremium,
        removal_fee: this.$store.getters.getRemovalFee,
        prepayment_interest: this.$store.state.prepayment_interest
        
      }

      this.submitting_form = true
      this.submit_button_text = "Please wait ..."

      // console.log('Submitting',data)
    
      axios.post('/api/submit', data)
        .then(response => {
          // console.log(response.data);
          //alert('Your details have been submitted')

          window.location.replace ('/thankyou') // for now!

          //this.hide()
          //return response.data;
        })
        .catch(error => {
          this.submitting_form = false
          this.submit_button_text = "Submit enquiry"
          // console.log(error.response)
          // console.log("DATA ERRORS", error.response.data.errors);
          // alert(error.response.data.message)
          
          if(error.response.request.status == 422){
            this.form.errors.set(error.response.data.errors);
          } else {
            // unprocessable error - hmmm what to do now
            alert('Ooops ... an unexpected server error: ' + error.response.request.status + ' occured')
          }
        });
    }
  }
};
</script>
