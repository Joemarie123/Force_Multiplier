<template>
  <div class="ma-2">
    <v-row no-gutters>
      <!-- <v-col>
          <v-container image="/assets/plain_background.png">
            <div class="d-flex justify-space-evenly" style="margin-top: 25%;" id="ass">
              <h2>Association: 1234567890</h2>
            </div>
            <div class="d-flex justify-space-evenly" style="" id="ass">
             
              <h1 style="">FORCE MULTIPLIER</h1>
            </div>
            <div>

            </div>

          </v-container>
        </v-col>
        <v-col>
          <v-container class="background-container ml-4">
            <v-table>
              <thead class="mt-6">
                <tr>
                  <th class="text-left">
                    Name
                  </th>
                  <th class="text-left">
                    Calories
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="item in desserts" :key="item.name">
                  <td>{{ item.name }}</td>
                  <td>{{ item.calories }}</td>
                </tr>
              </tbody>
            </v-table>
          </v-container>
        </v-col> -->

      <v-col>
        <v-container class="background-container">
          <v-container class="c1">
            <div class="association1">{{ detailsname.association }}</div>
            <v-img class="id1" :src="selectedImage" contain></v-img>
            <v-img class="license1" :src="selectedImage_license" contain></v-img>
            <qrcode-vue class="qr1" v-if="detailsname.Controlno" :value="detailsname.Controlno" />
            <div class="control1">{{ detailsname.Controlno }}</div>
            <div class="name1">{{ detailsname.fullname }}</div>
            <div class="contact1">{{ detailsname.contactno }}</div>
            <div class="plate1">{{ detailsname.plateno }}</div>
            <div class="city1">{{ detailsname.cityplateno }}</div>
          </v-container>
        </v-container>
      </v-col>
      <v-col>

        <v-container class="background-container ml-4">
          <div class="association2">{{ detailsname.association }}</div>
          <v-img class="id2" :src="selectedImage" contain></v-img>
          <v-img class="license2" :src="selectedImage_license" contain></v-img>
          <qrcode-vue class="qr2" v-if="detailsname.Controlno" :value="detailsname.Controlno" />
          <div class="control2">{{ detailsname.Controlno }}</div>
          <div class="name2">{{ detailsname.fullname }}</div>
          <div class="contact2">{{ detailsname.contactno }}</div>
          <div class="plate2">{{ detailsname.plateno }}</div>
          <div class="city2">{{ detailsname.cityplateno }}</div>
        </v-container>
      </v-col>
    </v-row>
  </div>
</template>

<script>

