<template>
<div class="center-space">
  <slot></slot>

</div>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>    
div{
    margin-top: 1rem ;
    margin-bottom: 1rem;

}
.card-container{
    border-radius: 5px;
    width: 45%;
    margin: 0 auto;
    & > *{
        margin: 0 auto;
        font-size: 1rem;
        margin-top: 10px;
    }
    img{
        text-align: center;
        width: 100%;
        height: 6rem;
    }
    a:hover{
        color: white;
    }
    
}

</style>