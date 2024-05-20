<template>
  <button
    class="btn btn-outline"
    data-testid="button"
    @click="returnStepMethod"
  >
    <img class="arrow-left" src="@/assets/return-arrow.svg" />
    Voltar
  </button>
</template>

<script>
export default {
  name: "ButtonReturnStep",
  methods: {
    returnStepMethod() {
      this.$emit("click");
    },
  },
};
</script>

<style scoped lang="scss">
.btn-outline {
  display: flex;
  border-color: #676879;
  align-items: center;
  justify-content: center;

  .arrow-left {
    fill: #676879;
    transform: rotate(180deg);
  }
}
</style>
