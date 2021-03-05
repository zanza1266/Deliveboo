<template>
    <section>
        <img src="https://www.mangiaebevi.it/wp-content/uploads/2020/03/Restaurant-Delivery-Traffic.png" alt="">
        <div class="titolo">
            <h1 >Benvenuto su Deliveboo</h1>
        </div>
        <slot></slot>
    </section>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>
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
    position: absolute;
    top: 10rem;
    left: 50%;
    transform: translateX(-50%);
    text-align: center;
    color: white;
    font-weight: bold;
    font-size: 5rem; 
    
    // mix-blend-mode: difference;
}
</style>