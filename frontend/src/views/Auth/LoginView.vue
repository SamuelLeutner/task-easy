<template>
  <header>
    <div class="top-header">
      <img
        class="account-logo"
        src="@/assets/logo.png"
        alt="Logotipo do TaskYZY"
      />
    </div>
  </header>
  <div class="auth">
    <div class="login">
      <h1>Fazer login em sua conta</h1>
      <div class="subtitle">
        <label>Insira seu endereço de e-mail profissional</label>
        <div class="inputs">
          <InputEmail class="input-email" v-model="email" />

          <InputFormField
            class="input-password"
            inputId="password"
            placeholder="Insira a sua senha"
            v-model="password"
            :errorId="'password-error'"
            :type="'password'"
            :errorMessage="errors.passwordError"
            autocomplete="new-password"
          />
          <router-link class="change-password" to="/forgot-password"
            >Esqueceu sua senha?
          </router-link>
        </div>

        <ButtonNextStep
          class="button"
          :isValid="(isValid = true)"
          @click="handleLogin"
        />

        <div class="container-divider">
          <span class="divider"></span>
          <span class="text-divider">Ou</span>
          <span class="divider"></span>
        </div>

        <ButtonGoogle class="buttonGoogle" />

        <div class="terms">
          <span>Ainda não tem uma conta? </span>
          <router-link class="terms-links" to="/signup"
            >Cadastra-se</router-link
          >
          <br />
          <span>Não consegue fazer login? </span>
          <router-link class="terms-links" to="/privacy-policy"
            >Visite nossa Central de ajuda.</router-link
          >
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { computed } from "vue";
import { useStore } from "vuex";
import InputEmail from "@/components/Inputs/InputEmail.vue";
import ButtonGoogle from "@/components/Buttons/ButtonGoogle.vue";
import InputFormField from "@/components/Inputs/InputFormField.vue";
import ButtonNextStep from "@/components/Buttons/ButtonNextStep.vue";
import { login } from "@/services/login-logout";

export default {
  name: "LoginView",
  components: {
    InputFormField,
    InputEmail,
    ButtonGoogle,
    ButtonNextStep,
  },
  data() {
    return {
      email: "",
      password: "",
      isValid: false,
      user: null,
    };
  },
  methods: {
    async handleLogin() {
      try {
        const user = await login(this.email, this.password);
        this.user = user;
        this.$router.push("/workspace");
      } catch (error) {
        alert("Erro ao fazer login: Senha ou email inválidos.");
      }
    },
  },
  setup() {
    const store = useStore();
    const errors = computed(() => store.getters["user/errors"]);

    return {
      errors,
    };
  },
};
</script>

<style scoped lang="scss">
.top-header {
  width: 100%;
  height: 65px;
  display: block;
  padding-top: 10px;
  padding-left: 8px;
  background: #f7f7f7;
  border-bottom: 1px solid #e0e0e0;

  .auth {
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: center;
    flex-grow: 1;
    padding: 40px;
  }

  .account-logo {
    width: 180px;
    height: 44px;
    margin-left: 12px;
  }
}

.login {
  display: flex;
  margin-top: 40px;
  text-align: center;
  align-items: center;
  flex-direction: column;
  justify-content: center;

  h1 {
    font-size: 40px;
    font-weight: 300;
    margin-bottom: 8px;
  }

  .subtitle {
    display: flex;
    align-items: center;
    flex-direction: column;
    justify-content: center;
  }

  .inputs {
    gap: 5px;
    margin: 0;
    width: 100%;
    min-height: 0;
    display: flex;
    flex-direction: column;
  }

  .change-password {
    font-size: 14px;
    text-align: start;
  }

  .input-password {
    width: 100%;
    font-size: 18px;
    min-height: 40px;
    line-height: 20px;
  }

  label {
    flex-grow: 1;
    padding: 20px;
    display: flex;
    align-items: center;
    flex-direction: column;
    justify-content: flex-start;
  }
}

.button {
  width: 100%;
  margin-top: 25px;
}

.container-divider {
  gap: 8px;
  width: 100%;
  margin: 16px;
  display: grid;
  align-content: center;
  grid-template-columns: 1fr auto 1fr;

  .divider {
    height: 50%;
    align-self: flex-end;
    border-top: 1px solid;
    border-color: #c3c6d4;
  }
}

.buttonGoogle {
  width: 250px;
  display: flex;
  align-content: center;
  justify-content: center;
}

.terms {
  margin: 32px;
  font-size: 16px;
  font-weight: 400;
  text-align: center;
  font-style: normal;
}
</style>
