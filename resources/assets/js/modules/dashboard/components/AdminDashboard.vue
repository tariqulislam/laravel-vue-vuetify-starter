<template>
  <v-card>
    <v-card-title>
      Merchants
      <v-spacer></v-spacer>
      <v-text-field v-model="search" append-icon="search" label="Search" single-line hide-details></v-text-field>
    </v-card-title>
    <v-data-table :headers="headers" :items="loadListOfMerchants" :search="search">
      <template v-slot:items="props">
        <td>{{ props.item.id }}</td>
        <td class="text-xs-left">{{ props.item.business_name }}</td>
        <td class="text-xs-left">{{ props.item.merchant_name }}</td>
        <td class="text-xs-left">{{ props.item.merchant_number }}</td>
        <td class="text-xs-left">{{ props.item.merchant_email }}</td>
        <!-- <td class="text-xs-right">{{ props.item.iron }}</td> -->
      </template>
      <template v-slot:no-results>
        <v-alert
          :value="true"
          color="error"
          icon="warning"
        >Your search for "{{ search }}" found no results.</v-alert>
      </template>
    </v-data-table>
  </v-card>
</template>
<script>
import { mapGetters } from "vuex";

export default {
  mounted() {},
  created() {
    this.$store.dispatch("fetchListOfMerchants");
  },
  computed: {
      ...mapGetters([
        'loadListOfMerchants'
      ])
  },
  data() {
    return {
      search: "",
      headers: [
        {
          text: "Id",
          align: "left",
          sortable: true,
          value: "id"
        },
        { text: "Business Name", value: "business_name",   align: "left" },
        { text: "Merchant Name", value: "merchant_name",   align: "left" },
        { text: "Merchant No", value: "merchant_number",   align: "left" },
        { text: "Merchant Email", value: "merchant_email",   align: "left" }
      ]
    };
  }
};
</script>