<template>
  <tr>
    <td class="cell-first">{{ customer.id }}</td>
    <td class="cell-second">{{ customer.name }}</td>
    <td>{{ customer.numOrders }}</td>
    <td>
      <a class="btn btn-primary" href="customer_id" role="button">View</a>
    </td>
  </tr>
</template>

<script>
export default {
    name: 'CustomerRow',
    props: {
        customer: Object
    }
}
</script>

<style>

</style>
