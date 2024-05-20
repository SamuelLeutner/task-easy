<template>
  <div class="auth">
    <div class="left">
      <div class="form container">
        <div class="align-text-left">
          <h1 class="title">Boas-vindas à taskyzy.com</h1>
          <h5 class="description">
            Comece já – é grátis. Não é necessário cartão de crédito.
          </h5>
        </div>
        <div class="align">
          <ButtonGoogle></ButtonGoogle>

          <div class="container-divider">
            <span class="divider"></span>
            <span class="text-divider">Ou</span>
            <span class="divider"></span>
          </div>

          <InputEmail
            v-model="emailValue"
            @email-validated="handleEmailValidated"
          />
          <button
            type="submit"
            class="btn btn-primary cadastrar-user"
            data-testid="button"
            :disabled="!isEmailValid"
            @click="routeEmail"
          >
            Continuar
          </button>
        </div>
        <div class="terms">
          <label class="terms-first-line">
            Ao continuar, você concorda com os
          </label>
          <div class="terms-second-line">
            <router-link class="terms-links links" to="/terms-services">
              Termos de serviço
            </router-link>
            <label> e </label>
            <router-link class="terms-links links" to="/privacy-policy">
              Políticas de privacidade.
            </router-link>
          </div>
        </div>
      </div>

      <div class="footer-container">
        <footer class="link-login">
          <span class="description-footer">
            Já tenho uma conta?
            <router-link class="link-login links" to="/login">
              Login
            </router-link>
          </span>
        </footer>
      </div>
    </div>
    <div class="right">
      <div class="align-image">
        <div class="container-img">
          <img
            class="img-signup"
            src="@/assets/signup-image.png"
            alt="Imagem de SignUp"
          />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import InputEmail from "@/components/Inputs/InputEmail.vue";
import ButtonGoogle from "@/components/Buttons/ButtonGoogle.vue";
import { useRouter } from "vue-router";
import { ref } from "vue";
import store from "@/store";

export default {
  name: "SignUpView",
  components: {
    InputEmail,
    ButtonGoogle,
  },
  setup() {
    const router = useRouter();
    const emailValue = ref("");

    const isEmailValid = ref(false);

    const handleEmailValidated = (email) => {
      store.dispatch("user/setEmail", email);
      isEmailValid.value = true;
    };

    const routeEmail = () => {
      if (isEmailValid.value) {
        router.push("/signup/email");
      }
    };

    return {
      emailValue,
      routeEmail,
      isEmailValid,
      handleEmailValidated,
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
    padding: 0 56px;
    align-items: center;
    flex-direction: column;
    justify-content: center;

    .form {
      width: 100%;
      display: flex;
      align-items: center;
      flex-direction: column;
      justify-content: center;

      .align-text-left {
        display: flex;
        padding: 0 4px;
        align-items: center;
        flex-direction: column;

        .title {
          font-size: 32px;
          font-weight: 500;
          line-height: 40px;
          font-style: normal;
          margin-bottom: 8px;
          text-align: center;
          letter-spacing: -0.5px;
        }

        .description {
          font-size: 14px;
          font-weight: 400;
          line-height: 22px;
          text-align: center;
          font-style: normal;
        }
      }

      .align {
        width: 400px;
        display: flex;
        margin-top: 50px;
        align-items: center;
        flex-direction: column;
        justify-content: center;

        .container-divider {
          gap: 8px;
          width: 400px;
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

        .text-divider {
          font-size: 16px;
          font-weight: 400;
          line-height: 24px;
          font-style: normal;
        }

        .cadastrar-user {
          width: 100%;
          height: 40px;
          font-size: 16px;
          margin-top: 22px;
          line-height: 22px;
        }
      }

      .terms {
        margin: 32px;
        font-size: 16px;
        font-weight: 400;
        text-align: center;
        font-style: normal;
      }
    }

    .footer-container {
      width: 100%;
      display: flex;
      bottom: 0.2%;
      position: absolute;
      align-items: center;
      margin-top: auto;
      margin-bottom: 64px;
      flex-direction: column;

      .login {
        gap: 4px;
        width: 100%;
        display: flex;
        align-items: center;
        flex-direction: row;
        justify-content: center;

        .link-login {
          color: #323338;
          font-weight: 500;
          text-decoration: none;

          &:hover {
            text-decoration: underline;
          }
        }
      }

      .description-footer {
        font-size: 14px;
      }
    }
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

.links {
  text-decoration: none;
}

@media (max-width: 1200px) {
  .auth {
    .left {
      width: 100%;
      padding: 16px;
      text-align: center;
    }
  }
}

@media (max-width: 750px) {
  .left {
    min-width: 50%;
    width: unset;

    .form {
      width: 100%;
      display: flex;
      overflow: clip;
      align-content: center;
      overflow-clip-margin: content-box;
    }
  }

  .right {
    min-width: 40%;
    align-items: flex-start;
  }
}

@media (max-width: 400px) {
  .auth {
    align-items: flex-start;
  }
}
</style>
