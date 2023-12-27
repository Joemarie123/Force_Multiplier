import axios from 'axios';

const state = () => ({
  users: [],
  details:[],
  picinsert:[],
 /*  user: {}, */
  auth: {},
})

const getters = {
  getUsers(state) {
    console.log("Get Users",state);
    return state.users;
  },

  getPicinsert(state) {
    console.log("Get PicInsert",state);
    return state.picinsert;
  },


  getDetails(state) {
    console.log("Get Details",state.details);
    return state.details;
  },



/*   getUser(state){
    return state.user;
  }, */

  getAuth(state){
    return state.auth;
  },

}

const mutations = {

  setUsers(state, payload){
    console.log("Set Users",payload);
    state.users = payload;
  },

  setDetails(state, payload){
    console.log("Set Details",payload);
    state.details = payload;
    state.details.fullname=state.details.lastname + ", " + state.details.firstname + " " + state.details.middlename
  },

  setPicinsert(state, payload){
    console.log("Set Details",payload);
    state.picinsert = payload;
  },
/*   setUser(state, payload){
    state.user = payload;
  },
 */
    setAuth(state, payload){
    state.auth = payload;
  },

}

const actions = {

  async fetchDetails({ commit }, payload) {
    try {
      ///  let res = await axios.post(`http://10.0.1.23:82/HRQR/eventdetails.php`, payload);
        let res = await axios.post(`/fmdetails.php`,payload);
        console.log("data from db=", res.data.user)
        commit('setDetails', res.data.user[0]);
     
    }
    catch (error) {
        console.error('Error fetching:', error);
    }
},



  async fetchUsers({commit}){
    let res = await axios.get(`/fmlist.php`);
    commit('setUsers', res.data.users);
  },



  async login({commit}, payload){
    console.log("env=",)
   // let res = await axios.post('http://10.0.1.23:82/HRQR1/login.php', payload);
 
    let res = await axios.post(`/login.php`,payload);

    console.log("Res Data=",res.data)
    localStorage.setItem('user', JSON.stringify(res.data.user));
    commit("setAuth", res.data.user);
   
    if(res.data.auth == "passed")
    {
      return 1
    }
    else{
      return 0
    } 

   /*  if(res.data.auth == "passed"){

    if(res.data.user.admin){
      return 1
    }else{
      return 2
    }

  }else{
  
    return 0
  
  } */

   
  },


  async InsertFileNew({commit}, payload){
    let res = await axios.post(`/insertupdate.php`,payload);
    commit('setUsers', res.data);
  },

  async InsertPictures({commit}, payload){
    let res = await axios.post(`/pics.php`,payload);
    commit('setUsers', res.data);
  },

}

export default {
  namespaced: true,
  state,
  actions,
  getters,
  mutations
}