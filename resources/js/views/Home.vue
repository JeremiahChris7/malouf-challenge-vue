<template>
  <div class="container mt-5 customers-container">
    <h1>Customers</h1>
    <table class="table table-bordered">
      <thead>
        <tr class="table-primary">
          <th scope="col">Customer Number</th>
          <th scope="col">Name</th>
          <th scope="col">Number of orders</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <CustomerRow v-for="customer in customers" :key="customer.id" :customer="customer" />
      </tbody>
    </table>
    <div class="d-flex justify-content-center">
      <!-- {!! $customers->links() !!} -->
    </div>
  </div>
</template>

<script>
  import StoreService from '../services/StoreService.js'
  import CustomerRow from '../components/CustomerRow.vue'

  export default {
    name: 'Home',
    components: {
        CustomerRow
    },
    data() {
      return {
        customers: null
      }
    },
    created() {
      StoreService.getCustomers()
        .then(response => {
          this.customers = response.data
        })
        .catch(error => {
          console.log(error)
        })
    }
  }

</script>

<style>

</style>
