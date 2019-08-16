<template>
  <div>
      <v-snackbar
      v-model="snackbar"
      :color="red"
      :multi-line="mode === 'multi-line'"
      :timeout="timeout"
      :vertical="mode === 'vertical'"
    >
      {{ message }}
      <v-btn
        dark
        flat
        @click="snackbar = false"
      >
        Close
      </v-btn>
    </v-snackbar>
    <v-container>
      <v-card>
        <v-container grid-list-md>
          <v-layout row wrap>
            <v-flex xs12>
              <v-text-field
                v-model="firstName"
                box
                placeholder="First Name"
                filled
                label="Enter First Name"
              ></v-text-field>
            </v-flex>
            <v-flex xs12>
              <v-text-field
                v-model="lastName"
                box
                placeholder="Enter last name"
                filled
                label="Last Name"
              ></v-text-field>
            </v-flex>
            <v-flex xs12>
              <v-text-field
                v-model="email"
                box
                placeholder="Email address"
                filled
                label="Enter Email Address"
              />
            </v-flex>
            <v-flex xs12>
              <v-text-field
                v-model="userName"
                box
                placeholder="Enter User Name"
                filled
                label="User Name"
              />
            </v-flex>
             <v-flex xs12>
              <v-text-field
                v-model="contactNo"
                box
                placeholder="Enter Contact No"
                filled
                label="Contact No"
              />
            </v-flex>
             <v-flex xs12>
              <v-text-field
                v-model="address"
                box
                placeholder="Enter address "
                filled
                label="Address"
              />
            </v-flex>
            <v-flex xs12>
              <v-text-field
                v-model="password"
                box
                type="password"
                placeholder="********"
                filled
                label="Password"
              />
            </v-flex>
            <v-flex xs12>
              <v-text-field
                v-model="retypePassword"
                box
                type="password"
                placeholder="********"
                filled
                label="Retype Password"
              />
            </v-flex>
             
            
            <v-flex xs12>
              <v-btn @click="onSubmitForm" color="success">Submit</v-btn>
              <v-btn color="warning">Cancel</v-btn>
            </v-flex>
          </v-layout>
        </v-container>
       
      </v-card>
    </v-container>
  </div>
</template>

<script>
import {required, email, sameAs} from 'vuelidate/lib/validators'
export default {
  mounted() {
    console.log("Component mounted.");
  },
  data() {
    return {
      firstName: "",
      lastName: "",
      email: "",
      password: "",
      userName: "",
      contactNo: "",
      address: "",
      retypePassword: "",
      snackbar: false,
      message: ""
    };
  },
  validations: {
      firstName: {required},
      lastName: {required},
      email: {required, email},
      password: {required},
      userName: {required},
      contactNo: {required},
      address: {required},
      retypePassword: {
        required,
        sameAsPassword: sameAs("operator_password")
      }
  },
  methods: {
    onSubmitForm() {
      if (this.firstName === "") {
        this.snackbar = true;
        this.message = "First Name is Required";
      } else if(this.lastName === "") {
        this.snackbar = true;
        this.message = "Last Name is Required";
      } else if(this.email === "") {
           this.snackbar = true;
        this.message = "Email Address is Required";
      } else if(this.password == "" || (this.password !== this.retypePassword)) {
          this.snackbar = true;
          this.message = "Password Field is required or password is not match with retype password";
      } else {
          this.snackbar = true;
          this.message = "All Information submit successfully";
      }
    }
  }
};
</script>