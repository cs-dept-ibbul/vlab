import Vue from 'vue';   
import Vuex from 'vuex';
Vue.use(Vuex);

// create state 
const state = {
	currentUser: null
};

const mutations = {
      updateUser(state, user) {
        state.loggedIn = user; 
      }
};

const actions = {	
    setUser({commit}, user){
        commit('updateUser', user)
    }
};

/*getters ={
    currentUser: state.loggedIn
};*/
const store = new Vuex.Store({
	state,
	mutations,
	actions
});
export default store;
