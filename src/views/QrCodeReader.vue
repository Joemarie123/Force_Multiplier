<template>
<v-app>

<h1>Change to Level="L"</h1>

<qrcode-vue v-if="QRValue" :value="QRValue"  level="L" />


<v-btn color="green" @click="dialog = true" >

Read QR CODES
</v-btn>

<v-data-table
    v-model:items-per-page="itemsPerPage"
    :headers="headers"
    :items="desserts"
    item-value="name"
    class="elevation-1"
  ></v-data-table>


<v-dialog v-model="dialog" max-width="880px">
  
<v-card>
    
    <div class="text-center ">

<v-alert class="px-n7" dense dark color="blue darken-3">
QR CODES READER -  JULY 1, 2023<strong>
     </strong>

 </v-alert>
</div>

    <v-container>

<v-row>

    <v-col cols="12" md="6">
    <v-card>


<qrcode-stream @init="onInit"  @decode="onDecode" ></qrcode-stream>

<p>
 {{ error }}  
  
</p>


</v-card>
</v-col>

<v-col cols="12"  md="6">

<v-card>

 <v-textarea :value="decodedString"  v-model="search" @change="fetchData"  ></v-textarea>

<div v-if="found">
  <h2>Results:</h2>
  <p> Full Name: Joemarie O. Rendon</p>
  <p> Ofice: Human Resource Office</p>
  <p> Employement Status: Job Order</p>
   <p> Time: 7:49 AM</p>
</div>
    <div v-else-if="searched">
      <p>No results found for {{ search }}</p>
    </div>

</v-card>   
</v-col>

</v-row>

</v-container>
</v-card>



</v-dialog>
<div class="d-flex-column justify-center w-50">
<v-text-field  v-model="QRValue" label="Type Number to Generater">

</v-text-field>
</div>
<qrcode-vue v-if="QRValue" :value="QRValue" :size="300" level="H" />

</v-app>
</template>


<script>
import QrcodeVue from 'qrcode.vue'
import { QrcodeStream } from 'vue3-qrcode-reader'

export default{
    name: "qrcodesbai",
    data(){ 
      
        return{
          itemsPerPage: 5,
            dialog:false,
            QRValue:null, 
            error:'',
            decodedString:'',

            search: "",
      found: false,
      searched: false,

      headers: [
          {
            title: 'Dessert (100g serving)',
            align: 'start',
            sortable: false,
            key: 'name',
          },
          { title: 'Calories', align: 'end', key: 'calories' },
          { title: 'Fat (g)', align: 'end', key: 'fat' },
          { title: 'Carbs (g)', align: 'end', key: 'carbs' },
          { title: 'Protein (g)', align: 'end', key: 'protein' },
          { title: 'Iron (%)', align: 'end', key: 'iron' },
        ],





      result: {},
             
            persons: [

            {
         
              id: '123', 
          FullName: 'None',
           office: 'None',
          Civil_Status:'None', 
          
          },


          {
          id: 'DDN48242F4DE', 
         
          FullName: 'Joemarie Rendon',
          office: 'CMO - IT',
          Civil_Status:'Married', 
          
          },


          {
          id: 'DDN26DF58AD3', 
         
          FullName: 'Milanie Rendon',
          office: 'CMO - Youth',
          Civil_Status:'Married', 
          
          },

          {
          id: 'DDN89B4787F3', 
         
          FullName: 'Rebecca Waga',
          office: 'Human Resource',
          Civil_Status:'Married', 
          
          }



      ],

    

        }

    },


    components:{

        QrcodeVue,
        QrcodeStream,
    },


    methods: {

     

  async onInit (promise) {
    // show loading indicator

    try {
      const { capabilities } = await promise

      // successfully initialized
    } catch (error) {
      if (error.name === 'NotAllowedError') {
        // user denied camera access permisson
      } else if (error.name === 'NotFoundError') {
        // no suitable camera device installed
      } else if (error.name === 'NotSupportedError') {
        // page is not served over HTTPS (or localhost)
      } else if (error.name === 'NotReadableError') {
        // maybe camera is already in use
      } else if (error.name === 'OverconstrainedError') {
        // did you requested the front camera although there is none?
      } else if (error.name === 'StreamApiNotSupportedError') {
        // browser seems to be lacking features
      }
    } finally {
      // hide loading indicator
    }
  },

  onDecode(decodedString){

    this.decodedString = decodedString;

    this.search = decodedString;
      const foundData = this.data.find((item) => item.id === decodedString);
      if (foundData) {
        this.result = foundData;
        this.found = true;
      } else {
        this.found = false;
      }
      this.searched = true;

  }

},

  computed: {

    fetchData() {
      const searchLower = this.search.toLowerCase();
      const foundData = this.persons.find(
        (item) =>
          item.id.toLowerCase().includes(searchLower) ||
          item.FullName.toLowerCase().includes(searchLower) ||
          item.office.toLowerCase().includes(searchLower)
      );
      if (foundData) {
        this.result = foundData;
        this.found = true;
      } else {
        this.found = false;
      }
      this.searched = true;
    },

  }

   /*   computed: {
        filteredCustomers() {
    	 var self = this;
       return this.persons.filter((cust) => {
         return cust.id.toLowerCase().indexOf(self.search.toLowerCase()) >= 0 ||                                       
           cust.FullName.toLowerCase().indexOf(self.search.toLowerCase()) >= 0;
           
       });
       
       
    },

},  */


}



</script>