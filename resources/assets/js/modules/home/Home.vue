<template>
  <v-container grid-list-xl>
    <v-card>
      <v-card-actions class="justify-center">
        <v-layout row wrap>
          <v-flex md6>
             <v-img v-bind:src="backgroundImages"></v-img>
          </v-flex>
          <v-flex md6>
              <h1>Login To Theo Parcel</h1>
              <v-flex xs12>
                      <v-text-field
                        box
                        placeholder="User Name"
                        filled
                        label="Email address or User Name"
                      ></v-text-field>
                       <v-text-field
                        box
                        type="password"
                        placeholder="*****"
                        filled
                        label="Password"
                      ></v-text-field>
                    </v-flex>
                    <v-layout row wrap>
                    <v-flex xs12>
                      <v-btn class="success">Login</v-btn>
                      <v-btn class="warning">Reset</v-btn>
                    </v-flex>
                  </v-layout>
                 
          </v-flex>
        </v-layout>
         
      </v-card-actions>
    </v-card>
  </v-container>
</template>
<script>
export default {
  data () {
    return {
      backgroundImages: require('../../static/images/courier-850x476.png')  
    }
    
  } 

};
</script>
