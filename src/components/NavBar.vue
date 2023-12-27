<template>
    <nav>
       <v-navigation-drawer v-model="drawer" :mini-variant.sync="mini" class="drawer"    color="#E9EEF4" dark app>
   
 <div class="text-center mt-5">
        <!--   <h1 class="teal--text text-lg-h5 font-weight-bold ">HR QR SYSTEM</h1> -->
          <v-divider color="white" class="mt-4"></v-divider>
           <v-avatar color="white" class="my-5 image" size="78" >
           <v-img src="/tagumlogo.png" ></v-img>
           </v-avatar>
           <h1 class="black--text"></h1>
           <h6 class="grey--text "></h6>
         <!-- <v-btn class="mt-3"  rounded color="success" variant="outlined">ADMIN</v-btn> -->
             
       </div>
       
       <v-divider class="mx-10 mt-3" ></v-divider>


 <v-list class="mt-6">
     <v-list-subheader>REPORTS</v-list-subheader>
   
     
     <v-list-item
     
       v-for="(item, i) in items"
       :key="i"
       :value="item"
    
       rounded="shaped"
       :to="item.route"
     >
       <template v-slot:prepend>
         <v-icon  :icon="item.icon"></v-icon>
       </template>

       <v-list-item-title v-text="item.text"></v-list-item-title>
     </v-list-item>

   
   </v-list>

     </v-navigation-drawer>
     <v-app-bar   color="#F9FAFC"  class="cardVr" dark app>
       <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
       <v-toolbar-title class="text-uppercase">
         <span class="font-weight-light">OPLAN ASA KA</span>
       </v-toolbar-title>
       <v-spacer></v-spacer>
       <v-menu offset-y>
         <template v-slot:activator="{ on }">
       
         </template>
         <v-list flat>
           <v-list-item v-for="link in links" :key="link.text" :to="link.route" custom-active-class="border">
             <v-list-item-title>{{ link.text }}</v-list-item-title>
           </v-list-item>
         </v-list>
       </v-menu>
       <v-btn text  variant="outlined" color="success"   @click="$router.push('/').catch((err) => {})">
         <span>LOG OUT</span>
        
       </v-btn>
     </v-app-bar>
     
   </nav>
 </template>
 
 <script>
 export default {
   props: {
     source: String,
   },
 
   data() {
     return {


     userData: {
   
       designation: '',
       firstname: '',
       lastname: '',
      
     },

       borderColor: 'green',
       drawer: true,
       mini: false,
       fab: false,

  

       items : [
               { icon: 'mdi-home', colorClass: 'icon-color' , text: 'HOME', route: '/InputFile' },
               {  icon: 'mdi-history'  , text: 'LIST', route: '/ListItem' },
            
           ],
/* 
           eventhistories: [
     

       ], */



     };
   },
 
   mounted() {
   this.fetchData();
 },

   methods: {
     fetchData() {
     const userDataJSON = localStorage.getItem('user');
     if (userDataJSON) {
       this.userData = JSON.parse(userDataJSON);
     }
   },


     onScroll(e) {
       if (typeof window === 'undefined') return;
       const top = window.pageYOffset || e.target.scrollTop || 0;
       this.fab = top > 20;
     },
     toTop() {
       this.$vuetify.goTo(0);
     },
   },
 };
 </script>
 
 <style scoped>

.image {
   border: 2px solid #4caf4f;
}
 .border {
   border-left: 4px solid #0ba518;
 }
 
 .icon-color {
 color: #FF0000;
 }


 </style>
 