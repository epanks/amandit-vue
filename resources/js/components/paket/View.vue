<template>
  <div class="pkt-view" v-if="pkt">
    <div class="user-img">
      <img src="https://www.scottsdaleazestateplanning.com/wp-content/uploads/2018/01/user.png" alt />
    </div>
    <div class="user-info">
      <table class="table">
        <tr>
          <th>ID</th>
          <td>{{ pkt.id }}</td>
        </tr>
        <tr>
          <th>Name</th>
          <td>{{ pkt.name }}</td>
        </tr>
        <tr>
          <th>Email</th>
          <td>{{ pkt.email }}</td>
        </tr>
        <tr>
          <th>Phone</th>
          <td>{{ pkt.phone }}</td>
        </tr>
        <tr>
          <th>Website</th>
          <td>{{ pkt.website }}</td>
        </tr>
      </table>
      <router-link to="/paket">Back to all paket</router-link>
    </div>
  </div>
</template>

<script>
export default {
  name: "view",
  created() {
    if (this.paket.length) {
      this.pkt = this.paket.find(pkt => pkt.id == this.$route.params.id);
    } else {
      axios.get(`/api/paket/${this.$route.params.id}`).then(response => {
        this.pkt = response.data.pkt;
      });
    }
  },
  data() {
    return {
      pkt: null
    };
  },
  computed: {
    currentUser() {
      return this.$store.getters.currentUser;
    },
    paket() {
      return this.$store.getters.paket;
    }
  }
};
</script>

<style scoped>
.pkt-view {
  display: flex;
  align-items: center;
}
.user-img {
  flex: 1;
}
.user-img img {
  max-width: 160px;
}
.user-info {
  flex: 3;
  overflow-x: scroll;
}
</style>