<template>
  <v-app>
    <v-toolbar app>
     
      <v-toolbar-title>Theo Percel</v-toolbar-title>
      <v-spacer></v-spacer>
      <v-toolbar-items>
        <v-btn to="/" flat>Home</v-btn>
        <v-btn  to="/register" flat>Register</v-btn>
      </v-toolbar-items>
    </v-toolbar>
    <v-content>
      <v-container>
        <router-view></router-view>
      </v-container>
    </v-content>
    <v-footer app></v-footer>
  </v-app>
</template>
<script>
export default {};
</script>

