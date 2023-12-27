<template>
    <v-card   height="1000" flat color="#F9FAFC" >
    <v-layout  >
        <NavBar/>
        <v-main  class="mt-16">


          
            <v-sheet
       
       class="custom-card elevation-12 rounded-xl d-flex align-center justify-center flex-wrap text-center mx-auto px-4 mt-6"
       elevation="4"
       rounded
       max-width="70%"
       width="100%"
     >
    
       <v-container>
         <v-container>

<v-dialog v-model="dialogVisible" persistent max-width="280">
 <v-card >
   <v-row >
     <v-col cols="10" class="mt-5">
       <v-card-title class="headline">Successfully Saved</v-card-title>
     </v-col>
     <v-col cols="3" class="ml-n10">
       <v-avatar class="my-5 image" size="50" >
         <v-img src="/save.png" ></v-img>
         </v-avatar>
     </v-col>
   </v-row>
   <v-card-actions class="d-flex justify-center mt-n7">  
     <v-btn color="green" text @click="dialogVisible = false">OK</v-btn>
   </v-card-actions>

 </v-card>
</v-dialog>

<v-dialog v-model="dialogerror" persistent max-width="280">
 <v-card >
  
   <v-row >
     <v-col cols="11" class="mt-4">
       <v-card-title class="headline">Unable to Save Account</v-card-title>
     </v-col>
     <v-col cols="1" class="ml-n10">
       <v-avatar class="my-5 image" size="40" >
        <!--  <v-img src="./assets/error.png" ></v-img> -->
         </v-avatar>
     </v-col>
   </v-row>
  


   <v-card-actions class="d-flex justify-center mt-n7">  
    
     <v-btn color="red" text @click="dialogerror = false">OK</v-btn>

   </v-card-actions>
   
 </v-card>
</v-dialog>



           <v-row>
           

   <v-row>
                <v-col cols="3" >
        <div >
          <v-btn
          color="orange"
            class="text-none primary"
            min-width="92"
            rounded
            variant="outlined"
            @click="$router.push('/ListItem').catch((err) => {})"
          >
            <v-icon> mdi-arrow-left </v-icon>
            Back
          </v-btn>
        </div>
      </v-col>  


                <v-col cols="7">
              <span class="text-h5">EDIT PERSONNEL INFORMATION</span>
            </v-col>  

           
    </v-row>

        
 </v-row>
         </v-container>
       <!--   <v-divider :thickness="5" color="green" class=" mb-4"></v-divider> -->
         <v-container>
           <v-row class="mt-n10" >

             <v-col cols="6" offset="4">
      
    


             </v-col>
           </v-row>
           <br />
           
           <v-row>
             <v-col cols="12">
             <v-card   class="rounded-xl mt-n2 elevation-10 ">
               <v-container>
                 <v-col>
                   <v-row>

             <v-col cols="12" sm="4" md="4" lg="3">
               <v-text-field
               
                 label="Last Name"
                 v-model="detailsname.lastname"
                 variant="solo"
                 density="compact"
                 class="mb-n6"
               ></v-text-field>
             </v-col>
             <v-col cols="12" sm="4" md="4" lg="3">
               <v-text-field
               
                 label="First Name"
                 v-model="detailsname.firstname"
                 variant="solo"
                 density="compact"
                 class="mb-n6"
               ></v-text-field>
             </v-col>
             <v-col cols="12" sm="4" md="4" lg="3">
               <v-text-field
               
                 label="Middle Name"
                 v-model="detailsname.middlename"
                 variant="solo"
                 density="compact"
                 class="mb-n6"
               ></v-text-field>
             </v-col>

             <v-col cols="12" sm="12" md="12" lg="3">
               <v-text-field
          
                 label="Contact No."
                 v-model="detailsname.contactno"
                 variant="solo"
                 density="compact"
                 class="mb-n6"
               ></v-text-field>
             </v-col>

             <v-col cols="12" sm="4" md="4" lg="4">
               <v-select
               :items="barangays"
              
                 label="Barangay"
                 v-model="detailsname.barangay"
                 variant="solo"
                 density="compact"
                 class="mb-n6"
               ></v-select>
             </v-col>

             <v-col cols="12" sm="4" md="4" lg="4">
               <v-text-field
          
                 label="Plate No."
                 v-model="detailsname.plateno"
                 variant="solo"
                 density="compact"
                 class="mb-n6"
               ></v-text-field>
             </v-col>

             <v-col cols="12" sm="4" md="4" lg="4">
               <v-text-field
          
                 label="City Plate No."
                 v-model="detailsname.cityplateno"
                 variant="solo"
                 density="compact"
                 class="mb-n6"
               ></v-text-field>
             </v-col>

             <v-col cols="12" sm="12" md="12" lg="12">
               <v-text-field
          
                 label="Association"
                 v-model="detailsname.association"
                 variant="solo"
                 density="compact"
                 class="mb-n6"
               ></v-text-field>
             </v-col>

             <v-dialog v-model="Dialog_Successfully_Saved" persistent max-width="300">
 <v-card >
   <v-row >
     <v-col cols="10" class="mt-5">
       <v-card-title class="headline">Successfully Updated</v-card-title>
     </v-col>
     <v-col cols="3" class="ml-n10">
       <v-avatar class="my-5 image" size="50" >
         <v-img src="/save.png" ></v-img>
         </v-avatar>
     </v-col>
   </v-row>
   <v-card-actions class="d-flex justify-center mt-n7">  
     <v-btn color="green" text @click="Dialog_Successfully_Saved = false">OK</v-btn>
   </v-card-actions>

 </v-card>
