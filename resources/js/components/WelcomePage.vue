<template>
    <section >
        <img src="https://www.mangiaebevi.it/wp-content/uploads/2020/03/Restaurant-Delivery-Traffic.png" alt="">
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
.list-restaurant{
    position: absolute;
    top: -300px;
    left: 44%;
    color: white;
    background-color: rgb(6, 121, 121);
    padding: 0.8rem 1.5rem;
    border-radius: 10px;
}
.list-restaurant:hover{
    text-decoration: none;
}
img{
    position: relative;
    height: 33rem;
    width: 100%;
    background-size: cover;
    filter: brightness(60%);
    object-fit: cover;
}
.titolo{
    width: 100%;
}
h1{
    white-space: nowrap;
    overflow: hidden;
    position: absolute;
    top: 10rem;
    left: 50%;
    transform: translateX(-50%);
    text-align: center;
    color: white;
    font-weight: bold;
    font-size: 4.2rem; 
    
    // mix-blend-mode: difference;
}
.anim-typewriter{
  animation: typewriter 4s steps(44) 0.2s 1 normal both,
             blinkTextCursor 500ms steps(44) infinite normal;
}
@keyframes typewriter{
  from{width: 0;}
  to{width: 24em;}
}
@keyframes blinkTextCursor{
  from{border-right-color: rgba(255,255,255,.75);}
  to{border-right-color: transparent;}
}

</style>