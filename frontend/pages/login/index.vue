<template>
  <v-row>
    <v-col>
      <v-text-field v-model="email" label="email"></v-text-field>
      <v-text-field v-model="password" label="password"></v-text-field>
      <v-btn color="blue" outlined @click="login">ログイン</v-btn>
    </v-col>
  </v-row>
</template>

<script>
export default {
  name: "index.vue",
  data() {
    return {
      email: "",
      password: "",
    }
  },
  methods: {
    login() {
      console.log("pushed");
      this.$axios
        .$post("/api/login", {
          email: this.email,
          password: this.password,
        })
        .then((response) => {
          console.log(response)
        })
    }
  }

}
</script>

<style scoped>

</style>
