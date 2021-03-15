<template>
<div>
  <slot></slot>

</div>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>
h1{
    font-size: 2rem;
    color: #3f3d56;
    font-weight: bold;
}
svg{
    transition: all 2s;
}
svg:hover{
    -webkit-box-shadow: 14px 9px 5px 0px rgba(63,61,86,1);
    -moz-box-shadow: 14px 9px 5px 0px rgba(63,61,86,1);
    box-shadow: 14px 9px 5px 0px rgba(63,61,86,1);
    transition: all 2s;
}
button{
    background-color: #00ccbc;
    border: 1px solid #00ccbc;
    color: white;
    &:hover{
        background-color: white;
        color: #00ccbc;
    }
}
.card{
    margin: 7rem 0;
}
@media screen and (max-width:768px) {
   svg{
       width:80%;
       height:70%;
   } 
}
</style>