import { mapActions, mapGetters, mapState } from 'vuex';
import QrcodeVue from 'qrcode.vue'
import { QrcodeStream } from 'vue3-qrcode-reader'
import NavBar from "@/components/NavBar.vue";
export default {

  components: {

    NavBar,
    QrcodeVue,
    QrcodeStream,
  },

  data() {


    return {

      QRValue: null,
      error: '',
      decodedString: '',

      search: "",
      found: false,
      searched: false,


      Dialog_Successfully_updated_piclicense: false,
      dialogpiclicense: false,
      Dialog_Successfully_updated_picdata: false,
      dialogpicdata: false,
      Dialog_Successfully_Saved: false,
      file_picdata: null,
      file_piclicense: null,
      selectedImage: null,
      selectedImage_license: null,
      resizedImage: null,
      barangays: [
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


  computed: {
    ...mapGetters('insertfile', { detailsname: ['getDetails'] }),

  },

  created() {
    let data = new FormData;

    data.append('Controlno', localStorage.getItem('Controlno'))


    /*   data.append('office_id',adminrecords.office_id) */


    this.fetchDetails(data).then(e => {
      this.selectedImage = `http://10.0.1.23:82/forcemultiplier/img/${this.detailsname.Controlno}1.jpg`
      this.selectedImage_license = `http://10.0.1.23:82/forcemultiplier/img/${this.detailsname.Controlno}2.jpg`
      console.log("img=", this.selectedImage)

    })
    console.log("detailsname", this.detailsname)

  },

  methods: {
    ...mapActions('insertfile', ['fetchDetails']),
    /*    ...mapActions('insertfile', ['InsertFileNew']),
       ...mapActions('insertfile', ['InsertPictures']), */




  },


};

</script>

<style scoped>
/* #ass {
  margin-top: 20%;
} */
/* .license1 {
  width: 30%;
  height: 32%;
  margin: 1%;
  position: absolute;
  top: 25%;
  left: 8%;
  transform: translate(30%, 44%);
  background-image: url("@/assets/license.png");
  background-size: cover;
  background-repeat: no-repeat;
}
.license2 {
  width: 30%;
  height: 32%;
  margin: 1%;
  position: absolute;
  top: 25%;
  left: 10%;
  transform: translate(190%, 44%);
  background-image: url("@/assets/license.png");
  background-size: cover;
  background-repeat: no-repeat;
} */
/* .association1 {
  position: absolute;
  top: 26%;
  left: 30%;
  transform: translate(-50%, -80%);
  color: black !important;
  font-size: 24px !important;
}
.association2 {
  position: absolute;
  top: 26%;
  left: 80%;
  transform: translate(-50%, -80%);
  color: black !important;
  font-size: 24px !important;
} */
/* .id1 {
  width: 14%;
  height: 25%;
  margin: 1%;
  position: absolute;
  top: 63%;
  left: 8.5%;
  transform: translate(-50%, -80%);
  background-image: url("@/assets/images.png");
  background-size: cover;
  background-repeat: no-repeat;
}
.id2 {
  width: 14%;
  height: 25%;
  margin: 1%;
  position: absolute;
  top: 63%;
  left: 37.5%;
  transform: translate(100%, -80%);
  background-image: url("@/assets/images.png");
  background-size: cover;
  background-repeat: no-repeat;
} */
/* .control1 {
  position: absolute;
  top: 42%;
  left: 30%;
  transform: translate(-50%, 1000%);
  color: black !important;
  font-size: 24px !important;
}
.control2 {
  position: absolute;
  top: 42%;
  left: 38%;
  transform: translate(500%, 1000%);
  color: black !important;
  font-size: 24px !important;
} */
/* .name1 {
  position: absolute;
  top: 47%;
  left: 30%;
  transform: translate(-50%, 1000%);
  color: black !important;
  font-size: 24px !important;
}
.name2 {
  position: absolute;
  top: 47%;
  left: 45%;
  transform: translate(500%, 1000%);
  color: black !important;
  font-size: 24px !important;
} */
/* .contact1 {
  position: absolute;
  top: 51.5%;
  left: 30%;
  transform: translate(-50%, 1000%);
  color: black !important;
  font-size: 24px !important;
}
.contact2 {
  position: absolute;
  top: 51.5%;
  left: 36%;
  transform: translate(500%, 1000%);
  color: black !important;
  font-size: 24px !important;
} */
/* .plate1 {
  position: absolute;
  top: 58%;
  left: 13%;
  transform: translate(-50%, 1000%);
  color: black !important;
  font-size: 24px !important;
}
.plate2 {
  position: absolute;
  top: 58%;
  left: 28%;
  transform: translate(500%, 1000%);
  color: black !important;
  font-size: 24px !important;
} */
/* .city1 {
  position: absolute;
  top: 58%;
  left: 37%;
  transform: translate(-50%, 1000%);
  color: black !important;
  font-size: 24px !important;
}
.city2 {
  position: absolute;
  top: 58%;
  left: 39%;
  transform: translate(500%, 1000%);
  color: black !important;
  font-size: 24px !important;
} */
.background-container {
  background-image: url("@/assets/bg.png");

  background-size: cover;

  background-repeat: no-repeat;
  /* height: 11in;
  width: 8.5in; */
  height: 2100%;
  width: 100%;
}

@page {
  size: 8.5in 11in landscape;
}

/* small screen */
/* @media (max-width: 768px) {
  .id1 {
    width: 14%;
    height: 25%;
    margin: 1%;
    position: absolute;
    top: 65% ;
    left: 8.5%;
    transform: translate(-50%, -80%);
    background-image: url("@/assets/images.png");
    background-size: cover;
    background-repeat: no-repeat;
  }
} */

/* medium screen */
/* @media (min-width: 769px) and (max-width: 1024px) {
  .id1 {
    width: 14%;
    height: 25%;
    margin: 1%;
    position: absolute;
    top: 65% ;
    left: 8.5%;
    transform: translate(-50%, -80%);
    background-image: url("@/assets/images.png");
    background-size: cover;
    background-repeat: no-repeat;
  }
} */

/* large screen */
@media (min-width: 1025px) and (max-width: 1440px) {
  .control1 {
    position: absolute;
    top: 40%;
    left: 36%;
    transform: translate(-50%, 1000%);
    color: black !important;
    font-size: 28px !important;
  }
}

/* xl screen */
@media screen and (min-width: 1441px) {
  .id1 {
    width: 14%;
    height: 25%;
    margin: 1%;
    position: absolute;
    top: 67%;
    left: 8.5%;
    transform: translate(-50%, -80%);
    /*   background-image: url("@/assets/images.png"); */
    background-size: cover;
    background-repeat: no-repeat;
  }

  .id2 {
    width: 14%;
    height: 25%;
    margin: 1%;
    position: absolute;
    top: 67%;
    left: 37.5%;
    transform: translate(100%, -80%);
    /*  background-image: url("@/assets/images.png"); */
    background-size: cover;
    background-repeat: no-repeat;
  }

  .license1 {
    width: 30%;
    height: 32%;
    margin: 1%;
    position: absolute;
    top: 30%;
    left: 8%;
    transform: translate(30%, 44%);
    /*   background-image: url("@/assets/license.png"); */
    background-size: cover;
    background-repeat: no-repeat;
  }

  .license2 {
    width: 30%;
    height: 32%;
    margin: 1%;
    position: absolute;
    top: 30%;
    left: 10%;
    transform: translate(190%, 44%);
    /*   background-image: url("@/assets/license.png"); */
    background-size: cover;
    background-repeat: no-repeat;
  }

  .qr1 {
    width: 9% !important;
    height: 15% !important;
    margin: 1%;
    position: absolute;
    top: 91%;
    left: 6.5%;
    transform: translate(-50%, -80%);
    background-image: url("@/assets/qr.png");
    background-size: cover;
    background-repeat: no-repeat;
  }

  .qr2 {
    width: 9% !important;
    height: 15% !important;
    margin: 1%;
    position: absolute;
    top: 91%;
    left: 56.5%;
    transform: translate(-50%, -80%);
    background-image: url("@/assets/qr.png");
    background-size: cover;
    background-repeat: no-repeat;
  }

  .control1 {
    position: absolute;
    top: 40%;
    left: 36%;
    transform: translate(-50%, 1000%);
    color: black !important;
    font-size: 28px !important;
    font-weight: 1000;
  }

  .control2 {
    position: absolute;
    top: 40%;
    left: 40%;
    transform: translate(500%, 1000%);
    color: black !important;
    font-size: 28px !important;
    font-weight: 1000;
  }

  .name1 {
    position: absolute;
    top: 45%;
    left: 36%;
    transform: translate(-50%, 1000%);
    color: black !important;
    font-size: 28px !important;
    font-weight: 1000;
  }

  .name2 {
    position: absolute;
    top: 89%;
    left: 77%;
    color: black !important;
    font-size: 28px !important;
    font-weight: 1000;
  }

  .contact1 {
    position: absolute;
    top: 57%;
    left: 36%;
    transform: translate(-50%, 1000%);
    color: black !important;
    font-size: 24px !important;
    font-weight: 1000;
  }

  .contact2 {
    position: absolute;
    top: 95%;
    left: 77%;
    color: black !important;
    font-size: 24px !important;
    font-weight: 1000;
  }

  .plate1 {
    position: absolute;
    top: 65%;
    left: 13%;
    transform: translate(-50%, 1000%);
    color: black !important;
    font-size: 24px !important;
    font-weight: 1000;
  }

  .plate2 {
    position: absolute;
    top: 103%;
    left: 60%;
    color: black !important;
    font-size: 24px !important;
    font-weight: 1000;
  }

  .city1 {
    position: absolute;
    top: 65%;
    left: 37%;
    transform: translate(-50%, 1000%);
    color: black !important;
    font-size: 24px !important;
    font-weight: 1000;
  }

  .city2 {
    position: absolute;
    top: 103%;
    left: 83%;
    color: black !important;
    font-size: 24px !important;
    font-weight: 1000;
  }

  .association1 {
    position: absolute;
    top: 29%;
    left: 33%;
    transform: translate(-50%, -80%);
    color: black !important;
    font-size: 28px !important;
    font-weight: 1000;
  }

  .association2 {
    position: absolute;
    top: 29%;
    left: 95%;
    transform: translate(-50%, -80%);
    color: black !important;
    font-size: 28px !important;
    font-weight: 1000;
    width: 10in;
  }
}

/* Printing */
@media print {
  /* .c1 {
    margin-top: 20px;
  } */
  .qr1 {
    width: 7% !important;
    height: 10% !important;
    margin: 1%;
    position: absolute;
    top: 60% !important;
    left: 7%;
    transform: translate(-50%, -80%);
    background-image: url("@/assets/qr.png");
    background-size: cover;
    background-repeat: no-repeat;
  }

  .qr2 {
    width: 7% !important;
    height: 10% !important;
    margin: 1%;
    position: absolute;
    top: 52%;
    left: 53%;
    background-image: url("@/assets/qr.png");
    background-size: cover;
    background-repeat: no-repeat;
  }

  .id2 {
    width: 15%;
    height: 18%;
    margin: 1%;
    position: absolute;
    top: 30%;
    left: 51%;
    /*  background-image: url("@/assets/images.png"); */
    /* background-size: cover;
    background-repeat: no-repeat; */
  }

  .id1 {
    width: 15%;
    height: 18%;
    margin: 1%;
    position: absolute;
    top: 44.5%;
    left: 8.5%;
    transform: translate(-50%, -80%);
    /*  background-image: url("@/assets/images.png"); */
    /* background-size: cover;
    background-repeat: no-repeat; */
  }

  .city1 {
    position: absolute;
    top: 38%;
    left: 37%;
    transform: translate(-50%, 1000%);
    color: black !important;
    font-size: 28px !important;
    font-weight: 1000;
  }

  .city2 {
    position: absolute;
    top: 68%;
    left: 83%;
    color: black !important;
    font-size: 28px !important;
    font-weight: 1000;
  }

  .plate1 {
    position: absolute;
    top: 38%;
    left: 13%;
    transform: translate(-50%, 1000%);
    color: black !important;
    font-size: 28px !important;
    font-weight: 1000;
  }

  .plate2 {
    position: absolute;
    top: 68%;
    left: 60%;
    color: black !important;
    font-size: 26px !important;
    font-weight: 1000;
  }

  .contact1 {
    position: absolute;
    top: 32.5%;
    left: 36%;
    transform: translate(-50%, 1000%);
    color: black !important;
    font-size: 28px !important;
    font-weight: 700;
  }

  .contact2 {
    position: absolute;
    top: 62.5%;
    left: 78%;
    color: black !important;
    font-size: 28px !important;
    font-weight: 700;
  }

  .name1 {
    position: absolute;
    top: 29%;
    left: 36%;
    transform: translate(-50%, 1000%);
    color: black !important;
    font-size: 28px !important;
    font-weight: 700;
  }

  .name2 {
    position: absolute;
    top: 59%;
    left: 75%;
    color: black !important;
    font-size: 28px !important;
    font-weight: 700;
  }

  .control1 {
    position: absolute;
    top: 42%;
    left: 36%;
    transform: translate(-50%, 450%);
    color: black !important;
    font-size: 28px !important;
    font-weight: 700;
  }

  .control2 {
    position: absolute;
    top: 55%;
    left: 80%;
    color: black !important;
    font-size: 28px !important;
    font-weight: 700;
  }

  .license1 {
    width: 39%;
    height: 23.5%;
    margin: 1%;
    position: absolute;
    top: 26.2%;
    left: -1%;
    transform: translate(35%, 10%);
    /*  background-image: url("@/assets/license.png"); */
    background-size: cover;
    background-repeat: no-repeat;
  }

  .license2 {
    width: 36%;
    height: 23.5%;
    margin: 1%;
    position: absolute;
    top: 28.5%;
    left: 63.8%;
    background-size: cover;
    background-repeat: no-repeat;
  }

  .association1 {
    position: absolute;
    top: 19.5%;
    left: 32%;
    transform: translate(-50%, -80%);
    color: black !important;
    font-size: 30px !important;
    font-weight: 700;
  }

  .association2 {
    position: absolute;
    /* align-items: center; */
    align-content: center;
    top: 17%;
    left: 70%;
    color: black !important;
    font-size: 30px !important;
    font-weight: 700;
  }

  .background-container {
    background-image: url("@/assets/bg.png");

    background-size: cover;
    background-repeat: no-repeat;
    height: 2000%;
    width: 250% !important;

  }


  #print-area {
    size: 100%;
    margin: 0.22 0.31 0.96 0.31 !important;
  }
}
</style>