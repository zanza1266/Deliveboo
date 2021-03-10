<template>
<div>
    <div v-for="(orders,index) in order" :key="index">
         <button type="button" name="button" >{{order}}</button>
  </div></div>
</template>

<script>
export default {
 props: {
        orders_json: String 
    },
    mounted() {

        this.orders = JSON.parse(this.orders_json);
        console.log(this.orders);
    },
    data: function() {
        return {

            orders: null,
            order: []

        }
    },
}
</script>

<style>

</style>