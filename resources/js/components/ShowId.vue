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
        height: 18rem;
        // object-fit: cover;
        background-size: cover;
    }
    a:hover{
        color: white;
    }
    
}
.banner-container{
    position: fixed;
    top: 0;
    left: 0;
    z-index: 100;
    height: 100vh;
    width: 100vw;
    background-color: rgba(0, 0, 0, 0.733);
    margin-top: 0px;

    .banner{
        background-color: white;
        border: 5px solid red;
        border-radius: 20px;
        position: absolute;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 30px;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
    }
}

</style>