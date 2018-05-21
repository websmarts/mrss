<template>
<div>

<form  @submit.prevent="submit" @keydown="form.errors.clear($event.target.name)">

 <div class="row">
     <div class="col-sm-4"><span class="labels">Please choose</span><span class="required">*</span><br />
     <span class="notes">Do you want your Modules returned to your address for unloading or would you like to collect your goods from our facility?</span>
     </div>
    <div class="col-sm-5" >
        <el-select v-model="form.inputs.return_option" placeholder="Select your preference">
            <el-option
            v-for="item in return_options"
            :key="item.value"
            :label="item.label"
            :value="item.value">
            </el-option>
        </el-select>
    </div>


 </div>

  <div class="row">
    <div class="col-sm-4"><span class="labels">Name</span><span class="required">*</span></div>
    <div class="col-sm-5" ><el-input name="firstname" placeholder="First" v-model="form.inputs.firstname"></el-input>
    <span style="color: red" v-if="form.errors.has('firstname')" v-text="form.errors.get('firstname')"></span></div>
    <div class="col-sm-5 col-sm-offset-4" ><el-input  name="lastname" placeholder="Last" v-model="form.inputs.lastname"></el-input>
    <span style="color: red" v-if="form.errors.has('lastname')" v-text="form.errors.get('lastname')"></span></div>
  </div>

  
  <div class="row">
    <div class="col-sm-4"><span class="labels">Email</span><span class="required">*</span></div>
    <div class="col-sm-5" ><el-input  name="email" v-model="form.inputs.email"></el-input>
    <span style="color: red" v-if="form.errors.has('email')" v-text="form.errors.get('email')"></span></div>
  </div>

  <div class="row">
    <div class="col-sm-4"><span class="labels">Phone</span><span class="required">*</span></div>
    <div class="col-sm-5" ><el-input  name="phone" v-model="form.inputs.phone"></el-input>
    <span style="color: red" v-if="form.errors.has('phone')" v-text="form.errors.get('phone')"></span></div>
  </div>

  <div class="row">
    <div class="col-sm-4" ><span class="labels">Preferred date</span><span class="required">*</span></div>
     <div class="col-sm-5">
      <el-date-picker     
        name="return_date" 
        v-model="form.inputs.return_date"
        minDate="new Date()"
        type="date"
        placeholder="Pick a day">
      </el-date-picker>
      <div v-if="form.errors.has('return_date')">
      <span style="color: red"  v-text="form.errors.get('return_date')"></span></div>
    </div>
  </div>

  <div class="row" v-show="form.inputs.return_option ==1">
    <div class="col-sm-4"><span class="labels">Return address</span><span class="required">*</span></div>
    <div class="col-sm-5" >
        <el-input  name="address" type="textarea" :rows="2"  v-model="form.inputs.address" ></el-input>

    <span style="color: red" v-if="form.errors.has('address')" v-text="form.errors.get('address')"></span></div>
  </div>

   

  <div class="row">
    <div class="col-sm-4"><span class="labels">Message</span></div>
    <div class="col-sm-5" >
        <el-input  name="message" type="textarea" :rows="2" :maxlength="max_message_length" :value="form.inputs.message" @input="setMessage"></el-input>
    <div class="character-counter">Characters left:  {{max_message_length - form.inputs.message.length}} / {{ max_message_length }}</div>
    <span style="color: red" v-if="form.errors.has('message')" v-text="form.errors.get('message')"></span></div>
  </div>

  
  

  <div style="display:flex; justify-content: space-around; margin-top:20px">
    <button type="reset" class="btn btn-info btn-rounded" >Clear details</button>
    <button type="submit" class="btn btn-success btn-rounded" :class="{disabled: submitting_form}" >{{ submit_button_text}}</button>  
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
  return_option: 1,
  firstname: "",
  lastname: "",
  email: "",
  phone: "",
  return_date: "",
  
  message: ""
};

export default {
  data() {
    return {
      form: new Form(formFields),
      max_message_length: 400,
      return_options: [
          {value: 1, label:'Return Modules to me'},
          {value: 2, label:'I will collect my goods'},
      ],
      submitting_form: false,
      submit_button_text: 'Submit'

     
    };
  },
  methods: {
    cancel() {
      this.form.cancel();
      this.$emit("cancel");
    },
    setMessage(message){
        let msg = message.substr(0,this.max_message_length)
         
             this.form.update({'message': msg})
             
         

    },
    
    
    
    submit() {
      // Save the data

     

      // Clear out all previous errors
      this.form.errors.clear('all')

      let formdata = this.form.getData()

      formdata.return_option = _.find(this.return_options,{value:formdata.return_option}).label

      let data = {
        form_data: formdata,
        
      }

      // console.log('Submitting',data)
      this.submitting_form = true
      this.submit_button_text='Please wait ...'
    
      axios.post('/api/book_return', data)
        .then(response => {
          // console.log(response.data);
          // alert('Your details have been submitted')

          window.location.replace('/thankyou')  // for now!

          //this.hide()
          //return response.data;
        })
        .catch(error => {
          this.submitting_form = false
          this.submit_button_text = "Submit"
          // console.log(error.response)
          // console.log("DATA ERRORS", error.response.data.errors);
          // alert(error.response.data.message)
          this.form.errors.set(error.response.data.errors);
        });
    }
  }
};
</script>

<style>
.required {
    color: red;
}
.labels {
    color: #5893E7;
    font-size:130%;
    font-weight:600;
}
.character-counter {
    text-align: right;
    font-size:90%;
    color: #666;
}

</style>
