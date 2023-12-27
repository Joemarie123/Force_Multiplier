<template>
    <v-card   height="1000" flat color="#F9FAFC" >
    <v-layout  >
        <NavBar/>
        <v-main  class="mt-16">
          <v-col class="mt-n9" cols="12" sm="6"  md="6">
  <input v-model="search" class="textbox"  placeholder="Search Personnel">
</v-col>
    <v-data-table
      :headers="headers"
      :items="userlist"
      :items-per-page="10"
      class="elevation-1 "
      :search="search"
    >
  
    <template v-slot:item.actions="{ item }">


<v-btn color="success" @click="handleRowClick(item)"  variant="outlined">
  <v-row>
    <p>EDIT</p>
  </v-row>
</v-btn>

<v-btn class="mx-2" @click="handleRowClick_Print(item)"  color="success"  >
  <v-row>
    <p>PRINT</p>
  </v-row>
</v-btn>


</template>
  
  </v-data-table>
    </v-main> 
    </v-layout >
    </v-card>

  </template>
  
  <script>
  import { mapGetters,mapActions } from 'vuex';
  import NavBar from "@/components/NavBar.vue";
  export default {

    components: {
    NavBar,
  },
  
    data() {

        
      return {
        search:'',
        dialogcard:false,

        headers: [
          { title: 'Control No', value: 'controlno' },
          { title: 'Full Name', value: 'fullname' },
          { title: 'Contact No', value: 'contactno' },
          { title: 'Barangay', value: 'barangay' },
          { title: 'Association', value: 'association' },
          { title: 'Plate Number', value: 'plateno' },
          { title: 'Actions', value: 'actions' }
        ],
      
      };
    },

    computed:{
     
      ...mapGetters('insertfile', {userlist: ['getUsers']} ),
},
  
created(){
 
  this.fetchUsers()

},

methods: {
...mapActions('insertfile', ['fetchUsers']), 

handleRowClick(item) {
        // console.log("users=", item);
        console.log("users=", item.controlno);
      //   console.log("EventName", row.item.raw.Event_name);
    localStorage.setItem('Controlno', item.controlno); 
      this.$router.push({ name: "PersonnelDetails", params: { Controlno: item.controlno }});
      },

      handleRowClick_Print(item) {
        // console.log("users=", item);
        console.log("users=", item.controlno);
      //   console.log("EventName", row.item.raw.Event_name);
    localStorage.setItem('Controlno', item.controlno); 
      this.$router.push({ name: "PrintLayout", params: { Controlno: item.controlno }});
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