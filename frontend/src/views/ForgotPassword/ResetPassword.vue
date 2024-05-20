<template>
  <div class="change-password">
    <h1>Alteração de senha</h1>
    <div class="subtitle">
      <div class="inputs">
        <InputFormField
          v-model="password"
          placeholder="Digite sua nova senha"
          type="password"
          label="Nova Senha"
        />

        <InputFormField
          v-model="password_confirmation"
          placeholder="Digite a confirmação da senha"
          type="password"
          label="Confirme a Senha"
        />
      </div>

      <ButtonNextStep
        class="button"
        :isValid="(isValid = true)"
        @click="handlePasswordReset"
      />

      <div class="container-divider">
        <span class="divider"></span>
        <span class="text-divider">Ou</span>
        <span class="divider"></span>
      </div>

      <div class="terms">
        <span>Lembra-se da senha? </span>
        <router-link class="terms-links" to="/login">
          Voltar para o login
        </router-link>
      </div>
    </div>
  </div>
</template>

<script>
import { onMounted, ref } from "vue";
import InputFormField from "@/components/Inputs/InputFormField.vue";
import ButtonNextStep from "@/components/Buttons/ButtonNextStep.vue";
import { AuthService } from "@/services/forgot-password";
import { useRouter } from "vue-router";

export default {
  name: "ChangePasswordRecovery",
  components: {
    InputFormField,
    ButtonNextStep,
  },
  setup() {
    const email = ref("");
    const password = ref("");
    const password_confirmation = ref("");
    const token = ref("");
    const router = useRouter();

    onMounted(() => {
      const urlSearchParams = new URLSearchParams(window.location.search);
      const params = Object.fromEntries(urlSearchParams.entries());
      if (params.token) {
        token.value = params.token;
      } else {
        console.error("Token não encontrado na URL");
      }
      if (params.email) {
        email.value = params.email;
      } else {
        console.error("E-mail não encontrado na URL");
      }
    });

    const handlePasswordReset = async () => {
      try {
        if (
          !token.value ||
          !password.value ||
          !password_confirmation.value ||
          !email.value
        ) {
          alert("Por favor, preencha todos os campos.");
          return;
        }

        if (password.value !== password_confirmation.value) {
          alert("As senhas não coincidem. Por favor, tente novamente.");
          return;
        }

        const response = await AuthService.resetPassword(
          email.value,
          token.value,
          password.value,
          password_confirmation.value
        );

        alert(response.message);
        router.push("/");
      } catch (error) {
        console.error(error);
        alert("Erro ao redefinir a senha. Por favor, tente novamente.");
      }
    };

    return {
      email,
      password,
      password_confirmation,
      handlePasswordReset,
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

.change-password {
  display: flex;
  margin-top: 40px;
  text-align: center;
  align-items: center;
  flex-direction: column;
  justify-content: center;

  .password {
    font-weight: 700;
  }

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
</style>
