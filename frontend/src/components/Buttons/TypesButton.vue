<template>
  <div class="radio-button-component">
    <label class="radio-button-label">
      <span class="input-container">
        <span class="input-radio-container">
          <input
            type="radio"
            class="input_radio"
            :name="nameInput"
            :value="text"
            @click="emitButtonActivated"
            :checked="isSelected"
          />
          <span
            data-testid="radio-button-control"
            class="control_input_radio"
          />
        </span>

        <span class="radio-button"></span>

        <span class="text-button"> {{ text }} </span>
      </span>
    </label>
  </div>
</template>

<script>
export default {
  name: "TypesButton",
  props: {
    text: String,
    nameInput: String,
    redirectRoute: String,
    isSelected: Boolean,
  },
  methods: {
    emitButtonActivated() {
      this.$emit("update:checked");
    },
  },
};
</script>

<style scoped lang="scss">
.radio-button-component {
  height: 40px;
  display: flex;
  line-height: 20px;
  user-select: none;
  align-items: center;
  margin-bottom: 8px;
  background-color: transparent;
  transition: border-color 0.3s;

  .radio-button-label {
    outline: none;
    color: #676879;

    cursor: pointer;
    font-size: 16px;
    font-weight: 300;
    background: #fff;

    .input-container {
      gap: 5px;
      display: flex;
      margin-left: 8px;
      margin-top: 16px;
      padding: 8px 16px;
      align-items: center;
      border-radius: 32px;
      justify-content: center;
      border: 1px solid #c3c6d4;

      .input-radio-container {
        display: flex;
        align-items: center;
        justify-content: center;

        .input_radio {
          opacity: 0;
          width: 0;
          height: 0;
          margin: 0;

          + .control_input_radio {
            width: 1em;
            height: 1em;
            border-radius: 50%;
            align-items: center;
            background-color: #fff;
            box-sizing: border-box;
            justify-content: center;
            animation-duration: 100ms;
            border: 0.1em solid #c3c6d4;
            animation-fill-mode: forwards;
            animation-name: radioCheckedAnimation;
            animation-timing-function: cubic-bezier(0, 0, 0.35, 1);
            transition: border-width 100ms cubic-bezier(0, 0, 0.35, 1);
          }

          &:checked + .control_input_radio {
            border: 0.3em solid #0073ea;
          }
        }
        cursor: pointer;
      }
    }

    .text-button {
      color: #676879;
      overflow: hidden;
      font-size: 14px;
      font-weight: 300;
      line-height: 20px;
      font-style: normal;
      white-space: nowrap;
      text-overflow: ellipsis;
      font-family: "Figtree", sans-serif;
    }
  }
}

@keyframes radioCheckedAnimation {
  0% {
    height: 1em;
    width: 1em;
  }

  50% {
    height: 0.8em;
    width: 0.8em;
  }

  100% {
    height: 1em;
    width: 1em;
  }
}
</style>
