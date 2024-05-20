<template>
  <div class="navbar bg-body-secondary d-flex justify-content-between">
    <section>
      <div class="icons d-flex w-100 gap-3 jutify-content-center">
        <h1>TaskYZY work management</h1>
        <button
          type="button"
          class="btn btn-primary"
          data-bs-toggle="modal"
          data-bs-target="#exampleModal"
        >
          Ver Planos
        </button>

        <!-- Modal -->
        <div
          class="buy modal fade"
          id="exampleModal"
          tabindex="-1"
          aria-labelledby="exampleModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                  Escolha o plano certo para sua equipe
                </h1>
                <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>
              <div class="d-flex gap-5 p-3">
                <div class="card border-danger mb-3" style="max-width: 18rem">
                  <div class="card-header">Básico</div>
                  <div class="card-body text-danger">
                    <div class="d-flex gap-2 py-2">
                      <h2 class="card-title">R$ 35</h2>
                      <p class="text-dark">Usuário/Mês</p>
                    </div>
                    <div class="border"></div>
                    <div class="card-text py-3">
                      <p>Visitantes ilimitados para modo visualização</p>
                      <p>Elementos ilimitados</p>
                      <p>Quadros ilimitados</p>
                      <p>Mais de 200 templates</p>
                      <p>Mais de 20 tipos de colunas</p>
                      <p>Aplicativos iOS e Android</p>
                      <p>Criar um painel com base em 1 quadro</p>
                    </div>
                  </div>
                </div>
                <div class="card border-warning mb-3" style="max-width: 18rem">
                  <div class="card-header">Padrão</div>
                  <div class="card-body">
                    <div class="d-flex gap-2 py-2">
                      <h2 class="card-title text-warning">R$ 45</h2>
                      <p>Usuário/Mês</p>
                    </div>
                    <div class="border"></div>
                    <div class="card-text text-warning py-3">
                      <p>Visualizações de cronograma e Gantt</p>
                      <p>Visualização do Calendário</p>
                      <p>Acesso para convidados</p>
                      <p>Automações (250 ações por mês)</p>
                      <p>Integrações (250 ações por mês)</p>
                      <p>Criar um painel que combine 5 quadros</p>
                    </div>
                  </div>
                </div>
                <div class="card border-success mb-3" style="max-width: 18rem">
                  <div class="card-header">Profissional</div>
                  <div class="card-body text-success">
                    <div class="d-flex gap-2 py-2">
                      <h2 class="card-title">R$ 75</h2>
                      <p class="text-dark">Usuário/Mês</p>
                    </div>
                    <div class="border"></div>
                    <div class="card-text py-3">
                      <p>Quadros privados</p>
                      <p>Visualização de gráficos</p>
                      <p>Controle de tempo</p>
                      <p>Coluna de fórmula</p>
                      <p>Automações (25.000 ações por mês))</p>
                      <p>Integrações (25.000 ações por mês)</p>
                      <p>Criar um painel que combine 10 quadros</p>
                    </div>
                  </div>
                </div>

                <div class="card border-primary mb-3" style="max-width: 18rem">
                  <div class="card-header">Corporativo</div>
                  <div class="card-body text-primary">
                    <h5 class="card-title">Para organizações comerciais</h5>
                    <p>
                      para potencializar o crescimento e escalar rapidamente.
                    </p>
                    <div class="card-text">
                      <p>Automações e integrações em escala empresarial</p>
                      <p>Permissões multinível</p>
                      <p>Segurança e governança de nível empresarial</p>
                      <p>Relatórios e dados analíticos avançados</p>
                      <p>Onboarding personalizado</p>
                      <p>Suporte premium</p>
                      <p>Criar um painel que combine 50 quadros</p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal-footer">
                <button
                  type="button"
                  class="btn btn-secondary"
                  data-bs-dismiss="modal"
                >
                  Close
                </button>
                <button type="button" class="btn btn-primary">Continuar</button>
              </div>
            </div>
          </div>
        </div>

        <p class="h6">
          Todas as nossas funcionalidades avançadas estão abertas para os
          próximos 10 dias
        </p>
      </div>
    </section>
    <section>
      <div
        class="menu d-flex gap-3 flex-row align-items-center justify-content-center"
      >
        <i class="bi bi-bell"></i>
        <i class="bi bi-inbox"></i>
        <i class="bi bi-person-plus"></i>
        <i class="bi bi-bag"></i>
        <span class="mx-1">|</span>
        <i class="bi bi-search"></i>
        <i class="bi bi-question-lg"></i>

        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#offcanvasNavbar"
          aria-controls="offcanvasNavbar"
          aria-label="Toggle navigation"
        >
          <img class="" src="@/assets/monday_logo_icon_resized.png" alt="" />
        </button>
        <div
          class="offcanvas offcanvas-end"
          tabindex="-1"
          id="offcanvasNavbar"
          aria-labelledby="offcanvasNavbarLabel"
        >
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">My App</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="offcanvas"
              aria-label="Close"
            ></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#"
                  >Meu Perfil</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Importar Dados</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Integrações</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Desenvolvedores</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Lixeira</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Arquivar</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Administração</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Equipes</a>
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  Alterar Tema
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Iluminado</a></li>
                  <li>
                    <a class="dropdown-item" href="#">Noturno</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">Escuro</a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Sair</a>
              </li>
            </ul>
            <form class="d-flex mt-3" role="search">
              <input
                class="form-control me-2"
                type="search"
                placeholder="Search"
                aria-label="Search"
              />
              <button class="btn btn-outline-success" type="submit">
                Search
              </button>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import { defineComponent } from "vue";
export default defineComponent({
  name: "NavBarTop",
});
</script>

<style scoped lang="scss">
.navbar {
  padding-left: 20px;
  padding-right: 20px;
  .btn {
    height: 30px;
    font-size: 12px;
  }
  .navbar-toggler {
    height: 25px;
  }
  .menu {
    height: 30px;
    img {
      height: 100%;
    }
  }
  .h6 {
    font-size: 12px;
  }
  .icons {
    align-items: baseline;
    height: 30px;
    img {
      height: 30px;
    }
    h1 {
      font-size: 16px;
    }
  }
  .buy {
    min-width: 500px;
  }
  p {
    font-size: 15px;
  }
  .card {
    width: 250px;
  }
}
</style>
