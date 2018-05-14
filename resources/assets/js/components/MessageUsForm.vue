<template>
<div>

<form class="form-horizontal" @submit.prevent="submit" @keydown="form.errors.clear($event.target.name)">

  <div class="row">
    <div class="col-sm-2"><span class="label">Name</span><span class="required">*</span></div>
    <div class="col-sm-5" ><el-input name="firstname" placeholder="First" v-model="form.inputs.firstname"></el-input>
    <span style="color: red" v-if="form.errors.has('firstname')" v-text="form.errors.get('firstname')"></span></div>
    <div class="col-sm-5" ><el-input  name="lastname" placeholder="Last" v-model="form.inputs.lastname"></el-input>
    <span style="color: red" v-if="form.errors.has('lastname')" v-text="form.errors.get('lastname')"></span></div>
  </div>

  
  <div class="row">
    <div class="col-sm-2"><span class="label">Email</span><span class="required">*</span></div>
    <div class="col-sm-5" ><el-input  name="email" v-model="form.inputs.email"></el-input>
    <span style="color: red" v-if="form.errors.has('email')" v-text="form.errors.get('email')"></span></div>
  </div>

  <div class="row">
    <div class="col-sm-2"><span class="label">Phone</span><span class="required">*</span></div>
    <div class="col-sm-5" ><el-input  name="phone" v-model="form.inputs.phone"></el-input>
    <span style="color: red" v-if="form.errors.has('phone')" v-text="form.errors.get('phone')"></span></div>
  </div>

  

  

  <div class="row">
    <div class="col-sm-2"><span class="label">Message</span><span class="required">*</span></div>
    <div class="col-sm-5" >
        <el-input  name="message" type="textarea" :rows="2" :maxlength="max_message_length" :value="form.inputs.message" @input="setMessage"></el-input>
    <div class="character-counter">Characters left:  {{max_message_length - form.inputs.message.length}} / {{ max_message_length }}</div>
    <span style="color: red" v-if="form.errors.has('message')" v-text="form.errors.get('message')"></span></div>
  </div>
  
  
  <div style="display:flex; justify-content: space-between; margin-top:20px">
 
    <button type="submit" class="btn btn-success btn-rounded" >Submit</button>
    <button type="reset" class="btn btn-success btn-rounded" >Clear details</button>
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
  firstname: "",
  lastname: "",
  email: "",
  phone: "",
  message: ""
};

export default {
  data() {
    return {
      form: new Form(formFields),
      max_message_length: 400
     
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

      let data = {
        form_data: this.form.getData(),
        
      }

      // console.log('Submitting',data)
    
      axios.post('/api/message_us', data)
        .then(response => {
          // console.log(response.data);
          alert('Your details have been submitted')

          window.location = '/thankyou' // for now!

          //this.hide()
          //return response.data;
        })
        .catch(error => {
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
.label {
    color: #5893E7;
    font-size:120%;
}
.character-counter {
    text-align: right;
    font-size:90%;
    color: #666;
}

</style>
