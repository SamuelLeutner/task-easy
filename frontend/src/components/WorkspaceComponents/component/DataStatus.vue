<template>
  <div>
    <input
      class="text-center"
      type="date"
      v-model="selectedDate.date"
      @input="handleDateChange"
      @change="updateData(selectedDate.id)"
    />
  </div>
</template>

<script>
import moment from "moment";
import API from "@/services/HttpService";

export default {
  name: "DatePicker",
  props: {
    data: Object,
  },
  data() {
    return {
      selectedDate: { ...this.data },
    };
  },
  computed: {
    formattedDate() {
      if (!this.selectedDate.data) return "";
      return moment(this.selectedDate.data).format("DD/MM/YYYY");
    },
  },
  methods: {
    handleDateChange() {
      const formattedDate = moment(this.selectedDate.data).format("DD/MM/YYYY");
      console.log("Data formatada:", formattedDate);
    },

    async updateData(id) {
      const datas = {
        task: this.selectedDate.task,
        resp: this.selectedDate.resp,
        date: this.selectedDate.date,
        status: this.selectedDate.status,
      };
      await API.updateTask(id, datas);
      await API.getAllTask();
    },
  },
};
</script>

<style scoped>
input {
  border: none;
  font-size: 15px;
}
</style>
