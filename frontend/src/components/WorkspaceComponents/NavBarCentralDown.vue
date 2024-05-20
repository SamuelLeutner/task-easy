<template>
  <div class="d-flex flex-row py-1 px-5">
    <div class="btn-group dropend">
      <button
        type="button"
        class="work btn btn-light"
        data-bs-toggle="dropdown"
        aria-expanded="false"
      >
        <span> <i class="bi bi-house-door"></i> Padrão</span>
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Menu item</a></li>
        <li><a class="dropdown-item" href="#">Menu item</a></li>
        <li><a class="dropdown-item" href="#">Menu item</a></li>
      </ul>
    </div>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="#">Menu item</a></li>
      <li><a class="dropdown-item" href="#">Menu item</a></li>
      <li><a class="dropdown-item" href="#">Menu item</a></li>
    </ul>
    <span></span>
    <div class="btn-group">
      <button
        type="button"
        class="button-plus btn btn-primary"
        data-bs-toggle="dropdown"
        aria-expanded="false"
      >
        <span>+</span>
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Table</a></li>
        <li><a class="dropdown-item" href="#">Gantt</a></li>
        <li><a class="dropdown-item" href="#">Gráfico</a></li>
        <li><a class="dropdown-item" href="#">Calendário</a></li>
        <li><a class="dropdown-item" href="#">Kanban</a></li>
        <li><a class="dropdown-item" href="#">Galeria de Arquivos</a></li>
        <li><a class="dropdown-item" href="#">Formulário</a></li>
        <li><a class="dropdown-item" href="#">Visualização em Branco</a></li>
        <li><hr class="dropdown-divider" /></li>
        <li><a class="dropdown-item" href="#"></a></li>
        <li><a class="dropdown-item" href="#">App</a></li>
        <li><hr class="dropdown-divider" /></li>
        <li><a class="dropdown-item" href="#"></a></li>
        <li><a class="dropdown-item" href="#">Mais Visualizações</a></li>
      </ul>
    </div>
  </div>
  <div class="linha">
    <div class="h4 border-bottom border-secundary"></div>
  </div>
  <div class="menu-down"></div>

  <div></div>
</template>

<script>
import { defineComponent } from "vue";
export default defineComponent({
  name: "NavBarCentralDown",
});
</script>

<style scoped>
.work {
  width: 100px;
  font-size: 12px;
  border-radius: 5px;
}
.button-plus {
  font-size: 12px;
  border-radius: 2px;
  margin-left: 2px;
}
.dropdown-item {
  font-size: 12px;
}
</style>
