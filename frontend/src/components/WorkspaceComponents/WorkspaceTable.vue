<template>
  <div class="px-5 py-3 justify-content-center">
    <div>
      <i class="bi bi-chevron-compact-down"></i>
      <span>esta semana</span>
    </div>
    <div>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th class="text-center" scope="col">
              <input type="checkbox" name="" id="" />
            </th>
            <th class="text-center" scope="col" colspan="2">Tarefas</th>
            <th class="text-center" scope="col">Responsável</th>
            <th class="text-center" scope="col">Data</th>
            <th class="text-center" scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(tasks, i) in postgres" :key="i">
            <th class="check text-center" scope="row">
              <input
                type="checkbox"
                name=""
                id=""
                @change="deleteTask(tasks.id)"
              />
            </th>
            <td class="text">
              <title-component :task="tasks" />
            </td>
            <td class="message text-center"><i class="bi bi-chat-text"></i></td>
            <td class="resp">
              <RespComponent :task="tasks" />
            </td>
            <td class="data">
              <DataStatus :data="tasks" />
            </td>
            <td class="status">
              <StatusComponent :status="tasks" />
            </td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <td class="text-center">
              <input type="checkbox" />
            </td>
            <td colspan="5">
              <input
                class="rounded border-light"
                v-model="tarefa"
                @keydown.enter="createTasks"
                type="text"
                id=""
                placeholder=" + Adicionar tarefa"
              />
            </td>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</template>

<script>
import json from "../../../db.json";
import StatusComponent from "./component/StatusComponent.vue";
import DataStatus from "./component/DataStatus.vue";
import TitleComponent from "./component/TitleComponent.vue";
import RespComponent from "./component/RespComponent.vue";
import API from "@/services/HttpService";

export default {
  components: { StatusComponent, DataStatus, TitleComponent, RespComponent },
  name: "WorkspaceTable",
  data() {
    return {
      banco: json.workspace,
      tarefa: "",
      title: "",
      status: "1",
      postgres: [],
    };
  },
  watch: {
    postgres: "createdTask",
  },
  methods: {
    async createTasks() {
      const createTaskss = {
        task: this.tarefa,
        resp: "",
        date: "",
        status: "Não Iniciado",
      };
      const res = await API.createTask(createTaskss);
      this.postgres.push(res);
    },
    async updateTask(id) {
      const createTaskss = {
        task: this.tarefa,
        resp: "",
        date: "",
        status: "",
      };
      const res = await API.createTask(id, createTaskss);
      this.postgres.push(res);
    },
    async deleteTask(id) {
      await API.deleteTask(id);
      this.postgres = await API.getAllTask();
    },
  },
  async created() {
    this.postgres = await API.getAllTask();
  },
};
</script>

<style scoped lang="scss">
table {
  max-width: 900px;
}
.btn {
  font-size: 12px;
}
input {
  height: 30px;
  font-size: 12px;
}
.message {
  width: 60px;
}
.resp {
  width: 40px;
}
.data {
  width: 40px;
}
.status {
  width: 250px;
  input {
    border-radius: 10px solid #000;
  }
}
.check {
  width: 60px;
}
.form-select {
  border: none;
}
.user {
  width: 160px;
}
</style>
