<template>
  <button
    type="submit"
    class="btn btn-primary cadastrar-user"
    data-testid="button"
    :disabled="!isValid"
  >
    Continuar
    <img src="@/assets/arrow.svg" />
  </button>
</template>

<script>
export default {
  props: {
    isValid: {
      type: Boolean,
    },
    redirectRoute: {
      type: String,
    },
  },
};
</script>

<style scoped lang="scss">
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
}
</style>