</v-dialog>

<v-dialog v-model="Dialog_Successfully_updated_picdata" persistent max-width="300">
 <v-card >
   <v-row >
     <v-col cols="10" class="mt-5">
       <v-card-title class="headline">Successfully Updated</v-card-title>
     </v-col>
     <v-col cols="3" class="ml-n10">
       <v-avatar class="my-5 image" size="50" >
         <v-img src="/save.png" ></v-img>
         </v-avatar>
     </v-col>
   </v-row>
   <v-card-actions class="d-flex justify-center mt-n7">  
     <v-btn color="green" text @click="closedialogsuccessfullyupdated_picdata()">OK</v-btn>
   </v-card-actions>

 </v-card>
</v-dialog>

<v-dialog v-model="Dialog_Successfully_updated_piclicense" persistent max-width="300">
 <v-card >
   <v-row >
     <v-col cols="10" class="mt-5">
       <v-card-title class="headline">Successfully Updated</v-card-title>
     </v-col>
     <v-col cols="3" class="ml-n10">
       <v-avatar class="my-5 image" size="50" >
         <v-img src="/save.png" ></v-img>
         </v-avatar>
     </v-col>
   </v-row>
   <v-card-actions class="d-flex justify-center mt-n7">  
     <v-btn color="green" text @click="closedialogsuccessfullyupdated_pic_License()">OK</v-btn>
   </v-card-actions>

 </v-card>
</v-dialog>

             <v-col cols="12" sm="6" md="6" lg="6">
              <v-row>
                <v-col cols="4">
                  <v-btn class="ml" @click="dialogpicdata = true">Change Picture</v-btn>
                </v-col>
                <v-col cols="12">
              <!--    <v-file-input label="Upload 2x2 Pictures" v-model="file_picdata" variant="solo" density="compact" @change="onFileChange" accept="image/*" show-size counter="2"></v-file-input> -->
       <v-card  width="200" height="200">
         <v-img  :src="selectedImage" class="mt-4" contain></v-img>
       </v-card>
      </v-col>

      <v-dialog v-model="dialogpicdata" max-width="500"> 
        <v-container>
        <v-card>
          <v-row>
            <v-col cols="12" sm="12" md="12" class="">
<div class="text-center ">
<v-alert  density="compact" dark
color="blue darken-3">
CHANGE PICTURE<strong> </strong>

 </v-alert>
</div>

 </v-col>

            <v-col cols="12" class="my-n1 mx-n1">
          
         <v-file-input label="Upload 2x2 Pictures" v-model="file_picdata" variant="solo" density="compact" @change="onFileChange" accept="image/*" show-size counter="2"></v-file-input>
        </v-col>
        <v-col cols="12" class="d-flex justify-center mt-n9 my-6" >
         <v-card elevation="10" width="200" height="200">
         <v-img  :src="selectedImage"  contain></v-img>
       </v-card>
       
      </v-col>

      </v-row>
      <v-row>

<v-col class="ml-n4 mt-n7 my-3 d-flex justify-end">
      <v-btn
      variant="outlined"
   color="red"
   min-width="92"
   @click="closedialogsuccessfullyupdated_picdata()"
 >
  Close
 </v-btn>
 <v-btn
 variant="outlined"
  class="mx-2"
 color="green"
 min-width="92"
 @click="updatednewpicturedata()"
>
UPDATE
</v-btn>
</v-col>

</v-row>
        </v-card>
      </v-container>
      </v-dialog>



      <v-dialog v-model="dialogpiclicense" max-width="500"> 
        <v-container>
        <v-card>
          <v-row>
            <v-col cols="12" sm="12" md="12" class="">
