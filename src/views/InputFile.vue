<template>
  <v-card   height="1000" flat color="#F9FAFC" >
    <v-layout  >
     
      <NavBar/>

      <v-main  class="mt-1">

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
           <!--  <v-img src="./assets/error.png"></v-img> -->
            </v-avatar>
        </v-col>
      </v-row>
     


      <v-card-actions class="d-flex justify-center mt-n7">  
       
        <v-btn color="red" text @click="dialogerror = false">OK</v-btn>
  
      </v-card-actions>
    
    </v-card>
  </v-dialog>



              <v-row>
                <v-col cols="3" >
        <div class="ml-n16">
        
        </div>
      </v-col>


                <v-col cols="12" >
             <H4> <span  >PERSONNEL INFORMATION</span></H4>
           <!--   <v-text-field
                  label="Controlno"
                  v-model="txtcontrolno"
                  variant="solo"
                  density="compact"
                  class="mb-n6"
                ></v-text-field> -->
             <!--    <h1 v-if="txtbarangay">{{ barangayNumbers[txtbarangay] }}</h1>  -->
            </v-col>  

           
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
                <v-card   class="rounded-xl mt-n5 elevation-10 ">
                  <v-container>
                    <v-col>
                      <v-row>

                <v-col cols="12" sm="4" md="4" lg="3">
                  <v-text-field
                  
                    label="Last Name"
                    v-model="txtlastname"
                    variant="solo"
                    density="compact"
                    class="mb-n6"
                  ></v-text-field>
                </v-col>

                
                <v-col cols="12" sm="4" md="4" lg="3">
                  <v-text-field
                  
                    label="First Name"
                    v-model="txtfirstname"
                    variant="solo"
                    density="compact"
                    class="mb-n6"
                  ></v-text-field>
                </v-col>

                
                <v-col cols="12" sm="4" md="4" lg="3">
                  <v-text-field
                  
                    label="Middle Name"
                    v-model="txtmiddlename"
                    variant="solo"
                    density="compact"
                    class="mb-n6"
                  ></v-text-field>
                </v-col>

                <v-col cols="12" sm="12" md="12" lg="3">
                  <v-text-field
             
                    label="Contact No."
                    v-model="txtcontactno"
                    variant="solo"
                    density="compact"
                    class="mb-n6"
                  ></v-text-field>
                </v-col>

                <v-col cols="12" sm="4" md="4" lg="4">
                  <v-select
                  :items="barangays"
                 
                    label="Barangay"
                    v-model="txtbarangay"
                    variant="solo"
                    density="compact"
                    class="mb-n6"
                  ></v-select>
                </v-col>

                <v-col cols="12" sm="4" md="4" lg="4">
                  <v-text-field
             
                    label="Plate No."
                    v-model="txtplateno"
                    variant="solo"
                    density="compact"
                    class="mb-n6"
                  ></v-text-field>
                </v-col>

                <v-col cols="12" sm="4" md="4" lg="4">
                  <v-text-field
             
                    label="City Plate No."
                    v-model="txtcityhplateno"
                    variant="solo"
                    density="compact"
                    class="mb-n6"
                  ></v-text-field>
                </v-col>

                <v-col cols="12" sm="12" md="12" lg="12">
                  <v-text-field
             
                    label="Association"
                    v-model="txtassociation"
                    variant="solo"
                    density="compact"
                    class="mb-n6"
                  ></v-text-field>
                </v-col>

                <v-dialog v-model="Dialog_Successfully_Saved" persistent max-width="280">
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
        <v-btn color="green" text @click="Dialog_Successfully_Saved = false">OK</v-btn>
      </v-card-actions>
  
    </v-card>
  </v-dialog>

                <v-col cols="12" sm="6" md="6" lg="6">
                    <v-file-input label="Upload 2x2 Pictures" v-model="file_picdata" variant="solo" density="compact" @change="onFileChange" accept="image/*" show-size counter="2"></v-file-input>
          <v-card  width="200" height="200">
            <v-img v-if="selectedImage" :src="selectedImage" class="mt-4" contain></v-img>
          </v-card>
                </v-col>

                <v-col cols="12" sm="6" md="6" lg="6">
                    <v-file-input variant="solo" v-model="file_piclicense"  density="compact" label="Upload 3x4 Pictures" @change="onFileChange_License" accept="image/*" show-size counter="2"></v-file-input>
          <v-card  width="500" height="200">
            <v-img v-if="selectedImage_license" :src="selectedImage_license" class="mt-4" contain></v-img>
          </v-card>
                </v-col>

              </v-row>

              </v-col>
            </v-container>

    
              </v-card>
            </v-col>
             

              </v-row>
          </v-container>

            
            <div class="pa-4 text-end">
              <v-btn
              class="text-none mr-2"
              color="green"
              min-width="92"
              @click="savenewfile()"
            >
              SAVE
            </v-btn>
            
           
          </div>
          </v-container>
          
        </v-sheet>
        
      </v-main>
   
    </v-layout>
  </v-card>
   
  </template>
  
  
  <script>
  
  import { mapGetters,mapActions } from 'vuex';
  import NavBar from "@/components/NavBar.vue";
  /* import { mapActions, mapGetters } from 'vuex'; */
  
  
  export default {
  
  components: {
    NavBar,
  },
  
  data() {
  return {
  
    Dialog_Successfully_Saved:false,
    file_picdata:null,
    file_piclicense:null,

    txtlastname:'',
    txtfirstname:'',
    txtmiddlename:'',
    selectedImage: null,
    selectedImage_license: null,
    txtfullname:'',
    txtcontactno:'',
    txtbarangay:'',
    txtplateno:'',
    txtcityhplateno:'',
    txtassociation:'',
    txtcontrolno:'',
    
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

       barangayNumbers: {
        'Apokon': '01',
        'Bincungan': '02',

     'Busaon': '03', 
    'Canocotan': '04', 
    'Cuambogan': '05', 
    'La Filipina': '06',
     'Liboganon': '07', 
     'Madaum': '08', 
     'Magdum': '09', 
     'Mankilam': '10',
     'New Balamban': '11', 
     'Nueva Fuerza': '12', 
     'Pagsabangan': '13', 
     'Pandapan': '14', 
     'Magugpo Poblacion': '15',
      'San Agustin': '16', 
      'San Isidro': '17',
       'San Miguel (Camp 4)': '18', 
       'Visayan Village': '19', 
       'Magugpo East': '20', 
       'Magugpo North': '21', 
       'Magugpo South': '22', 
       'Magugpo West': '23',






        // Add more mappings for other barangays if needed
      }


  };
  },
  

  computed: {


  
  },
  
  
  created() {
  
  },
  
        
  methods: {
    ...mapActions('insertfile', ['InsertFileNew']),
    ...mapActions('insertfile', ['fetchUsers']), 


    savenewfile()
    {
      console.log(this.file_picdata)
      let data = new FormData();
      data.append('lastname', this.txtlastname);
      data.append('firstname', this.txtfirstname);
      data.append('middlename', this.txtmiddlename);
    /*   data.append('Controlno', this.txtcontrolno); */
      data.append('barangay', this.txtbarangay);
      data.append('plateno', this.txtplateno);
      data.append('contactno', this.txtcontactno);
      data.append('cityplateno', this.txtcityhplateno);
      data.append('association', this.txtassociation);

      if(this.file_picdata){
        data.append('picdata', this.file_picdata[0]);

      }
if(this.file_piclicense){
  data.append('piclicense', this.file_piclicense[0]);

}



      this.InsertFileNew(data).then(() => {
        /*   this.navigateTo('/walup'); */
        }).catch(e => console.log(e.message));
        this.fetchUsers()
        this.txtlastname = '';
        this.txtfirstname = '';
        this.txtmiddlename = '';
        this.txtcontactno = '';
        this.txtbarangay = '';
        this.txtplateno = '';
        this.txtcityhplateno = '';
        this.txtassociation = '';
        this.txtcontrolno = '';
        this.file_picdata = null;
        this.file_piclicense = null;


        this.selectedImage = null;
        this.selectedImage_license = null;
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
  top: 10px;
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