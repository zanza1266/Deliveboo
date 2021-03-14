<template>
    <section class="" >
        <div class="d-flex">

            <!-- <img src="https://www.mangiaebevi.it/wp-content/uploads/2020/03/Restaurant-Delivery-Traffic.png" alt=""> -->
        </div>
        <div class="titolo">
            <h1 class="anim-typewriter " >Benvenuto su Deliveboo</h1>
        </div>
        <slot></slot>
    </section>
</template>

<script>
export default {

}
</script>
<style lang="scss" scoped>
section{
    background-image:url('../../../public/deliveboo_img/sfondo-welcome.png');
    background-size: cover;
    background-repeat: no-repeat;
    width: 100%;
    height: 40rem;
    margin: 0;
}

.list-restaurant{
    position: absolute;
    top: 18rem;
    left: 50%;
    transform: translateX(-50%);
    color: white;
    background-color: rgb(6, 121, 121);
    padding: 1.2rem 2rem;
    border-radius: 10px;
    font-size: 120%;
}
.list-restaurant:hover{
    text-decoration: none;
}

   
    // img{
    //     position: relative;
    //     height: auto;
    //     width: 100%;
    //     height: 100%;
    //     background-size: cover;
    //     filter: brightness(60%);
    //     object-fit: cover;
    // }

.titolo{
    width: 100%;
}
h1{
    white-space: nowrap;
    overflow: hidden;
    position: absolute;
    top: 15rem;
    left: 50%;
    transform: translateX(-50%);
    text-align: center;
    color: white;
    font-weight: bold;
    font-size: 4.0rem; 
    width: 90%;
    
    // mix-blend-mode: difference;
}
.anim-typewriter{
  animation: typewriter 4s steps(44) 0.2s 1 normal both,
             blinkTextCursor 500ms steps(44) infinite normal;
}
@keyframes typewriter{
  from{width: 0;}
  to{width: 100%;}
}
@keyframes blinkTextCursor{
  from{border-right-color: rgba(255,255,255,.75);}
  to{border-right-color: transparent;}
}
@media screen  and (max-width:1000px ) and (min-width:600px ){
    .list-restaurant{
        padding: 0.9rem 1.6rem;
        border-radius: 10px;
        font-size: 120%;
        text-align: center;
    } 
    h1{
        white-space: wrap;
        overflow: hidden;
        text-align: center;
        font-size: 3rem; 
        width: 90%;  
    }
}
@media screen  and (max-width:600px) {
    .list-restaurant{
        padding: 0.5rem 1.2rem;
        border-radius: 10px;
        font-size: 100%;
        text-align: center;
    } 
    h1{
        white-space: wrap;
        overflow: hidden;
        text-align: center;
        font-size: 2rem; 
        width: 90%;  
    }
}
</style>