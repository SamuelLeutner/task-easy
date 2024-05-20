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
            :title="'Olá! O que te traz aqui hoje?'"
            :buttons="reasons"
            @updateSelected="changeReason"
            name="reason"
          />

          <div class="options">
            <div v-if="getReason === 'Profissional' && getReason !== ''">
              <DynamicButtonComponent
                :title="'O que melhor descreve seu cargo atual?'"
                :buttons="buttonsProfessional"
                @updateSelected="selectedPosition"
                name="Profissional"
              />
            </div>

            <div v-if="getReason === 'Educacional' && getReason !== ''">
              <DynamicButtonComponent
                :title="'O que melhor descreve seu cargo atual?'"
                :buttons="buttonsEducational"
                @updateSelected="selectedPosition"
                name="Educacional"
              />
            </div>
          </div>

          <div class="buttons">
            <ButtonNextStep
              v-if="getReason !== 'Pessoal'"
              :isValid="buttonActive"
              @click="saveSelectionsAndChangeForm(FormTypes.SECOND_FORM)"
            />
            <ButtonNextStep
              v-if="getReason === 'Pessoal'"
              :isValid="buttonActive"
              @click="saveSelectionsAndChangeForm(FormTypes.THIRD_FORM)"
            />
          </div>
        </div>
      </div>
    </div>

    <div class="right">
      <div class="align-image">
        <div class="container-img">
          <img
            class="img-signup"
            src="@/assets/user-type.png"
            alt="Imagem de SignUp"
          />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import { defineComponent } from "vue";
import ButtonNextStep from "@/components/Buttons/ButtonNextStep.vue";
import { FormTypes } from "@/components/ViewFormTypes/Views/FormComponent.vue";
import DynamicButtonComponent from "@/components/FormTypes/DynamicButtonComponent.vue";

export default defineComponent({
  name: "FirstForm",
  components: {
    ButtonNextStep,
    DynamicButtonComponent,
  },
  data() {
    return {
      buttonActive: false,
    };
  },
  computed: {
    ...mapGetters("user_type", ["getReason", "getCurrentPosition"]),
  },

  methods: {
    changeReason(target) {
      this.buttonActive = target === "Pessoal";
      this.$store.dispatch("user_type/saveReason", target);
    },
    selectedPosition(target) {
      this.buttonActive = true;
      this.$store.dispatch("user_type/saveCurrentPosition", target);
    },
    saveSelectionsAndChangeForm(formType) {
      this.$emit("changeForm", formType);
    },
  },

  setup() {
    const reasons = [
      { text: "Profissional", nameInput: "options", label: "1" },
      { text: "Pessoal", nameInput: "options", label: "2" },
      { text: "Educacional", nameInput: "options", label: "3" },
    ];

    const buttonsProfessional = [
      { text: "Proprietário de negócios", nameInput: "options", label: "1" },
      { text: "Líder de equipe", nameInput: "options", label: "2" },
      { text: "Membro de equipe", nameInput: "options", label: "3" },
      { text: "Freelancer", nameInput: "options", label: "4" },
      { text: "C-Level", nameInput: "options", label: "5" },
    ];

    const buttonsEducational = [
      { text: "Estudante de graduação", nameInput: "options", label: "1" },
      { text: "Estudante de pós-graduação", nameInput: "options", label: "2" },
      { text: "Membro docente", nameInput: "options", label: "3" },
      { text: "Outro", nameInput: "options", label: "4" },
    ];

    return {
      reasons,
      FormTypes,
      buttonsEducational,
      buttonsProfessional,
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
      justify-content: end;
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
