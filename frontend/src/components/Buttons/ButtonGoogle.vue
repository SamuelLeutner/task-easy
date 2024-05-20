<template>
  <div class="ButtonGoogle">
    <button
      @click="loginWithGoogle"
      type="submit"
      class="google btn btn-outline-light"
    >
      <img src="../../assets/google.png" alt="Google logo" />
      Continuar com o Google
    </button>
  </div>
</template>

<script>
import router from "@/router";
import { app } from "@/services/firebase";
import { getAuth, GoogleAuthProvider, signInWithPopup } from "firebase/auth";
import { mapActions } from "vuex";

export default {
  name: "ButtonGoogle",
  methods: {
    ...mapActions(["setUser"]),

    async loginWithGoogle() {
      const auth = getAuth(app);
      const provider = new GoogleAuthProvider();

      try {
        const result = await signInWithPopup(auth, provider);
        const user = result.user;

        this.setUser(user);
        console.log(user);

        router.push({
          name: "SignupEmail",
          query: { name: user.displayName, email: user.email },
        });
      } catch (error) {
        alert(error);
      }
    },
  },
};
</script>

<style scoped lang="scss">
.google {
  gap: 8px;
  font-size: 14px;
  padding: 9px;
  height: 40px;
  width: 400px;
  display: flex;
  align-items: center;
  justify-content: center;
  img {
    width: 16px;
    height: 16px;
  }
}

.btn {
  color: #323338;
  line-height: 20px;
  border: 1px solid #c3c6d4;
  background-color: transparent;
}
.btn:hover {
  background-color: #dcdfec;
  border: 1px solid #c3c6d4;
}
</style>
