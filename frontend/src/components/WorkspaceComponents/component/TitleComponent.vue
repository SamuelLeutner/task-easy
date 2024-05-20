<template>
  <div>
    <input
      class="text-center"
      type="text"
      :id="task.id"
      v-model="taskCopy.task"
      @keydown.enter="updateTasks(task.id)"
    />
  </div>
</template>

<script>
import API from "@/services/HttpService";
export default {
  name: "TitleComponent",
  props: {
    task: Object,
  },
  data() {
    return {
      taskCopy: { ...this.task },
    };
  },
  methods: {
    async updateTasks(id) {
      const taskssUpdate = {
        task: this.taskCopy.task,
        resp: this.taskCopy.resp,
        date: this.taskCopy.date,
        status: this.taskCopy.status,
      };
      await API.updateTask(id, taskssUpdate);
      await API.getAllTask();
    },
  },
};
</script>

<style lang="scss" scoped>
input {
  border: none;
  font-size: 15px;
}
</style>
