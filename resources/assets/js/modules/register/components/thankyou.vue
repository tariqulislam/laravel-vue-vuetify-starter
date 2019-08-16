<template>
    <v-card>
        <p style="padding: 10px;color: blue; text-align: center;">You are successfully register to Theo Courier.Please login to our system to start your product courier    
        <v-btn  @click="onGoToLoginPage" >Login</v-btn>
        </p>
   
    </v-card>
</template>
<script>
export default {
    name: 'ThankYou',
    mounted () {

    },
    created () {

    },
    methods: {
        onGoToLoginPage () {
            this.$router.push('/');
        }
    }
}
</script>
