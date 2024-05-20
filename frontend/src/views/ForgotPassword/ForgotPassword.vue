<template>
  <div class="change-password">
    <h1>
      Recuperação de
      <span class="password">senha</span>
    </h1>
    <div class="subtitle">
      <label>
        Se encontrarmos um usuário com o endereço de e-mail na conta, você
        receberá um e-mail em breve.
      </label>
      <label>
        Se você não receber o e-mail em alguns minutos, confira sua pasta de
        lixeira/spam ou acesse nosso
        <router-link to="/faq">Perguntas frequentes</router-link>
      </label>
      <label>
        Não tem certeza de qual e-mail você usou para sua conta taskyzy.com, ou
        está em dúvida sobre com qual conta está associado?
        <router-link to="/contact-us">Entre em contato conosco</router-link>
      </label>
      <div class="inputs">
        <InputEmail class="input-email" v-model="email" />
      </div>

      <ButtonNextStep
        class="button"
        :isValid="(isValid = true)"
        @click="handlePasswordResetEmail"
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
import { ref } from "vue";
import InputEmail from "@/components/Inputs/InputEmail.vue";
import ButtonNextStep from "@/components/Buttons/ButtonNextStep.vue";
import { AuthService } from "@/services/forgot-password";

export default {
  name: "ChangePassword",
  components: {
    InputEmail,
    ButtonNextStep,
  },
  setup() {
    const email = ref("");
    const isValid = ref(false);

    const handlePasswordResetEmail = async () => {
      try {
        if (!email.value) {
          alert("Por favor, preencha o campo de email.");
          return;
        }

        await AuthService.sendPasswordResetEmail(email.value);
        alert("Email de recuperação de senha enviado com sucesso!");
      } catch (error) {
        console.error(error);
        if (error.response && error.response.status === 500) {
          alert(
            "Erro interno do servidor. Por favor, tente novamente mais tarde."
          );
        } else {
          alert(
            "Erro ao enviar o email de recuperação de senha. Por favor, tente novamente."
          );
        }
      }
    };

    return {
      email,
      isValid,
      handlePasswordResetEmail,
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
