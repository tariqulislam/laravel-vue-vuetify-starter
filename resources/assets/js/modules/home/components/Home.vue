<template>
  <v-container grid-list-xl>
    <v-card>
      <v-card-actions class="justify-center">
        <v-layout row wrap>
          <v-flex v-bind:style="{ backgroundImage: 'url(' + backgroundImages + ')' }" md6></v-flex>
          <v-flex md6>
            <v-flex class="heading">
               <h1>Login to Theo Parcel</h1>
            </v-flex>
         
            <v-flex xs12>
               <div class="errorMsg" v-if="this.LoginStore.isError">{{ this.LoginStore.message }}</div>
              <div>
                <v-text-field
                  box
                  v-model.trim="email_address"
                  placeholder="Enter email address here"
                  filled
                  label="Email Address"
                ></v-text-field>
                <div class="requiredField" v-if="$v.email_address.$dirty">
                  <div v-if="!$v.email_address.required">*Email Address is required</div>
                  <div v-if="!$v.email_address.email">*Invalid Email Address</div>
                </div>
              </div>
              <div>
                <v-text-field
                  box
                  v-model.trim="password"
                  type="password"
                  placeholder="*****"
                  filled
                  label="Password"
                ></v-text-field>
                <div class="requiredField" v-if="$v.password.$dirty">
                  <div v-if="!$v.password.required">*Password is required</div>
                </div>
              </div>
            </v-flex>
              <v-flex xs12>
                <v-btn class="warning">Reset</v-btn>
                <v-btn @click="onLoginSubmit" class="success">Login</v-btn>
              </v-flex>
          </v-flex>
        </v-layout>
      </v-card-actions>
    </v-card>
  </v-container>
</template>
<script>
import { mapState } from "vuex";
import { required, email } from "vuelidate/lib/validators";

export default {
  data() {
    return {
      backgroundImages: require("../../../static/images/courier-850x476.png"),
      email_address: "",
      password: "",
      isError: "",
      message: ""
    };
  },
  validations: {
    email_address: { required, email },
    password: { required }
  },
  computed: {
    ...mapState({
      LoginStore: 'LoginStore'
    })
  },
  methods: {
    onLoginSubmit() {
      this.$v.$touch();

      if(this.$v.$invalid === false) {
        this.$store.dispatch('loginToMerchantAccount', {
          email_address: this.email_address,
          password: this.password,
          _token: window.Laravel.content
        })
      }
    }
  }
};
</script>

<style>
.requiredField {
  margin-top: -19px;
  margin-bottom: 10px;
  color: red;
  font-size: 17px;
}

.errorMsg {
    font-size: 17px;
    color: red;
    padding-top: 10px;
    padding-bottom: 10px;
    margin-bottom: 20px;
    padding-left: 10px;
    padding-right: 5px;
    font-weight: bold;
    background-color: wheat;
}
.heading {
    background-color: #d8d8d8;
    padding: 10px;
}
</style>