<div class="text-center ">
<v-alert  density="compact" dark
color="blue darken-3">
CHANGE LICENSE PICTURE<strong> </strong>

 </v-alert>
</div>

 </v-col>

            <v-col cols="12" class="my-n1 mx-n1">
          
         <v-file-input label="Upload 2x2 Pictures" v-model="file_piclicense" variant="solo" density="compact" @change="onFileChange_License" accept="image/*" show-size counter="2"></v-file-input>
        </v-col>
        <v-col cols="12" class="d-flex justify-center mt-n9 my-6" >
         <v-card elevation="10" width="200" height="200">
         <v-img  :src="selectedImage_license"  contain></v-img>
       </v-card>
       
      </v-col>

      </v-row>
      <v-row>

<v-col class="ml-n4 mt-n7 my-3 d-flex justify-end">
      <v-btn
      variant="outlined"
   color="red"
   min-width="92"
   @click="closedialogsuccessfullyupdated_pic_License()"
 >
  Close
 </v-btn>
 <v-btn
 variant="outlined"
  class="mx-2"
 color="green"
 min-width="92"
 @click="updatednewpicturelicense()"
>
UPDATE
</v-btn>
</v-col>

</v-row>
        </v-card>
      </v-container>
      </v-dialog>


      </v-row>
             </v-col>

             <v-col cols="12" sm="6" md="6" lg="6">
              <v-row>
                <v-col cols="4">
                  <v-btn class="ml" @click="dialogpiclicense = true">Change Picture</v-btn>
                </v-col>
                <v-col cols="12">
              <!--    <v-file-input label="Upload 2x2 Pictures" v-model="file_picdata" variant="solo" density="compact" @change="onFileChange" accept="image/*" show-size counter="2"></v-file-input> -->
       <v-card  width="500" height="200">
         <v-img  :src="selectedImage_license" class="mt-4" contain></v-img>
       </v-card>
      </v-col>
      </v-row>
             </v-col>

           </v-row>

           </v-col>
         </v-container>

 
           </v-card>
         </v-col>
          
      
           </v-row>
       </v-container>

         
      <!--    <div class="pa-4 text-end">
           <v-btn
           class="text-none mr-2"
           color="green"
           min-width="92"
           @click="savenewfile()"
         >
           SAVE
         </v-btn>
         
        
       </div> -->


       <v-row>

<v-col class="ml-n4 d-flex justify-end">
   <!--    <v-btn
      variant="outlined"
   color="red"
   min-width="92"
   @click="dialogcard = false"
 >
  Close
 </v-btn> -->
 <v-btn
 variant="outlined"
  class="mx-2"
 color="green"
 min-width="92"
 @click="savenewfile()"
>
UPDATE
</v-btn>
</v-col>

</v-row>


       </v-container>
       
     </v-sheet>
     


        </v-main> 
    </v-layout >
    </v-card>

  </template>


