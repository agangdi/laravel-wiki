<template>
  <v-dialog v-model="d4">
    <v-btn primary dark slot="activator">Open Dialog</v-btn>
    <v-card>
      <v-card-row>
        <v-card-title>User Profile</v-card-title>
      </v-card-row>
      <v-card-row>
        <v-card-text>
          <v-container fluid>
            <v-text-field label="Email" required />
            <v-text-field label="Password" type="password" required />
            <v-text-field label="Legal first name" required />
            <v-text-field label="Legal middle name" hint="example of helper text only on focus" />
            <v-text-field label="Legal last name" hint="example of persistent helper text"
              persistent-hint
              required />
            <small>*indicates required field</small>
          </v-container>
        </v-card-text>
      </v-card-row>
      <v-card-row actions>
        <v-btn class="blue--text darken-1" flat @click.native="d4 = false">Close</v-btn>
        <v-btn class="blue--text darken-1" flat @click.native="d4 = false">Save</v-btn>
      </v-card-row>
    </v-card>
  </v-dialog>
</template>


<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
