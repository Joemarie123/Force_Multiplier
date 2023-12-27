import { createStore } from "vuex";
import insertfileModule from './insertfile';


const store = createStore({
  modules: {

    insertfile: insertfileModule,
  }
});


export default store;