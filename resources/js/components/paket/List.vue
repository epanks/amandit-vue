<template>
  <div>
    <div class="btn-wrapper">
      <router-link to="/paket/new" class="btn btn-primary btn-sm">New</router-link>
    </div>
    <table class="table">
      <thead>
        <th>No</th>
        <th>Nama Paket</th>
        <th>Pagu</th>
        <th>Modify</th>
      </thead>
      <tbody>
        <template v-if="!paket.lenght">
          <tr>
            <td colspan="4" class="text-center">Tidak Ada Paket</td>
          </tr>
        </template>
        <template v-else>
          <tr v-for="pkt in paket" :key="pkt.id">
            <td></td>
            <td>{{pkt.nmpaket}}</td>
            <td>{{pkt.pagurmp}}</td>
            <td>{{pkt.progres_fisik}}</td>
            <td>
              <router-link :to="'/paket/${pkt.id}'">View</router-link>
            </td>
          </tr>
        </template>
      </tbody>
    </table>
  </div>
</template>
<script>
export default {
  name: "list",
  mounted() {
    if (this.paket.length) {
      return;
    }
    this.$store.dispatch("getPaket");
  },
  computed: {
    paket() {
      return this.$store.getters.paket;
    }
  }
};
</script>