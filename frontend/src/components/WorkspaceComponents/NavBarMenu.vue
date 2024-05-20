<template>
  <div>
    <section class="mt-3">
      <div class="car-one d-flex flex-column p-2 gap-1">
        <button
          class="btn-group plano border border-0 btn btn-light align-items-center d-flex gap-2"
        >
          <i class="bi bi-house"></i>
          <span>Página Inicial</span>
        </button>
        <button
          class="plano border border-0 btn btn-light d-flex align-items-center gap-2"
        >
          <i class="bi bi-calendar2-week"></i>
          <span>Meu Trabalho</span>
        </button>
        <span class="line"></span>
      </div>

      <div class="works d-flex flex-column">
        <div class="btn-group p-2 gap-2">
          <button
            type="button"
            class="btn btn-light dropdown-toggle dropdown-toggle-split"
            data-bs-toggle="dropdown"
            aria-expanded="false"
          >
            <i class="bi bi-house"></i> Área de trabalho
          </button>
          <ul class="dropdown-menu">
            <li>
              <a class="dropdown-item" href="#"
                ><input
                  class="form-control"
                  type="text"
                  name=""
                  id=""
                  placeholder="Procurar uma área de trabalho"
              /></a>
            </li>
            <li>
              <a class="dropdown-item" href="#"
                ><i class="bi bi-star-fill"></i> Favoritos</a
              >
            </li>
            <li>
              <a class="dropdown-item" href="#"
                ><button type="button" class="btn btn-light">
                  Área de trabalho
                </button></a
              >
            </li>
            <li><hr class="dropdown-divider" /></li>
            <li><a class="dropdown-item" href="#">Separated link</a></li>
          </ul>
          <div class="btn-group">
            <button
              type="button"
              class="menu btn btn-light dropdown-toggle dropdown-toggle-split"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            ></button>
            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-item" href="#"
                  >Panorama do work management</a
                >
              </li>
              <li><hr class="dropdown-divider" /></li>
              <li><a class="dropdown-item" href="#"></a></li>
              <li>
                <a class="dropdown-item" href="#">Renomear Área de trabalho</a>
              </li>
              <li><a class="dropdown-item" href="#">Alterar Icone</a></li>
              <li>
                <a class="dropdown-item" href="#">Gerenciar Área de trabalho</a>
              </li>
              <li><hr class="dropdown-divider" /></li>
              <li><a class="dropdown-item" href="#"></a></li>
              <li>
                <a class="dropdown-item" href="#"
                  >Adicionar Nova Área de trabalho</a
                >
              </li>
              <li>
                <a class="dropdown-item" href="#"
                  >Explorar Todas as Áreas de trabalho</a
                >
              </li>
              <li><hr class="dropdown-divider" /></li>
              <li><a class="dropdown-item" href="#"></a></li>
              <li>
                <a class="dropdown-item" href="#">Visualizar Todas as Pastas</a>
              </li>
              <li><hr class="dropdown-divider" /></li>
              <li><a class="dropdown-item" href="#"></a></li>
              <li>
                <a class="dropdown-item" href="#">Visualizar Lixeira</a>
              </li>
            </ul>
          </div>
        </div>

        <div class="pesquisa d-flex w-100 p-2 gap-2">
          <input class="form-control" type="text" placeholder="Pesquisar" />
          <div class="btn-group">
            <button
              type="button"
              class="menu btn btn-light dropdown-toggle dropdown-toggle-split"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            ></button>
            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-item" href="#">Quadro Novo</a>
              </li>
              <li><hr class="dropdown-divider" /></li>
              <li><a class="dropdown-item" href="#"></a></li>
              <li>
                <a class="dropdown-item" href="#">Criar Doc</a>
              </li>
              <li><a class="dropdown-item" href="#">Novo Painel</a></li>
              <li>
                <a class="dropdown-item" href="#"
                  >Escolher a Partir de Templates</a
                >
              </li>
              <li><hr class="dropdown-divider" /></li>
              <li><a class="dropdown-item" href="#"></a></li>
              <li>
                <a class="dropdown-item" href="#">Importar Dados</a>
              </li>
              <li>
                <a class="dropdown-item" href="#">Apps</a>
              </li>
              <li><hr class="dropdown-divider" /></li>
              <li><a class="dropdown-item" href="#"></a></li>
              <li>
                <a class="dropdown-item" href="#">Criar Formulários</a>
              </li>
              <li><hr class="dropdown-divider" /></li>
              <li><a class="dropdown-item" href="#"></a></li>
              <li>
                <a class="dropdown-item" href="#">Nova Pasta</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="d-flex justify-content-center py-2">
          <button class="plano border border-0 btn btn-info">
            <i class="bi bi-layout-sidebar"></i>
            plano de desenvolvimento
          </button>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import { defineComponent } from "vue";
export default defineComponent({
  name: "NavBarMenu",
});
</script>

<style scoped lang="scss">
navbar {
  width: 250px;
}

.car-one {
  span {
    font-size: 12px;
  }
  button {
    height: 40px;
  }
  .line {
    border: 1px solid #c4c4c494;
  }
}
.pesquisa {
  input {
    width: 100%;
  }
}
.card-header {
  font-size: 12px;
}
.works {
  a {
    font-size: 12px;
  }
  .pbtn {
    width: 200px;
  }
  button {
    font-size: 12px;
  }
  input {
    font-size: 12px;
  }
  .plano {
    font-size: 13px;
    width: 230px;
  }
}
</style>
