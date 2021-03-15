<template>
  <div class="jumbotron">
        <div class="text-center">
                <h1 class="display-4 text-jumbo">Welcome to DeliveBoo</h1>
        
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
    color: #00ccbc;
}
</style>