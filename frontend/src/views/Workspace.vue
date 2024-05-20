<template>
  <main>
    <section class="navbarside">
      <NavBarSide />
    </section>

    <section class="nav">
      <NavBarMenu />
    </section>
    <section class="card body">
      <WorkspaceCentral />
      <NavBarCentralDown />
      <NavBarDown />
      <WorkspaceTable />
    </section>
    <section class="body"></section>
  </main>
</template>

<script>
import NavBarSide from "@/components/WorkspaceComponents/NavBarSide.vue";
import NavBarMenu from "@/components/WorkspaceComponents/NavBarMenu.vue";
import WorkspaceCentral from "@/components/WorkspaceComponents/WorkspaceCentral.vue";
import NavBarCentralDown from "@/components/WorkspaceComponents/NavBarCentralDown.vue";
import NavBarDown from "@/components/WorkspaceComponents/NavBarDown.vue";
import WorkspaceTable from "@/components/WorkspaceComponents/WorkspaceTable.vue";
export default {
  name: "WorkspaceView",
  components: {
    NavBarSide,
    NavBarMenu,
    WorkspaceCentral,
    NavBarCentralDown,
    NavBarDown,
    WorkspaceTable,
  },
};
</script>

<style scoped lang="scss">
main {
  width: 100%;
  background-color: #c4c4c494;
  display: grid;
  grid-template-areas:
    "h h h"
    "n b b";

  .navbarside {
    grid-area: h;
    gap: 20px 0;
  }
  .nav {
    grid-area: n;
    width: 250px;
    height: 93vh;
    background-color: #fff;
    border-top-right-radius: 0.5rem;
  }
  .body {
    grid-area: b;
  }
}
</style>
