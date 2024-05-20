<template>
  <div style="height: 100%">
    <FormComponent :currentForm="currentForm" @changeForm="changeForm" />
  </div>
</template>

<script>
import FormComponent from "@/components/ViewFormTypes/Views/FormComponent.vue";

export default {
  components: {
    FormComponent,
  },
  data() {
    return {
      currentForm: "FirstForm",
    };
  },
  methods: {
    changeForm(newForm) {
      this.currentForm = newForm;
    },
  },
};
</script>
