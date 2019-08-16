<template>
  <div>
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
                      v-model="businessName"
                      placeholder="Business Name"
                      filled
                      label="Name of your Business"
                    ></v-text-field>
                    <div v-bind:style="requiredStyle" v-if="$v.businessName.$dirty">
                      <div v-if="!$v.businessName.required">*Business Name is required</div>
                    </div>
                  </v-flex>
                  <v-flex xs6>
                    <v-text-field
                      v-model="mediaLink"
                      box
                      placeholder="Enter Media Link"
                      filled
                      label="Media Link"
                    ></v-text-field>
                    <div v-bind:style="requiredStyle" v-if="$v.mediaLink.$dirty">
                      <div v-if="!$v.mediaLink.required">*Media Link is required</div>
                    </div>
                  </v-flex>
                  <v-flex xs12>
                    <v-textarea
                      box
                      v-model="address"
                      name="input-7-4"
                      label="Address"
                      placeholder="Enter Business Address"
                      value
                    ></v-textarea>
                    <div v-bind:style="requiredStyle" v-if="$v.address.$dirty">
                      <div v-if="!$v.address.required">*Media Link is required</div>
                    </div>
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
                      v-model.trim="owner_name"
                      placeholder="Enter Business Owner Name"
                      filled
                      label="Business Owner name"
                    ></v-text-field>
                    <div v-bind:style="requiredStyle" v-if="$v.owner_name.$dirty">
                      <div v-if="!$v.owner_name.required">*Owner Name is required</div>
                    </div>
                  </v-flex>
                  <v-flex xs6>
                    <v-text-field
                      box
                      v-model.trim="owner_number"
                      placeholder="Enter Business Owner Number"
                      filled
                      label="Business Owner Number"
                    ></v-text-field>
                    <div v-bind:style="requiredStyle" v-if="$v.owner_number.$dirty">
                      <div v-if="!$v.owner_number.required">*Owner Number is required</div>
                    </div>
                  </v-flex>
                  <v-flex xs6>
                    <v-text-field
                      box
                      v-model.trim="owner_email"
                      placeholder="Enter Business Owner Email"
                      filled
                      label="Business Owner Email"
                    ></v-text-field>
                    <div v-bind:style="requiredStyle" v-if="$v.owner_email.$dirty">
                      <div v-if="!$v.owner_email.required">*Owner Email address is required</div>
                      <div v-if="!$v.owner_email.email">*Invalid Email address</div>
                    </div>
                  </v-flex>
                  <v-flex xs6>
                    <v-text-field
                      @click="onPickOwnerImage"
                      box
                      v-bind:style="imgUploadStyle"
                      readonly
                      placeholder="Click here to upload image "
                      filled
                      v-model="ownerImage"
                      label="Upload Image for Owner"
                    ></v-text-field>
                    <div v-bind:style="requiredStyle" v-if="$v.ownerImage.$dirty">
                      <div v-if="!$v.ownerImage.required">* Owner Image is required</div>
                    </div>
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
                      v-model.trim="merchant_identification_number"
                      placeholder="Enter Identification Number "
                      filled
                      label="Identification Number"
                    ></v-text-field>
                    <div
                      v-bind:style="requiredStyle"
                      v-if="$v.merchant_identification_number.$dirty"
                    >
                      <div
                        v-if="!$v.merchant_identification_number.required"
                      >*Merchant Id is required</div>
                    </div>
                  </v-flex>
                  <v-flex xs6>
                    <v-text-field
                      box
                      v-model="idFileImage"
                      v-bind:style="imgUploadStyle"
                      readonly
                      @click="onIdPickImage"
                      placeholder="Select Image"
                      filled
                      label="Select Image "
                    ></v-text-field>
                    <div v-bind:style="requiredStyle" v-if="$v.idFileImage.$dirty">
                      <div v-if="!$v.idFileImage.required">* Id Front Part is needed</div>
                    </div>
                    <input
                      type="file"
                      style="display:none"
                      ref="idImage"
                      accept="image/*"
                      @change="onIdPickFile"
                    />
                  </v-flex>
                  <v-flex xs6>
                    <v-text-field
                      box
                      v-model="idFileImage2"
                      v-bind:style="imgUploadStyle"
                      readonly
                      @click="onIdPickImageTwo"
                      placeholder="Select Image"
                      filled
                      label="Select Image "
                    ></v-text-field>
                    <div v-bind:style="requiredStyle" v-if="$v.idFileImage2.$dirty">
                      <div v-if="!$v.idFileImage2.required">*Id Back Part is needed</div>
                    </div>
                    <input
                      type="file"
                      style="display:none"
                      ref="idImageTwo"
                      accept="image/*"
                      @change="onIdPickFileTwo"
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
                      v-model.trim="operator_name"
                      placeholder="Enter Operator  Name"
                      filled
                      label="Operator name"
                    ></v-text-field>
                    <div v-bind:style="requiredStyle" v-if="$v.operator_name.$dirty">
                      <div v-if="!$v.operator_name.required">* Operator Name is required</div>
                    </div>
                  </v-flex>
                  <v-flex xs6>
                    <v-text-field
                      box
                      v-model.trim="operator_email"
                      placeholder="Enter Operator Email"
                      filled
                      label="Operator  Email"
                    ></v-text-field>
                    <div v-bind:style="requiredStyle" v-if="$v.operator_email.$dirty">
                      <div v-if="!$v.operator_email.required">*Operator Email address is required</div>
                      <div v-if="!$v.operator_email.email">*Invalid Email address</div>
                    </div>
                  </v-flex>
                  <v-flex xs6>
                    <v-text-field
                      box
                      v-model.trim="operator_number"
                      placeholder="Enter Operator Number"
                      filled
                      label="Operator Number"
                    ></v-text-field>
                    <div v-bind:style="requiredStyle" v-if="$v.operator_number.$dirty">
                      <div v-if="!$v.operator_number.required">* Operator Number is required</div>
                    </div>
                  </v-flex>
                  <v-flex xs6>
                    <v-text-field
                      v-model.trim="operator_password"
                      box
                      type="password"
                      placeholder="*******"
                      filled
                      label="Password"
                    ></v-text-field>
                    <div v-bind:style="requiredStyle" v-if="$v.operator_password.$dirty">
                      <div v-if="!$v.operator_password.required">*Operator password is required</div>
                    </div>
                  </v-flex>
                  <v-flex xs6>
                    <v-text-field
                      v-model="operator_retype_password"
                      box
                      type="password"
                      placeholder="*******"
                      filled
                      label="Retype Password"
                    ></v-text-field>
                    <div v-bind:style="requiredStyle" v-if="$v.operator_retype_password.$dirty">
                      <div
                        v-if="!$v.operator_retype_password.required"
                      >*Operator retype password is required</div>
                      <div
                        v-if="!$v.operator_retype_password.sameAsPassword"
                      >*Operator password mismatch!</div>
                    </div>
                  </v-flex>
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
                    <v-radio-group
                      @change="onPaymentTypeChange"
                      class="text-md-center"
                      row
                      v-model="paymentTypes"
                    >
                      <v-radio label="MOBILE" value="mobile"></v-radio>
                      <v-radio label="BANK" value="bank"></v-radio>
                    </v-radio-group>
                  </v-flex>
                </v-layout>
              </v-container>
              <v-container v-if="paymentTypes === 'mobile'" grid-list-md>
                <v-layout row wrap>
                  <v-flex xs6>
                    <v-text-field
                      v-model="mobileAccountNumber"
                      box
                      placeholder="Mobile Account Number"
                      filled
                      label="Mobile Account Number"
                    ></v-text-field>
                    <div v-bind:style="requiredStyle" v-if="$v.mobileAccountNumber.$dirty">
                      <div
                        v-if="!$v.mobileAccountNumber.isMobileValidate"
                      >* Mobile Account Number is required</div>
                    </div>
                  </v-flex>
                  <v-flex xs6>
                    <v-text-field
                      v-model="mobileAccountHolderName"
                      box
                      placeholder="Mobile Account Holder name"
                      filled
                      label="Select Mobile Account Holder Name"
                    ></v-text-field>
                    <div v-bind:style="requiredStyle" v-if="$v.mobileAccountHolderName.$dirty">
                      <div
                        v-if="!$v.mobileAccountHolderName.isMobileValidate"
                      >*Mobile Account Holder Name is required</div>
                    </div>
                  </v-flex>
                  <v-flex xs6>
                    <v-select
                      :items="lstMobileProviders"
                      box
                      v-model="mobileProviderName"
                      label="Select Mobile Providers"
                      item-text="payment_provider_name"
                      item-value="id"
                    ></v-select>
                    <div v-bind:style="requiredStyle" v-if="$v.mobileProviderName.$dirty">
                      <div
                        v-if="!$v.mobileProviderName.isMobileValidate"
                      >*Mobile Provider Name is required</div>
                    </div>
                  </v-flex>
                </v-layout>
              </v-container>
              <v-container v-if="paymentTypes === 'bank'" grid-list-md>
                <v-layout row wrap>
                  <v-flex xs6>
                    <v-select
                      v-model="bankProvider"
                      :items="lstBankProviders"
                      box
                      label="Select Bank Providers"
                      item-text="payment_provider_name"
                      item-value="id"
                    ></v-select>
                    <div v-bind:style="requiredStyle" v-if="$v.bankProvider.$dirty">
                      <div
                        v-if="!$v.bankProvider.isBankValidate"
                      >*Bank Provider Name is required</div>
                    </div>
                  </v-flex>
                  <v-flex xs6>
                    <v-text-field
                      v-model="bankAccountHolderName"
                      box
                      placeholder="Bank Account Holder Name"
                      filled
                      label="Bank Account Holder Name"
                    ></v-text-field>
                     <div v-bind:style="requiredStyle" v-if="$v.bankAccountHolderName.$dirty">
                      <div
                        v-if="!$v.bankAccountHolderName.isBankValidate"
                      >*Bank Account Holder Name is required</div>
                    </div>
                  </v-flex>
                  <v-flex xs6>
                    <v-text-field
                      v-model="bankAccountWalletNumber"
                      box
                      placeholder="Bank Wallet Number"
                      filled
                      label="Bank wallet Number"
                    ></v-text-field>
                     <div v-bind:style="requiredStyle" v-if="$v.bankAccountWalletNumber.$dirty">
                      <div
                        v-if="!$v.bankAccountWalletNumber.isBankValidate"
                      >*Bank Account Wallet Number is required</div>
                    </div>
                  </v-flex>
                  <v-flex xs6>
                    <v-select
                      v-model="bankAccountType"
                      :items="loadAccountTypes"
                      box
                      label="Select Bank Account Type"
                      item-text="account_type_name"
                      item-value="id"
                    ></v-select>
                     <div v-bind:style="requiredStyle" v-if="$v.bankAccountType.$dirty">
                      <div
                        v-if="!$v.bankAccountType.isBankValidate"
                      >*Bank Account Type is required</div>
                    </div>
                  </v-flex>
                  <v-flex xs6>
                    <v-text-field
                      v-model="bankRoutingNo"
                      box
                      placeholder="Bank Routing No"
                      filled
                      label="Bank Routing No"
                    ></v-text-field>
                     <div v-bind:style="requiredStyle" v-if="$v.bankRoutingNo.$dirty">
                      <div
                        v-if="!$v.bankRoutingNo.isBankValidate"
                      >*Bank Routing Number is required</div>
                    </div>
                  </v-flex>
                  <v-flex xs6>
                    <v-text-field
                      box
                      v-model="bankBranchName"
                      placeholder="Bank Branch Name"
                      filled
                      label="Bank Branch Name"
                    ></v-text-field>
                     <div v-bind:style="requiredStyle" v-if="$v.bankBranchName.$dirty">
                      <div
                        v-if="!$v.bankBranchName.isBankValidate"
                      >*Bank Branch is required</div>
                    </div>
                  </v-flex>
                </v-layout>
              </v-container>

              <v-container grid-list-md>
                <v-layout row warp>
                  <v-flex xs12>
                    <v-checkbox
                      v-model="termsAndConditions"
                      label="I accept terms and conditions"
                      color="indigo"
                      value="accept"
                    />
                  </v-flex>
                </v-layout>
                <v-layout row wrap>
                  <v-flex xs12>
                    <v-btn @click="onRegisterMerchant" class="success">Save</v-btn>
                    <v-btn class="warning">Cancel</v-btn>
                  </v-flex>
                </v-layout>
              </v-container>
            </v-card>
          </v-expansion-panel-content>
        </v-expansion-panel>
      </v-flex>
    </v-layout>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import { required, email, sameAs, requiredIf } from "vuelidate/lib/validators";

