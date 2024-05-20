<template>
  <div class="dynamic-button-list">
    <h2 class="title">{{ title }}</h2>
    <h5 class="subTitle">{{ subTitle }}</h5>
    <div class="button-container">
      <TypesButton
        v-for="(button, index) in buttons"
        :key="index"
        :text="button.text"
        :nameInput="name"
        :checked="modelValue === button.text"
        @update:checked="updateSelected(button.text)"
        :name="name"
      />
    </div>
  </div>
</template>

<script>
import TypesButton from "@/components/Buttons/TypesButton.vue";

export default {
  name: "DynamicButtonComponent",
  props: {
    title: String,
    subTitle: String,
    buttons: Array,
    modelValue: String,
    name: String,
  },
  components: {
    TypesButton,
  },
  setup(props, { emit }) {
    const updateSelected = (event) => {
      emit("updateSelected", event);
    };

    return {
      updateSelected,
    };
  },
};
</script>

<style scoped lang="scss">
.dynamic-button-list {
  margin-top: 24px;

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

  .subTitle {
    margin: 0;
    padding: 0;
    color: #323338;
    font-size: 16px;
    text-align: left;
    font-weight: 400;
    max-width: 600px;
    overflow: hidden;
    line-height: 22px;
    margin-bottom: 16px;
    white-space: nowrap;
    letter-spacing: -1px;
    text-overflow: ellipsis;
    font-family: "Figtree", sans-serif;
  }

  .button-container {
    gap: 8px;
    display: flex;
    flex-wrap: wrap;
    align-items: start;
    flex-direction: row;
  }
}
</style>
