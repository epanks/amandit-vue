<template>
  <div class="pkt-new">
    <form @submit.prevent="add">
      <table class="table">
        <tr>
          <th>Name</th>
          <td>
            <input type="text" class="form-control" v-model="pkt.name" placeholder="Paket Name" />
          </td>
        </tr>
        <tr>
          <th>Pagu</th>
          <td>
            <input type="numeric" class="form-control" v-model="pkt.pagurmp" placeholder="Pagu" />
          </td>
        </tr>
        <tr>
          <th>Progres Fisik</th>
          <td>
            <input
              type="numeric"
              class="form-control"
              v-model="pkt.progres_fisik"
              placeholder="Progres Fisik"
            />
          </td>
        </tr>

        <tr>
          <td>
            <router-link to="/paket" class="btn">Cancel</router-link>
          </td>
          <td class="text-right">
            <input type="submit" value="Create" class="btn btn-primary" />
          </td>
        </tr>
      </table>
    </form>
    <div class="errors" v-if="errors">
      <ul>
        <li v-for="(fieldsError, fieldName) in errors" :key="fieldName">
          <strong>{{ fieldName }}</strong>
          {{ fieldsError.join('\n') }}
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
import validate from "validate.js";
export default {
  name: "new",
  data() {
    return {
      pkt: {
        nmpaket: "",
        pagurmp: "",
        progres_fisik: ""
      },
      errors: null
    };
  },
  computed: {
    currentUser() {
      return this.$store.getters.currentUser;
    }
  },
  methods: {
    add() {
      this.errors = null;
      const constraints = this.getConstraints();
      const errors = validate(this.$data.pkt, constraints);
      if (errors) {
        this.errors = errors;
        return;
      }
      axios.post("/api/paket/new", this.$data.pkt).then(response => {
        this.$router.push("/paket");
      });
    },
    getConstraints() {
      return {
        nmpaket: {
          presence: true,
          length: {
            minimum: 3,
            message: "Must be at least 3 characters long"
          }
        },
        pagurmp: {
          presence: true,
          numericality: true,
          length: {
            minimum: 1,
            message: "Must be at least 1 digits long"
          }
        },
        progres_fisik: {
          presence: true,
          numericality: true,
          length: {
            maximum: 3,
            message: "Must be at least 3 digits long"
          }
        },
        website: {
          presence: true,
          url: true
        }
      };
    }
  }
};
</script>

<style>
.errors {
  background: lightcoral;
  border-radius: 5px;
  padding: 21px 0 2px 0;
}
</style>