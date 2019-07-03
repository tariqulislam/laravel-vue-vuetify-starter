<template>
  <div>
    <v-toolbar>
      <v-toolbar-side-icon></v-toolbar-side-icon>
      <v-toolbar-title></v-toolbar-title>
      <v-spacer></v-spacer>
      <v-toolbar-items class="hidden-sm-and-down">
        <v-btn flat>Login</v-btn>
        <v-btn flat>Register</v-btn>
      </v-toolbar-items>
    </v-toolbar>
    <v-container>
      <v-layout row wrap>
        <v-flex xs12>
          <v-expansion-panel expand focusable v-model="registerPanel">
            <v-expansion-panel-content>
              <template v-slot:header>
                <h2>Business Details</h2>
              </template>
              <v-card>
                <v-container grid-list-md>
                  <v-layout row wrap>
                    <v-flex xs6>
                      <v-text-field
                        box
                        placeholder="Business Name"
                        filled
                        label="Name of your Business"
                      ></v-text-field>
                    </v-flex>
                    <v-flex xs6>
                      <v-text-field box placeholder="Enter Media Link" filled label="Media Link"></v-text-field>
                    </v-flex>
                    <v-flex xs12>
                      <v-textarea
                        box
                        name="input-7-4"
                        label="Address"
                        placeholder="Enter Business Address"
                        value
                      ></v-textarea>
                    </v-flex>
                  </v-layout>
                </v-container>
              </v-card>
            </v-expansion-panel-content>
            <v-expansion-panel-content>
              <template v-slot:header>
                <h2>Owner Details</h2>
              </template>
              <v-card>
                <v-container grid-list-md>
                  <v-layout row wrap>
                    <v-flex xs6>
                      <v-text-field
                        box
                        placeholder="Enter Business Owner Name"
                        filled
                        label="Business Owner name"
                      ></v-text-field>
                    </v-flex>
                    <v-flex xs6>
                      <v-text-field
                        box
                        placeholder="Enter Business Owner Number"
                        filled
                        label="Business Owner Number"
                      ></v-text-field>
                    </v-flex>
                    <v-flex xs6>
                      <v-text-field
                        box
                        placeholder="Enter Business Owner Email"
                        filled
                        label="Business Owner Email"
                      ></v-text-field>
                    </v-flex>
                    <v-flex xs6>
                      <v-text-field
                        @click="onPickOwnerImage"
                        box
                        placeholder="Upload Image "
                        filled
                        v-model="ownerImage"
                        label="Upload Image for Owner"
                      ></v-text-field>
                      <input
                        type="file"
                        style="display:none"
                        ref="inputOwnerImage"
                        accept="image/*"
                        @change="onPickOwnerImageInput"
                        />
                    </v-flex>
                  </v-layout>
                </v-container>
              </v-card>
            </v-expansion-panel-content>
            <v-expansion-panel-content>
              <template v-slot:header>
                <h2>Identification Info</h2>
              </template>
              <v-card>
                <v-container grid-list-md>
                  <v-layout row wrap>
                    <v-flex xs12>
                      <v-radio-group class="text-md-center" row v-model="idTypes">
                        <v-radio label="NID" value="nid"></v-radio>
                        <v-radio label="PASSPORT" value="passport"></v-radio>
                        <v-radio label="BIRTH CERTIFICATE" value="birth-certiticate"></v-radio>
                        <v-radio label="DRIVING LICENCE" value="driving-lisence"></v-radio>
                      </v-radio-group>
                    </v-flex>
                    <v-flex xs6>
                      <v-text-field
                        box
                        placeholder="Enter Identification Number "
                        filled
                        label="Identification Number"
                      ></v-text-field>
                    </v-flex>
                    <v-flex xs6>
                      <v-text-field box v-model="idFileImage" @click="onIdPickImage" placeholder="Select Image" filled label="Select Image "></v-text-field>
                      <input 
                        type="file"
                        style="display:none"
                        ref="idImage"
                        accept="image/*"
                        @change="onIdPickFile"
                        />
                    </v-flex>
                  </v-layout>
                </v-container>
              </v-card>
            </v-expansion-panel-content>
            <v-expansion-panel-content>
              <template v-slot:header>
                <h2>Operator Details</h2>
              </template>
              <v-card>
                <v-container grid-list-md>
                  <v-layout row wrap>
                    <v-flex xs6>
                      <v-text-field
                        box
                        placeholder="Enter Operator  Name"
                        filled
                        label="Operator name"
                      ></v-text-field>
                    </v-flex>
                    <v-flex xs6>
                      <v-text-field
                        box
                        placeholder="Enter Operator Email"
                        filled
                        label="Business Owner Number"
                      ></v-text-field>
                    </v-flex>
                    <v-flex xs6>
                      <v-text-field
                        box
                        placeholder="Enter Operator Number"
                        filled
                        label="Operator Number"
                      ></v-text-field>
                    </v-flex>
                    <v-flex xs6></v-flex>
                  </v-layout>
                </v-container>
              </v-card>
            </v-expansion-panel-content>
            <v-expansion-panel-content>
              <template v-slot:header>
                <h2>Payment Details</h2>
              </template>
              <v-card>
                <v-container grid-list-md>
                  <v-layout row warp>
                    <v-flex xs12>
                      <v-radio-group class="text-md-center" row v-model="paymentTypes">
                        <v-radio label="MOBILE" value="mobile"></v-radio>
                        <v-radio label="BNAK" value="bank"></v-radio>
                      </v-radio-group>
                    </v-flex>
                    <v-flex row warp>

                    </v-flex>
                    <v-flex row warp>

                    </v-flex>
                  </v-layout>
                </v-container>
              </v-card>
            </v-expansion-panel-content>
          </v-expansion-panel>
        </v-flex>
      </v-layout>
    </v-container>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log("Component mounted.");
  },
  data() {
    return {
      message: "Changing the Example Code",
      registerPanel: [true, true, true, true, true, true],
      idTypes: "nid",
      idValue: "",
      idInputTitle: "",
      paymentTypes: "mobile",
      idFileImage: '',
      idFileContent: '',
      ownerImage: '',
      owernImageContent: ''
    };
  },
  methods: {
      onIdTypeChange (event) {

      },
      onPickOwnerImage () {
          this.$refs.inputOwnerImage.click();
      },
      onPickOwnerImageInput (e) {
          const files = e.target.files
          if(files[0] !== undefined) {
              this.ownerImage = files[0].name
              if(this.ownerImage.lastIndexOf('.') <=1) {
                  return
              }

              const fr = new FileReader ()
              fr.readAsDataURL(files[0])
              fr.addEventListener(`load`, () => {
                //  this.imageUrl = fr.result;
                  this.owernImageContent = files[0];
              })
          } else {
              this.ownerImage = ''
              this.owernImageContent = ''
          }
      },
      onIdPickImage () {
          this.$refs.idImage.click();
      },
      onIdPickFile(e) {
          debugger
          const files = e.target.files
          if(files[0] !== undefined) {
              this.idFileImage = files[0].name
              if(this.idFileImage.lastIndexOf('.') <=1) {
                  return
              }

              const fr = new FileReader ()
              fr.readAsDataURL(files[0])
              fr.addEventListener(`load`, () => {
                //  this.imageUrl = fr.result;
                  this.idFileContent = files[0];
              })
          } else {
              this.idFileImage = ''
              this.idFileContent = ''
          }
      }
  }
};
</script>
