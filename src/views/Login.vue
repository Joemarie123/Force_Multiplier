<template>
 
    <v-app>
    <v-container >
     
       
      <v-row  justify="center" >
        
        <v-col cols="12" >
             
       
         <!--  <v-card 
          
          :class="`elevation-6`"
          class=" login-form " > -->
  <div class=" login-form">
  
          <v-alert class="my-8"  v-if="alertMessage"  :value="true" type="error" transition="fade-transition">
               {{ alertMessage }}
    </v-alert>
          <div class="text-center mt-3">
            <img class="logo" src="/public/Tagum.png" width="115">
          </div>
       
  
            <v-card-title class="my-4 mt-n1 login-title">
               
                <b>OPLAN ASA KA</b></v-card-title>
            <v-card-text>
             
              <form @submit.prevent="login">
  
              <!--   <p><b>User Name</b></p> -->
              <v-text-field
                class="mx-5 mt-n1"
                prepend-inner-icon="mdi-account"
               density="compact" 
               variant="underlined"
              v-model="usernamenako"
             label="User Name"   
                >
  
                </v-text-field>
                
               
                <v-text-field
                class="mx-5 mt-n2"
                prepend-inner-icon="mdi-key"
                density="compact"
                  v-model="password"
                  label="Password"
                  outlined
                  variant="underlined"
                  type="password"
                 
                ></v-text-field>
                <p class="mx-5 my-7 mt-n1 d-flex justify-end underline-on-hover"  >Forgot Password?</p>
          
                <v-row>
                    <v-col class="mx-4 d-flex justify-center" cols="11">
                <v-btn  class="" rounded  type="submit" block rounded-lg  color="success" @click="Login_Events()"  >
                  Login
                </v-btn>
               
            </v-col>
            
            </v-row>
          </form>
             
            </v-card-text>
          </div>
       <!--    </v-card> -->
        </v-col>
      </v-row>
    </v-container>
  </v-app>
  </template>
  
  <script>
  import { mapActions } from 'vuex';
  export default {
    data() {
    return{
     isHovering:'',
      usernamenako:'',
      password:'',
      alertMessage:'',
    }
    },
    created(){
      localStorage.clear()
    },
    methods: {
      ...mapActions("insertfile", { Loginbai: "login"}),
  
  
      hideAlertAfterDelay() {
      setTimeout(() => {
        this.alertMessage = false;
      }, 2000); // 3000 milliseconds = 3 seconds
    },
  
      Login_Events()
  
  {
  
  
  
  console.log("username=",this.usernamenako)
  console.log("password=",this.password)
    let data= new FormData;
            data.append('username',this.usernamenako);
            data.append('password',this.password);
            this.Loginbai(data).then(e=>{
  console.log("value of e=",e)
                if (e == 0) {
                  this.alertMessage='Email or Password is incorrect.'
                  this.hideAlertAfterDelay();
                    this.showResponse({
                        header: "Error",
                        subHeader: "Email or Password is incorrect.",
                        message: "Please double check your credentials."
                        
                    });
                }
                
                else {
                  this.$router.push('/InputFile')

                  

                  // if(e == 1){
                     
                  //   this.$router.push('/HomeEvents')
                  // }
                  //   // this.navigateTo('/TestingForm');
                  
                  //  else
                  // {
                  //   this.alertMessage='Email or Password is incorrect.'
                  //   this.hideAlertAfterDelay();
                  //  /*   console.log("awe")
                  //   this.$router.push('/OfficeHomeEvents') */
                  // } 
                  
                  // // this.navigateTo('/sample');
                }
            }).catch(e => console.log("Error =>", e));
            
           
  },
      
      
    },
  
  
  
  };
  </script>
  
  <style scoped>
  .underline-on-hover {
  text-decoration: underline;
  }
  
  .underline-on-hover:hover {
  text-decoration: none; /* Remove underline on hover */
  }
  
  .login-form {
    max-width: 400px;
    margin: 0 auto;
    position: absolute;
  left: 50%;
  top: 50%;
  width: 400px;
  transform: translate(-50%,-50%);
  border-radius: 20px;
  
  }
  
  .login-title {
    text-align: center;
  }
  
  </style>
  