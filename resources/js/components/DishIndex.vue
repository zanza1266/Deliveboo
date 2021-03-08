<template>
<div>
  <slot></slot>
  </div>
</template>

<script>
export default {
    name:'dish-index'
}
</script>

<style lang="scss" scoped>
h1{
    color:black;
}
a:not(.card-body a){
    font-size: 1.2rem;
    width: 150px;
    padding: 10px 15px;
    background-color:#00CCBC ;
    border-radius: 10px;
    color: white;
    border: 1px solid #00CCBC;
}
a:hover:not(.card-body a){
    background-color:#00a597 ;
    transition: 0.4s;
    text-decoration: none;
}
.card-body a{
    color:black;
    text-transform: capitalize;
    font-weight: bold;
    font-size:1.2rem;
}
.card-body a:hover{
    text-decoration:none;
}
.card{
    width:300px;
}
</style>