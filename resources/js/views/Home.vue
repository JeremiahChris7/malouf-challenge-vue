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
        <tr>
          <td class="cell-first">customer id</td>
          <td class="cell-second">customer name</td>
          <td>customer's number of orders</td>
          <td>
            <a class="btn btn-primary" href="customer_id" role="button">View</a>
          </td>
        </tr>
      </tbody>
    </table>
    <div class="d-flex justify-content-center">
      <!-- {!! $customers->links() !!} -->
    </div>
  </div>
</template>

<script>
  import axios from 'axios'

  export default {
    name: 'Home',
    data() {
        return {
            customers: null
        }
    },
    created() {
      axios
        .get(
          'http://malouf-vue.test/customers'
        )
        .then(response => {
          console.log('customers:', response.data)
        })
        .catch(error => {
          console.log(error)
        })
    }
  }

</script>

<style>

</style>
