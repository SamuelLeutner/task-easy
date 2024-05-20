<template>
  <div class="auth">
    <div class="left">
      <div class="header">
        <nav class="navbar">
          <router-link to="/" class="navbar-brand">
            <img src="@/assets/logo.png" alt="Logo TaskYZY" />
          </router-link>
        </nav>
      </div>

      <form class="form" @submit.prevent="validateFormAndRedirect">
        <div class="align-form">
          <h1 class="title">Crie sua conta</h1>

          <InputFormField
            label="Nome completo"
            inputId="name"
            placeholder="Insira seu nome completo"
            v-model="formData.name"
            :errorId="'name-error'"
            :type="'text'"
            :errorMessage="errors.nameError"
          />

          <InputFormField
            label="Senha"
            inputId="password"
            placeholder="Insira pelo menos 8 caracteres"
            v-model="formData.password"
            :errorId="'password-error'"
            :type="'password'"
            :errorMessage="errors.passwordError"
            autocomplete="new-password"
          />

          <InputFormField
            label="Nome da conta"
            inputId="accountName"
            placeholder="Por exemplo, o nome da empresa ou departamento"
            v-model="formData.accountName"
            :errorId="'accountname-error'"
            :type="'text'"
            :errorMessage="errors.accountNameError"
          />
        </div>
      </form>

      <div class="div-button">
        <div class="form-submit">
          <button
            type="submit"
            class="btn btn-primary cadastrar-user"
            data-testid="button"
            :disabled="isValidForm"
            @click="validateFormAndRedirect"
          >
            Continuar
          </button>
        </div>
      </div>
    </div>

    <div class="right">
      <div class="align-image">
        <div class="container-img">
          <img
            class="img-signup"
            src="@/assets/email-signup.png"
            alt="Imagem de SignUp"
          />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { computed, ref } from "vue";
import { useRouter } from "vue-router";
import { ValidateFormData } from "@/services/ValidateFormData";
import InputFormField from "@/components/Inputs/InputFormField.vue";
import store from "@/store";

export default {
  name: "UserDataView",
  components: { InputFormField },
  setup() {
    const router = useRouter();
    const isValidForm = ref(false);

    const errors = computed(() => store.getters["user/errors"]);

    const formData = computed(() => store.getters["user/formData"]);

    const validateFormAndRedirect = async (event) => {
      event.preventDefault();

      const validationErrors = ValidateFormData(formData.value);

      if (Object.keys(validationErrors).length === 0) {
        try {
          await store.dispatch("user/setFormData", formData.value);
          isValidForm.value = true;
          router.push("/type-user");
        } catch (error) {
          console.error("Erro ao enviar dados para o backend.");
        }
      } else {
        store.commit("user/setValidationErrors", validationErrors);
      }
    };

    return {
      errors,
      formData,
      isValidForm,
      validateFormAndRedirect,
    };
  },
};
</script>

<style scoped lang="scss">
.auth {
  flex: 1;
  z-index: 1;
  width: 100%;
  height: 100%;
  display: flex;
  overflow: hidden;
  position: relative;
  align-items: center;
  background-size: cover;
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-position: left top;

  .left {
    flex: 1;
    height: 100%;
    display: flex;
    position: relative;
    flex-direction: column;
    padding: 40px calc(2 * 40px);

    .header {
      flex: 1;
      width: 100%;
      display: block;

      .navbar {
        margin-bottom: 64px;

        img {
          height: 34px;
        }
      }
    }

    .form {
      flex: 8;
      margin-top: 0;
      position: relative;

      .title {
        margin: unset;
        color: #323338;
        font-size: 24px;
        line-height: 30px;
        text-align: left;
        font-weight: 500;
        max-width: 600px;
        overflow: hidden;
        margin-bottom: 29px;
        letter-spacing: -1px;
        white-space: initial;
      }
    }

    .div-button {
      right: 0;
      bottom: 8px;
      display: flex;
      position: sticky;
      width: calc(100% + 2px);
      justify-content: flex-end;

      .form-submit {
        display: flex;
        align-items: center;
        justify-content: flex-end;
      }

      .cadastrar-user {
        color: #fff;
        width: 131px;
        height: 40px;
        display: flex;
        font-size: 16px;
        line-height: 22px;
        align-items: center;
        justify-content: center;
        font-family: "Figtree", sans-serif;

        img {
          margin-left: 8px;
        }
      }
    }
  }

  .auth {
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: row;
    justify-content: space-around;
  }

  .right {
    width: 40%;
    height: 100%;
    overflow: hidden;
    min-width: unset;
    border-radius: unset;

    .align-image {
      width: 100%;
      height: 100%;
      margin-right: 0;

      .container-img {
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;

        .img-signup {
          width: 100%;
          height: 100%;

          img {
            overflow: clip;
            overflow-clip-margin: content-box;
          }
        }
      }
    }
  }
}

@media (max-width: 1200px) {
  .auth {
    .left {
      width: 100%;
    }
  }
}

@media (max-width: 850px) {
  .left {
    min-width: 50%;
    width: unset;
    overflow: clip;
    overflow-clip-margin: content-box;
  }

  .right {
    min-width: 40%;
    align-items: flex-start;
  }
}

@media (max-width: 600px) {
  .auth {
    align-items: flex-start;
  }
}
</style>
