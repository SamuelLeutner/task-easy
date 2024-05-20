const state = {
  user: {
    formData: {
      email: "",
      name: "",
      password: "",
      accountName: "",
    },
    errors: {
      emailError: null,
      nameError: null,
      passwordError: null,
      accountNameError: null,
    },
  },
};

const actions = {
  setUser({ commit }, user) {
    commit("setUser", user);
  },

  setEmail({ commit }, email) {
    commit("setEmail", email);
  },

  async setFormData({ commit }, formData) {
    commit("setFormData", formData);
  },
};

const mutations = {
  setEmail(state, email) {
    state.user.formData.email = email;
  },

  setUser(state, user) {
    state.user.formData = user;
  },

  setFormData(state, formData) {
    state.user.formData = formData;
  },
};

const getters = {
  errors: (state) => state.user.errors,
  formData: (state) => state.user.formData,
  formValidation: (state) => state.user.formValidation,
  getUser: (state) => {
    return {
      email: state.user.formData.email,
      name: state.user.formData.name,
      password: state.user.formData.password,
      accountName: state.user.formData.accountName,
    };
  },
};

export default {
  state,
  actions,
  getters,
  mutations,
  namespaced: true,
};
