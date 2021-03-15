<template>
  <div class="bg">
      <slot></slot>
  </div>
</template>

<script>

export default {
    name:'show-elements'
}
</script>

<style lang="scss" scoped>


    .bg{

        position: relative;
        min-height: 90vh;
        min-width: 390px;
    }

    .bg::before{

        background-image: url("https://savonfoodssupermarket.com/wp-content/uploads/2017/06/Backgroud-img.jpg");
        background-size: cover;
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        filter: brightness(60%);
    }

    ul{
    
        display: flex;
        justify-content: center;
        list-style: none;
        flex-wrap: wrap;

        li{

            margin: 0 10px;
        }
    }

    .card {

        transition: all 0.2s;
        border-radius: 10px;
        min-height: 220px;
        width:150px;
        opacity: 1;
        position: relative;
    }

    .card:hover{

        box-shadow: 8px 8px 4px 0px #c6c3c3;
        border-radius: 0px;
    }

    .bg{

        width:100%;
        margin: 0;
        
    }

    h1{

        color: white;
        filter: brightness(100%);
        font-weight: 800;
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

    .sub-img{

        background-color: white;
    }

    img{

        object-fit: cover;
        width: 100%;
        border-radius: 5px;
    }

    .img-cont {

        width: 100%;
        min-height: 60%;
        padding: 10px;
    }

    .no-rest {

        padding-top: 200px
    }

    .not-available {

        background-color: rgba($color: white, $alpha: 0.2);
    }

    .opac {

        opacity: 0.2;
    }

    small {

        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: red;
        opacity: 1;
        z-index: 100;
        font-weight: bold;
    }

</style>