<script>
import { mapActions, mapGetters} from 'vuex';
  import NavBar from "@/components/NavBar.vue";
  export default {

    components: {
    NavBar,
  },
  
    data() {

        
      return {
        Dialog_Successfully_updated_piclicense:false,
        dialogpiclicense:false,
        Dialog_Successfully_updated_picdata:false,
        dialogpicdata:false,
        Dialog_Successfully_Saved:false,
        file_picdata:null,
        file_piclicense:null,
        selectedImage:null,
        selectedImage_license:null,
        resizedImage: null,
        barangays:[
      'Apokon', 
    'Bincungan',
     'Busaon', 
    'Canocotan', 
    'Cuambogan', 
    'La Filipina',
     'Liboganon', 
     'Madaum', 
     'Magdum', 
     'Mankilam',
     'New Balamban', 
     'Nueva Fuerza', 
     'Pagsabangan', 
     'Pandapan', 
     'Magugpo Poblacion',
      'San Agustin', 
      'San Isidro',
       'San Miguel (Camp 4)', 
       'Visayan Village', 
       'Magugpo East', 
       'Magugpo North', 
       'Magugpo South', 
       'Magugpo West'
      ],

     
      
      };
    },


    computed:{
        ...mapGetters('insertfile', {detailsname: ['getDetails']} ),
     
},
  
created(){
    let data = new FormData;

    data.append('Controlno', localStorage.getItem('Controlno'))

  
  /*   data.append('office_id',adminrecords.office_id) */

    
this.fetchDetails(data).then(e=>{
  this.selectedImage=`http://10.0.1.23:82/forcemultiplier/img/${this.detailsname.Controlno}1.jpg`
  this.selectedImage_license=`http://10.0.1.23:82/forcemultiplier/img/${this.detailsname.Controlno}2.jpg`
  console.log("img=",this.selectedImage)

})
console.log("detailsname",this.detailsname)

},

methods: {
    ...mapActions('insertfile', ['fetchDetails']),
    ...mapActions('insertfile', ['InsertFileNew']),
    ...mapActions('insertfile', ['InsertPictures']),
    ...mapActions('insertfile', ['fetchUsers']), 

    updatednewpicturedata()
    {
      let data = new FormData();
      data.append('Controlno', this.detailsname.Controlno); 
      data.append('picdata', this.file_picdata[0]);

      this.InsertPictures(data).then(() => {
        /*   this.navigateTo('/walup'); */
        }).catch(e => console.log(e.message));
        this.Dialog_Successfully_updated_picdata = true;
      
    },

    updatednewpicturelicense()
    {
      let data = new FormData();
      data.append('Controlno', this.detailsname.Controlno); 
      data.append('piclicense', this.file_piclicense[0]);

      this.InsertPictures(data).then(() => {
        /*   this.navigateTo('/walup'); */
        }).catch(e => console.log(e.message));
        this.Dialog_Successfully_updated_piclicense = true;
        
    },

    closedialogsuccessfullyupdated_picdata()
    {
        this.dialogpicdata = false;
        this.Dialog_Successfully_updated_picdata = false;
        this.file_picdata = null;

    },

    closedialogsuccessfullyupdated_pic_License()
    {
        this.dialogpiclicense = false;
        this.Dialog_Successfully_updated_piclicense = false;
        this.file_piclicense = null;

    },
    
    savenewfile()
    {
      console.log(this.file_picdata)
      let data = new FormData();
      data.append('Controlno', this.detailsname.Controlno); 
      data.append('lastname', this.detailsname.lastname);
      data.append('firstname', this.detailsname.firstname);
      data.append('middlename', this.detailsname.middlename);
      data.append('barangay', this.detailsname.barangay);
      data.append('plateno', this.detailsname.plateno);
      data.append('contactno', this.detailsname.contactno);
      data.append('cityplateno', this.detailsname.cityplateno);
      data.append('association', this.detailsname.association);

      this.InsertFileNew(data).then(() => {
        /*   this.navigateTo('/walup'); */
        }).catch(e => console.log(e.message));
        this.fetchUsers()
      /*   this.detailsname.Contactno = '';
        this.detailsname.fullname = '';
        this.detailsname.barangay = '';
        this.detailsname.plateno = '';
        this.detailsname.contactno = '';
        this.detailsname.cityplateno = '';
        this.detailsname.association = '';
 */
      /*   this.txtcontrolno = ''; */
     /*    this.file_picdata = null;
        this.file_piclicense = null; */


     /*    this.selectedImage = null;
        this.selectedImage_license = null; */
        this.Dialog_Successfully_Saved = true;
    },


    onFileChange(event) {
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onloadend = () => {
          this.selectedImage = reader.result;
        };
        reader.readAsDataURL(file);
      }
    },

    onFileChange_License(event) {
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onloadend = () => {
          this.selectedImage_license = reader.result;
        };
        reader.readAsDataURL(file);
      }
    },
},


  };

</script>


<style scoped>
  
  
  
  
  .my-input.v-input .v-input__slot {
  border-radius: 100px;
  }
  
  .v-data-table > .v-data-table__wrapper > table {
    border-spacing: 0 0.10rem;
  }
  .container123 {
  max-width: 1170px;
  padding-left: 20px;
  padding-right: 20px;
  margin: auto;
  }
  .my-header-style {
  background: #666fff;
  }
  .classfortitle{
  /*  color: #70b354; */
    font-size: 15px;
  }
  
  .classeventdetails{
  
    font-size: 20px;
  }
  
  .head {
  background-color: #70b354;
  color: white;
  }
  .big-button {
  padding: 20px;
  font-size: 20px;
  }
  
  table {
  width: 100%;
  border-collapse: collapse;
  }
  
  th,
  td {
  padding: 3px;
  border-bottom: 1px solid #ddd;
  text-align: center;
  }
  
  th {
  background-color: #f2f2f2;
  }
  
  
  .close-button {
  position: absolute;
  top: 5px;
  right: 14px;
  font-size: 16px;
  background-color: transparent;
  border: none;
  cursor: pointer;
  }
  .textbox {
  padding: 10px;
  border: 1px solid #168904;
  border-radius: 10px;
  margin-bottom: 10px;
  width: 500px;
  height: 40px;
  }
  </style>