export default {
  name: "register",
  mounted() {
    console.log("Component mounted.");
  },
  created() {
    this.$store.dispatch("fetchPaymentProviders");
    this.$store.dispatch("fetchAccountTypes");
  },
  computed: {
    ...mapGetters([
      "lstMobileProviders",
      "lstBankProviders",
      "loadAccountTypes"
    ])
  },
  data() {
    return {
      message: "Changing the Example Code",
      registerPanel: [true, true, true, true, true, true],
      idTypes: "nid",
      idValue: "",
      idInputTitle: "",
      paymentTypes: "mobile",
      idFileImage: "",
      idFileContent: "",
      idFileImage2: "",
      idFileContent2: "",
      ownerImage: "",
      ownerImageContent: "",
      businessName: "",
      mediaLink: "",
      address: "",
      owner_name: "",
      owner_email: "",
      owner_number: "",
      operator_name: "",
      operator_email: "",
      operator_number: "",
      operator_password: "",
      operator_retype_password: "",
      merchant_identification_number: "",
      bankProvider: "",
      bankAccountType: "",
      bankRoutingNo: "",
      bankBranchName: "",
      bankAccountHolderName: "",
      bankAccountWalletNumber: "",
      termsAndConditions: false,
      mobileAccountHolderName: "",
      mobileAccountNumber: "",
      mobileProviderName: "",
      requiredStyle: {
        marginTop: "-20px",
        fontSize: "17px",
        color: "red"
      },
      imgUploadStyle: {
        cursor: "pointer"
      }
    };
  },
  validations: {
    businessName: { required },
    mediaLink: { required },
    address: { required },
    mobileAccountHolderName: {
      isMobileValidate(value) {
        return this.isMobileValidate(value);
      }
    },
    mobileAccountNumber: {
      isMobileValidate(value) {
        return this.isMobileValidate(value);
      }
    },
    mobileProviderName: {
      isMobileValidate(value) {
        return this.isMobileValidate(value);
      }
    },
    bankProvider: {
      isBankValidate(value) {
        return this.isBankValidate(value)
      }
    },
    bankAccountType:{
      isBankValidate(value) {
        return this.isBankValidate(value)
      }
    },
    bankRoutingNo: {
      isBankValidate(value) {
        return this.isBankValidate(value)
      }
    },
    bankBranchName: {
      isBankValidate(value) {
        return this.isBankValidate(value)
      }
    },
    bankAccountHolderName:{
      isBankValidate(value) {
        return this.isBankValidate(value)
      }
    },
    bankAccountWalletNumber: {
      isBankValidate(value) {
        return this.isBankValidate(value)
      }
    },
    owner_name: {
      required
    },
    ownerImage: {
      required
    },
    idFileImage: {
      required
    },
    idFileImage2: {
      required
    },
    owner_number: {
      required
    },
    owner_email: {
      required,
      email
    },
    operator_password: {
      required
    },
    operator_retype_password: {
      required,
      sameAsPassword: sameAs("operator_password")
    },
    operator_email: {
      required,
      email
    },
    operator_name: {
      required
    },
    operator_number: {
      required
    },
    merchant_identification_number: {
      required
    }
  },
  methods: {
    isMobileValidate(value) {
      let returnType = true;
      if (this.paymentTypes === "mobile" && value === "") {
        returnType = false;
      }
      return returnType;
    },
    isBankValidate(value) {
      let returnType = true;
      if (this.paymentTypes === "bank" && value === "") {
        returnType = false;
      }
      return returnType;
    },
    onIdTypeChange(event) {},
    onPickOwnerImage() {
      this.$refs.inputOwnerImage.click();
    },
    onPaymentTypeChange(event) {},
    onPickOwnerImageInput(e) {
      const files = e.target.files;
      if (files[0] !== undefined) {
        this.ownerImage = files[0].name;
        if (this.ownerImage.lastIndexOf(".") <= 1) {
          return;
        }

        const fr = new FileReader();
        fr.readAsDataURL(files[0]);
        fr.addEventListener(`load`, () => {
          //  this.imageUrl = fr.result;
          this.ownerImageContent = files[0];
        });
      } else {
        this.ownerImage = "";
        this.ownerImageContent = "";
      }
    },
    onIdPickImage() {
      this.$refs.idImage.click();
    },
    onRegisterMerchant() {
      this.$v.$touch();
      debugger;
      if (this.$v.$invalid === false) {
        let formData = new FormData();
        formData.append("merchant_name", this.owner_name);
        formData.append("merchant_email", this.owner_email);
        formData.append("merchant_number", this.owner_number);
        formData.append("profile_image", this.ownerImageContent);
        formData.append("operator_name", this.operator_name);
        formData.append("operator_email", this.operator_email);
        formData.append("operator_number", this.operator_number);
        formData.append("operator_password", this.operator_password);
        formData.append("business_name", this.businessName);
        formData.append("media_link", this.mediaLink);
        formData.append("address", this.address);
        formData.append("merchant_identification_type", this.idTypes);
        formData.append(
          "merchant_identification_number",
          this.merchant_identification_number
        );
        formData.append("merchant_identification_image_1", this.idFileContent);
        formData.append("merchant_identification_image_2", this.idFileContent2);
        formData.append("profile_image", this.ownerImageContent);
        formData.append("payment_type", this.paymentTypes);
        if (this.paymentTypes === "mobile") {
          formData.append("payment_provider_id", this.mobileProviderName);
          formData.append("mobile_account_number", this.mobileAccountNumber);
          formData.append("mobile_account_name", this.mobileAccountHolderName);
        } else if (this.paymentTypes === "bank") {
          formData.append("payment_provider_id", this.bankProvider);
          formData.append("account_type_id", this.bankAccountType);
          formData.append("bank_holder_name", this.bankAccountHolderName);
          formData.append("bank_wallet_number", this.bankAccountWalletNumber);
          formData.append("bank_branch_name", this.bankBranchName);
          formData.append("bank_routing_number", this.bankRoutingNo);
        }

        formData.append("_token", window.Laravel.content);
        formData.append("acceptTermsAndCondition", this.termsAndConditions);

        this.$store.dispatch("postMerchantDataToApiServer", formData);
      }
    },
    onIdPickImageTwo() {
      this.$refs.idImageTwo.click();
    },
    onIdPickFileTwo(e) {
      const files = e.target.files;
      if (files[0] !== undefined) {
        this.idFileImage2 = files[0].name;
        if (this.idFileImage2.lastIndexOf(".") <= 1) {
          return;
        }

        const fr = new FileReader();
        fr.readAsDataURL(files[0]);

        fr.addEventListener(`load`, () => {
          this.idFileContent2 = files[0];
        });
      } else {
        this.idFileImage2 = "";
        this.idFileContent2 = "";
      }
    },
    onIdPickFile(e) {
      const files = e.target.files;
      if (files[0] !== undefined) {
        this.idFileImage = files[0].name;
        if (this.idFileImage.lastIndexOf(".") <= 1) {
          return;
        }

        const fr = new FileReader();
        fr.readAsDataURL(files[0]);
        fr.addEventListener(`load`, () => {
          //  this.imageUrl = fr.result;
          this.idFileContent = files[0];
        });
      } else {
        this.idFileImage = "";
        this.idFileContent = "";
      }
    }
  },
  watch: {}
};
</script>
