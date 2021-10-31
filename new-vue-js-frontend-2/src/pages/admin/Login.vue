<template>
  <div id="page-wrapper">
    <v-col cols="5" id="login-box">
      <h1>CB Blog</h1>

      <v-row class="justify-center input">
        <v-col cols="6">
          <v-text-field
            required
            v-model="email"
            placeholder="E-mail"
          ></v-text-field>
        </v-col>
      </v-row>

      <v-row class="justify-center input">
        <v-col cols="6">
          <v-text-field
            required
            v-model="password"
            placeholder="Senha"
          ></v-text-field>
        </v-col>
      </v-row>

      <v-row class="justify-center">
        <v-col cols="6">
          <v-row>
            <v-spacer></v-spacer>

            <v-btn color="red" text @click="tryToLogin">
              Login
            </v-btn>
          </v-row>
        </v-col>
      </v-row>

    </v-col>
  </div>
</template>

<script>
import { isAuthenticated, authenticate } from '../../api/authentication'

export default {
  data(){
    return {
      email: 'caio.arrabal@gmail.com',
      password: '123456'
    }
  },

  mounted: async () => {
    try{
      await isAuthenticated();
      this.$router.push('/admin/home')
    }
    catch(error){
      console.log('Not authorized.')
    }
  },
  
  methods: {
    async tryToLogin(){
      try{
        await authenticate(this.email, this.password)
        this.$router.push('/admin/home')
      }
      catch(error){
        alert('Falha ao logar! Verifique seu usuário e senha.')
        console.log('Failed to login')
      }
    }
  }
}
</script>

<style scoped>
#page-wrapper{
  width: 100vw;
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: rgb(0 70 58);
}

#login-box {
  border: 1px solid black;
  border-radius: 25px;
  padding: 30px 0 40px 0;
  background-color: lightgray;
}

h1{
  text-align: center;
  margin-bottom: 30px;
}

.col-6 {
  padding-bottom: 0;
  padding-top: 0;
}

.input .col-6 {
  padding: 0;
}

.v-input{
  padding-top: 0;
}

.justify-center{
  display: flex;
  justify-content: center;
}

button {
  background-color: rgb(0 70 58);
  color: white !important;
  font-weight: bolder;
  margin-top: 10px;
}
</style>