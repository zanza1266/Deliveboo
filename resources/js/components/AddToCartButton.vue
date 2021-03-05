<template>
<div>
    <button></button>
</div>
  
</template>

<script>
export default {
    props: {
        TmpDish: String 
    },
    data: function() {
        return {

            cart: [],

        }
    }

}
</script>

<style lang="scss">
button{
    padding: 15px;
    border: 3px solid #00ccbc;
    border-radius: 10px;
    background-color: #fff;
    transition:0.4s;

        a{
            color: #00ccbc;
        }
}
button:hover{
    border:3px solid #fff;
    background-color: #00ccbc;
    a{
        color: #fff;
        text-decoration:none;
    }
}
</style>