<template>
  <nav class="d-flex flex-row align-items-center justify-content-around">
    <div class="d-flex flex-row p-3 align-items-start gap-2">
      <span class="fs-4">Plano de Desenvolvimento</span>
      <button class="btn btn-light">
        <i class="bi bi-chevron-compact-down"></i>
      </button>
    </div>
    <div class="altura d-flex flex-row align-items-center gap-2">
      <button class="integrar btn btn-light d-flex align-items-center gap-2">
        <i class="icon-1 bi bi-plug"></i>
        <span class="inte">integrar</span>
        <img
          src="https://cdn.monday.com/images/automations/slack-icon3.png"
          alt=""
        />
        <img
          src="https://cdn.monday.com/images/automations/ms-teams-icon.png"
          alt=""
        />
        <img
          src="https://cdn.monday.com/images/automations/jira-icon2.png"
          alt=""
        />
      </button>
      <button class="auto btn btn-light">
        <i class="bi bi-cpu"></i>
        <span class="inte">Automatizar</span>
      </button>
      <div class="atividade p-3">
        <button class="auto btn btn-primary">A</button>
      </div>
      <div class="atividade">
        <button class="auto btn btn-light">
          <span class="inte">Convidar / 1</span>
        </button>
      </div>
      <div class="atividade p-3">
        <button class="auto btn btn-light">
          <i class="bi bi-three-dots"></i>
        </button>
      </div>
    </div>
  </nav>
</template>

<script>
import { defineComponent } from "vue";
export default defineComponent({
  name: "WorkspaceCentral",
});
</script>

<style scoped>
img {
  max-height: 15px;
}
.inte {
  font-size: 12px;
}

.altura {
  height: 2.5rem;
}
</style>
