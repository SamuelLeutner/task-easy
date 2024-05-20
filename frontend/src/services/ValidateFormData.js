export const ValidateFormData = (formData) => {
  const errors = {};

  if (!formData) {
    errors.nameError = "Nome é obrigatório.";
    errors.passwordError = "Senha é obrigatória.";
    errors.accountNameError = "Nome da conta é obrigatório.";
    return errors;
  }

  if (!formData) {
    console.error("formData is undefined");
    return errors;
  }

  if (!formData.name) {
    errors.nameError = "Este campo é obrigatório.";
  } else if (!formData.password || formData.password.length < 8) {
    errors.passwordError = "A senha deve conter pelo menos 8 caracteres.";
  } else if (!formData.accountName) {
    errors.accountNameError = "Este campo é obrigatório.";
  }

  return errors;
};
