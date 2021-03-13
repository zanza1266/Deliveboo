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
    }
    .bg::before{
        background-image: url("https://savonfoodssupermarket.com/wp-content/uploads/2017/06/Backgroud-img.jpg");
        background-size: cover;
        content: "";
        position: absolute;
        top: 0; left: 0;
        width: 100%; height: 100%;
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
    .card:hover{
        box-shadow: 8px 8px 4px 0px #c6c3c3;
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
    .card{
        width:150px;
        opacity: 1;
    }
    .sub-img{
        background-color: white;
    }
    img{
        margin: 0 auto;
        height: 6rem;
        object-fit: cover;
    }
    
</style>