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
            :title="'Quantas pessoas há na sua equipe?'"
            :buttons="buttonsTeam"
            @updateSelected="selectedQuantityTeam"
            name="team"
          />

          <DynamicButtonComponent
            :title="'Quantas pessoas trabalham na sua empresa?'"
            :buttons="buttonsEnterprise"
            @updateSelected="selectedQuantityEnterprise"
            name="company"
          />
        </div>

        <div class="buttons">
          <ButtonReturnStep
            :isValid="buttonActive"
            @click="saveSelectionsAndChangeForm(FormTypes.FIRST_FORM)"
          />

          <ButtonNextStep
            :isValid="buttonActive"
            @click="saveSelectionsAndChangeForm(FormTypes.THIRD_FORM)"
          />
        </div>
      </div>
    </div>

    <div class="right">
      <div class="align-image">
        <div class="container-img">
          <img
            class="img-signup"
            src="@/assets/user-description.png"
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
import ButtonReturnStep from "@/components/Buttons/ButtonReturnStep.vue";

export default defineComponent({
  name: "SecondForm",
  components: {
    ButtonReturnStep,
    ButtonNextStep,
    DynamicButtonComponent,
  },
  data() {
    return {
      buttonActive: false,
    };
  },
  computed: {
    ...mapGetters("user_type", ["getQuantityTeam", "getQuantityEnterprise"]),
  },

  methods: {
    selectedQuantityTeam(target) {
      this.buttonActive = true;
      this.$store.dispatch("user_type/saveQuantityTeam", target);
    },
    selectedQuantityEnterprise(target) {
      this.$store.dispatch("user_type/saveQuantityEnterprise", target);
    },

    saveSelectionsAndChangeForm(formType) {
      this.$emit("changeForm", formType);
    },
  },
  setup() {
    const buttonsTeam = [
      { text: "1 (apenas eu)", nameInput: "options", label: "1" },
      { text: "2-5", nameInput: "options", label: "2" },
      { text: "6-10", nameInput: "options", label: "3" },
      { text: "11-15", nameInput: "options", label: "4" },
      { text: "16-25", nameInput: "options", label: "5" },
      { text: "26-50", nameInput: "options", label: "6" },
      { text: "51-100", nameInput: "options", label: "7" },
      { text: "101-500", nameInput: "options", label: "8" },
    ];

    const buttonsEnterprise = [
      { text: "1-19", nameInput: "optionsEmpresa", label: "1" },
      { text: "20-49", nameInput: "optionsEmpresa", label: "2" },
      { text: "50-99", nameInput: "optionsEmpresa", label: "3" },
      { text: "100-250", nameInput: "optionsEmpresa", label: "4" },
      { text: "251-500", nameInput: "optionsEmpresa", label: "5" },
      { text: "501-1500", nameInput: "optionsEmpresa", label: "6" },
      { text: "1500+", nameInput: "optionsEmpresa", label: "7" },
    ];

    return {
      FormTypes,
      buttonsTeam,
      buttonsEnterprise,
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
