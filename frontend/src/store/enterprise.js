const state = {
  reason: "",
  currentPosition: "",
  quantityTeam: "",
  quantityEnterprise: "",
  managementArea: "",
  focusArea: "",
  aboutUs: "",
};

const mutations = {
  setReason(state, data) {
    state.reason = data;
  },
  setCurrentPosition(state, data) {
    state.currentPosition = data;
  },
  setQuantityTeam(state, data) {
    state.quantityTeam = data;
  },
  setQuantityEnterprise(state, data) {
    state.quantityEnterprise = data;
  },
  setManagementArea(state, data) {
    state.managementArea = data;
  },
  setFocusArea(state, data) {
    state.focusArea = data;
  },
  setAboutUs(state, data) {
    state.aboutUs = data;
  },
};

const actions = {
  saveReason({ commit }, data) {
    commit("setReason", data);
  },

  saveCurrentPosition({ commit }, data) {
    commit("setCurrentPosition", data);
  },

  saveQuantityTeam({ commit }, data) {
    commit("setQuantityTeam", data);
  },
  saveQuantityEnterprise({ commit }, data) {
    commit("setQuantityEnterprise", data);
  },

  saveManagementArea({ commit }, data) {
    commit("setManagementArea", data);
  },

  saveFocusArea({ commit }, data) {
    commit("setFocusArea", data);
  },

  saveAboutUs({ commit }, data) {
    commit("setAboutUs", data);
  },
};

const getters = {
  getReason: (state) => state.reason,
  getCurrentPosition: (state) => state.currentPosition,
  getQuantityTeam: (state) => state.quantityTeam,
  getQuantityEnterprise: (state) => state.quantityEnterprise,
  getManagementArea: (state) => state.managementArea,
  getFocusArea: (state) => state.focusArea,
  getAboutUs: (state) => state.aboutUs,

  getUserType: (state) => {
    return {
      reason: state.reason,
      currentPosition: state.currentPosition,
      quantityTeam: state.quantityTeam,
      quantityEnterprise: state.quantityEnterprise,
      managementArea: state.managementArea,
      focusArea: state.focusArea,
      aboutUs: state.aboutUs,
    };
  },
};

export default {
  namespaced: true,
  state,
  mutations,
  actions,
  getters,
};
