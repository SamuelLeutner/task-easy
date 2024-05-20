<template>
  <div style="height: 100%">
    <component :is="currentForm" @changeForm="changeForm" />
  </div>
</template>

<script>
import FirstForm from "@/components/ViewFormTypes/Views/FirstForm.vue";
import SecondForm from "@/components/ViewFormTypes/Views/SecondForm.vue";
import ThirdForm from "@/components/ViewFormTypes/Views/ThirdForm.vue";
import FourthForm from "@/components/ViewFormTypes/Views/FourthForm.vue";
import FifthForm from "@/components/ViewFormTypes/Views/FifthForm.vue";

export const FormTypes = {
  FIRST_FORM: "FirstForm",
  SECOND_FORM: "SecondForm",
  THIRD_FORM: "ThirdForm",
  FOURTH_FORM: "FourthForm",
  FIFTH_FORM: "FifthForm",
};

export default {
  components: {
    FirstForm,
    SecondForm,
    ThirdForm,
    FourthForm,
    FifthForm,
  },
  data() {
    return {
      currentForm: FormTypes.FIRST_FORM,
    };
  },
  computed: {
    showPreviousButton() {
      return this.currentForm !== FormTypes.FIRST_FORM;
    },
    showNextButton() {
      return this.currentForm !== FormTypes.SECOND_FORM;
    },
  },
  methods: {
    changeForm(formType) {
      this.currentForm = formType;
    },
  },
};
</script>
