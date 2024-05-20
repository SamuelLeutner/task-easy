<template>
  <div>
    <input
      class="text-center"
      type="text"
      v-model="taskCopy.resp"
      @keydown.enter="createResposavel(task.id)"
    />
  </div>
</template>
<script>
import API from "@/services/HttpService";
export default {
  name: "RespComponent",
  props: {
    task: Object,
  },
  data() {
    return {
      taskCopy: { ...this.task },
    };
  },
  methods: {
    async createResposavel(id) {
      const createResp = {
        task: this.taskCopy.task,
        resp: this.taskCopy.resp,
        date: this.taskCopy.date,
        status: this.taskCopy.status,
      };
      await API.updateTask(id, createResp);
      await API.getAllTask();
    },
  },
};
</script>

<style scoped>
input {
  width: 150px;
  border: none;
  font-size: 15px;
}
</style>
