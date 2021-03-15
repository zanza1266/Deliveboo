<template>
  <div class="jumbotron d-flex align-items-center justify-content-center">
        <div class="text-center">
            <h1 class="display-3 text-jumbo">Benvenuti in DeliveBoo</h1>
        </div>
       
        
    </div>
</template>

<script>
export default {

}
</script>

<style lang="scss">
.jumbotron{
    position: relative;
    top: -3rem;
    margin: 0;
    height: 20rem;
    background-image: url('/deliveboo_img/jumbotron.png');
    clip-path: polygon(0 13%, 100% 0, 100% 100%, 0 100%);

}
.text-jumbo{
    font-weight: bold;
    color: white;
}


@media screen and (max-width: 815px){
    .text-jumbo{
        font-size: 2.6rem;
    }
}
</style>