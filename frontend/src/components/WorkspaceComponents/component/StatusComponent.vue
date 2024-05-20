<template>
  <select
    class="form-select form-select-sm"
    aria-label="Small select example"
    v-model="selectStatus.status"
    @change="updateStatus(selectStatus.id)"
  >
    <option class="text-center" value="Não Iniciado">Não Iniciado</option>
    <option class="text-center" value="Em Progresso">Em Progresso</option>
    <option class="text-center" value="Parado">Parado</option>
    <option class="text-center" value="Finalizado">Finalizado</option>
  </select>
</template>

<script>
import API from "@/services/HttpService";
export default {
  name: "StatusComponent",
  props: {
    status: Object,
  },
  data() {
    return { selectStatus: { ...this.status } };
  },
  methods: {
    async updateStatus(id) {
      const status = {
        task: this.selectStatus.task,
        res: this.selectStatus.res,
        date: this.selectStatus.date,
        status: this.selectStatus.status,
      };
      await API.updateTask(id, status);
      await API.getAllTask();
    },
  },
};
</script>

<style lang="scss" scoped></style>
