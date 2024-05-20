<template>
  <div class="input-group">
    <input
      class="form-control"
      placeholder="nome@empresa.com.br"
      autocomplete="email"
      type="email"
      id="email-input"
      aria-label="Insira seu e-mail profissional"
      :class="{ error: emailError !== '' }"
      aria-invalid="false"
      v-model="formData.email"
      @input="updateEmail"
      v-bind="$attrs"
      @blur="validateEmail"
    />
  </div>
  <div class="error-message" id="email-error">{{ emailError }}</div>
</template>

<script>
import { ref } from "vue";

export default {
  name: "InputEmail",
  emits: ["update:modelValue", "email-validated"],

  props: {
    modelValue: String,
  },

  setup(props, context) {
    const formData = ref({
      email: props.modelValue,
    });

    const emailError = ref("");

    const updateEmail = () => {
      context.emit("update:modelValue", formData.value.email);
    };

    const validateEmail = () => {
      const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

      if (!emailRegex.test(formData.value.email)) {
        emailError.value = "Insira um endereço de e-mail válido";
      } else {
        emailError.value = "";
        context.emit("email-validated", formData.value.email);
      }
    };

    return {
      formData,
      emailError,
      updateEmail,
      validateEmail,
    };
  },
};
</script>

<style scoped lang="scss">
.form-control {
  height: 48px;
  width: 100%;
  line-height: 20px;
  border: 1px solid #c3c6d4;
  background-color: transparent;
  transition: border-color 0.3s;

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
  display: flex;
  align-items: start;
  color: #d83a52;
  font-size: 14px;
  line-height: 20px;
}
</style>
