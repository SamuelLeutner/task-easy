<template>
  <div class="align-form">
    <label class="title-input">{{ label }}</label>
    <input
      class="signup-input"
      :placeholder="placeholder"
      :autocomplete="autocomplete"
      :type="type"
      :id="inputId"
      aria-label="Insira seu valor"
      :class="{ error: fieldError !== '' }"
      aria-invalid="false"
      v-model="formData.fieldValue"
      @input="validateField"
      @blur="handleBlur"
    />
    <div class="error-message" :id="errorId">{{ fieldError }}</div>
  </div>
</template>

<script>
import { ref, watch } from "vue";

export default {
  name: "InputFormField",
  emits: ["update:modelValue", "field-validated"],

  props: {
    modelValue: String,
    placeholder: String,
    autocomplete: String,
    errorMessage: String,
    type: String,
    inputId: String,
    errorId: String,
    label: String,
  },
  setup(props, context) {
    const formData = ref({
      fieldValue: props.modelValue,
    });
    const fieldError = ref("");

    const validateField = () => {
      const fieldValue = formData.value.fieldValue;

      if (!fieldValue) {
        fieldError.value = "Este campo é obrigatório.";
      } else {
        context.emit("field-validated", fieldValue);
        fieldError.value = "";
      }

      context.emit("update:modelValue", fieldValue);
    };

    const handleBlur = () => {
      validateField();
    };

    watch(
      () => props.modelValue,
      () => {
        validateField();
      }
    );

    return {
      formData,
      fieldError,
      validateField,
      handleBlur,
    };
  },
};
</script>

<style scoped lang="scss">
.align-form {
  width: 75%;
  margin-bottom: 0;
  min-width: 400px;
  min-height: 104px;

  .title-input {
    display: flex;
    font-size: 14px;
    font-weight: 400;
    line-height: 20px;
    padding-bottom: 4px;
    align-items: center;
    font-family: "Figtree", sans-serif;
  }

  .signup-input {
    outline: 0;
    width: 100%;
    height: 48px;
    color: #323338;
    overflow: hidden;
    border: 1px solid #e6e9ef;
    padding: 8px 16px;
    border-radius: 4px;
    white-space: nowrap;
    text-overflow: ellipsis;
    background-color: transparent;
    font-family: "Figtree", sans-serif;
    transition: border-color 100ms ease-in;

    &:active,
    &:focus,
    &:valid {
      border: 1px solid #dcdfec;
    }
  }

  .error {
    border: 1px solid #d83a52;
  }

  .error-message {
    width: 100%;
    color: #d83a52;
    display: flex;
    font-size: 14px;
    overflow: hidden;
    line-height: 20px;
    align-items: start;
    padding-bottom: 5px;
    white-space: nowrap;
    text-overflow: ellipsis;
  }
}
</style>
