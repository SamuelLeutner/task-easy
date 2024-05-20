import { createStore } from "vuex";
import user from "./user";
import user_type from "./enterprise";

export default createStore({
  modules: {
    user,
    user_type,
  },
});
