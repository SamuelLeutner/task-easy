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

      <div class="account-setup">
        <div class="form">
          <DynamicButtonComponent
            :title="'Última pergunta: como você nos conheceu?'"
            :subTitle="'Você poderá adicionar outras opções posteriormente'"
            :buttons="buttonAboutUs"
            @updateSelected="selectedAboutUs"
            name="team"
          />
        </div>

        <div class="buttons">
          <ButtonReturnStep
            :isValid="buttonActive"
            @click="saveSelectionsAndChangeForm(FormTypes.FOURTH_FORM)"
          />
          <ButtonNextStep :isValid="buttonActive" @click="SendDataToBackend" />
        </div>
      </div>
    </div>

    <div class="right">
      <div class="align-image">
        <div class="container-img">
          <img
            class="img-signup"
            src="@/assets/user-ask.png"
            alt="Imagem de SignUp"
          />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters, useStore } from "vuex";
import { defineComponent } from "vue";
import ButtonNextStep from "@/components/Buttons/ButtonNextStep.vue";
import ButtonReturnStep from "@/components/Buttons/ButtonReturnStep.vue";
import { FormTypes } from "@/components/ViewFormTypes/Views/FormComponent.vue";
import DynamicButtonComponent from "@/components/FormTypes/DynamicButtonComponent.vue";
import { sendDataToBackend } from "@/services/HttpService";
import { useRouter } from "vue-router";

export default defineComponent({
  name: "FifthForm",
  components: {
    ButtonNextStep,
    ButtonReturnStep,
    DynamicButtonComponent,
  },
  data() {
    return {
      buttonActive: false,
    };
  },
  computed: {
    ...mapGetters("user_type", ["getAboutUs"]),
  },
  methods: {
    selectedAboutUs(target) {
      this.buttonActive = true;
      this.$store.dispatch("user_type/saveAboutUs", target);
    },

    saveSelectionsAndChangeForm(formType) {
      this.$emit("changeForm", formType);
    },
  },
  setup() {
    const store = useStore();

    const router = useRouter();

    const buttonAboutUs = [
      { text: "Anúncio do YouTube", nameInput: "options", label: "2" },
      { text: "Consultor(a)", nameInput: "options", label: "4" },
      {
        text: "Mídias sociais",
        nameInput: "options",
        label: "6",
      },
      {
        text: "Outdoor",
        nameInput: "options",
        label: "7",
      },
      { text: "Amigo / Colega", nameInput: "options", label: "8" },
      {
        text: "Mecanismo de busca",
        nameInput: "options",
        label: "10",
      },
      {
        text: "Outro",
        nameInput: "options",
        label: "11",
      },
    ];

    const SendDataToBackend = async () => {
      try {
        const data = {
          ...store.getters["user_type/getUserType"],
          ...store.getters["user/getUser"],
        };

        await sendDataToBackend(data);

        router.push("/workspace");
      } catch (error) {
        console.error("Erro ao enviar dados para o backend:", error);
        alert("Erro ao enviar dados para o backend");
      }
    };

    return {
      store,
      FormTypes,
      buttonAboutUs,
      SendDataToBackend,
    };
  },
});
</script>

<style scoped lang="scss">
.auth {
  width: 100%;
  height: 100%;
  display: flex;
  flex-direction: row;
  justify-content: space-around;

  .left {
    flex: 1;
    display: flex;
    position: relative;
    flex-direction: column;
    padding: 64px calc(2 * 64px);

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

    .account-setup {
      flex: 10;
      height: 100%;
      position: relative;

      .form {
        flex: 8;
        margin-top: 0;

        .title {
          margin: unset;
          color: #323338;
          font-size: 24px;
          text-align: left;
          font-weight: 500;
          max-width: 600px;
          overflow: hidden;
          line-height: 30px;
          margin-bottom: 29px;
          letter-spacing: -1px;
          white-space: initial;
        }
        .input-container {
          gap: 8px;
          display: flex;
          flex-wrap: wrap;
          align-items: start;
          flex-direction: row;
        }
      }
    }

    .buttons {
      left: 0;
      bottom: 8px;
      right: 16px;
      display: flex;
      position: absolute;
      justify-content: space-between;
      width: calc(100% + 2px);
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

@media (max-width: 1200px) {
  .auth {
    .left {
      width: 100%;
    }
  }
}

@media (max-width: 750px) {
  .left {
    min-width: 50%;
    width: unset;
    overflow: clip;
    padding: 32px calc(2 * 32px);
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

    .left {
      padding: 12px calc(2 * 12px);
    }
  }
}
</style>
