<template>
  <div class="d-flex flex-row px-5 gap-4">
    <div class="">
      <button
        class="btn btn-light d-flex flex-row gap-1"
        type="button"
        data-bs-toggle="dropdown"
        aria-expanded="false"
      >
        <span class="d-flex flex-row justify-content-center"
          >Criar Tarefa
        </span>
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Menu item</a></li>
        <li><a class="dropdown-item" href="#">Menu item</a></li>
        <li><a class="dropdown-item" href="#">Menu item</a></li>
      </ul>
    </div>
    <div class="pesquisar">
      <input class="form-control" type="text" placeholder="Pesquisar" />
    </div>
    <div class="">
      <button
        class="btn btn-light d-flex flex-row gap-1"
        type="button"
        data-bs-toggle="dropdown"
        aria-expanded="false"
      >
        <i class="bi bi-person-circle"></i>
        <span class="d-flex flex-row justify-content-center">Pessoa </span>
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Menu item</a></li>
        <li><a class="dropdown-item" href="#">Menu item</a></li>
        <li><a class="dropdown-item" href="#">Menu item</a></li>
      </ul>
    </div>

    <div class="">
      <button
        class="btn btn-light d-flex flex-row gap-1"
        type="button"
        data-bs-toggle="dropdown"
        aria-expanded="false"
      >
        <i class="bi bi-funnel"></i>
        <span class="d-flex flex-row justify-content-center">Filtro </span>
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Menu item</a></li>
        <li><a class="dropdown-item" href="#">Menu item</a></li>
        <li><a class="dropdown-item" href="#">Menu item</a></li>
      </ul>
    </div>
    <div class="">
      <button
        class="btn btn-light d-flex flex-row gap-1"
        type="button"
        data-bs-toggle="dropdown"
        aria-expanded="false"
      >
        <i class="bi bi-arrow-down-up"></i>
        <span class="d-flex flex-row justify-content-center">Ordenar </span>
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Menu item</a></li>
        <li><a class="dropdown-item" href="#">Menu item</a></li>
        <li><a class="dropdown-item" href="#">Menu item</a></li>
      </ul>
    </div>
    <div class="">
      <button
        class="btn btn-light d-flex flex-row gap-1"
        type="button"
        data-bs-toggle="dropdown"
        aria-expanded="false"
      >
        <i class="bi bi-eye-slash"></i>
        <span class="d-flex flex-row justify-content-center">Ocultar </span>
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Menu item</a></li>
        <li><a class="dropdown-item" href="#">Menu item</a></li>
        <li><a class="dropdown-item" href="#">Menu item</a></li>
      </ul>
    </div>
    <div class="btn-group-dot">
      <button
        class="btn btn-light"
        type="button"
        data-bs-toggle="dropdown"
        aria-expanded="false"
      >
        <span class=""><i class="bi bi-three-dots"></i> </span>
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Menu item</a></li>
        <li><a class="dropdown-item" href="#">Menu item</a></li>
        <li><a class="dropdown-item" href="#">Menu item</a></li>
      </ul>
    </div>
  </div>
</template>

<script>
import { defineComponent } from "vue";
export default defineComponent({
  name: "NavBarDown",
});
</script>

<style scoped>
.btn-group {
  width: 100px;
}
span {
  font-size: 12px;
}
.input-group-text {
  width: 50px;
}
.pesquisar {
  width: 120px;
}
input {
  height: 34px;
  font-size: 15px;
}

.btn-group-dot {
  width: 25px;
}
span {
  margin-top: 2px;
}
i {
  height: 4px;
}
</style>
