<template>
  <v-app>
    <v-toolbar app>
      <v-toolbar-side-icon  @click.stop="drawer = !drawer"></v-toolbar-side-icon>
      <v-toolbar-title>Theo Percel</v-toolbar-title>
      <v-spacer></v-spacer>
      <v-toolbar-items>
        <v-btn  v-if="$route.meta.publicLayout && !$route.meta.adminLayout"  to="/" flat>Home</v-btn>
        <v-btn  v-if="$route.meta.publicLayout && !$route.meta.adminLayout"  to="/register" flat>Register</v-btn>
        <v-btn v-if="!$route.meta.publicLayout && !$route.meta.adminLayout && $route.meta.publicSecure" @click="onLogoutForMerchant" flat>Merchant Logout</v-btn>
         <v-btn v-if="!$route.meta.publicLayout && !$route.meta.adminLayout && $route.meta.adminSecure" @click="onLogoutForAdmin" flat>Admin Logout</v-btn>
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
import router from './routes'
import navbar from './navbar.vue'
export default {
  data () {
      return {
        drawer: null,
        items: [
          { title: 'Home', icon: 'dashboard' },
          { title: 'About', icon: 'question_answer' }
        ],
        mini: false,
        right: null,
      }
    },
  components: {
    navbar
  },
  computed: {
    showMerchantNavBar (){
     let tempCheckMerchantLogin = localStorage.getItem('merchantAccessToken')
      if(tempCheckMerchantLogin) {
        return true;
      } else {
        return false;
      }
    }
  },
  methods: {
    onLogoutUsers () {
      localStorage.removeItem('merchantAccessToken')
      router.push('/')
    },
    onLogoutForAdmin () {
      localStorage.removeItem('adminAccessToken')
      router.push('/admin/login')
    }
  }
};
</script>

