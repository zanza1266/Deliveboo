<!-- <div class="card" style="width:20rem">
                            <div class="image-overlay"> <img :src="'/' + dish.img" alt="" class="card-img-top">
                                 <div class="middle d-flex align-items-center justify-content-center">
                                    <div class="text"> 
                                        <h3 class="card-title">{{dish.name}}</h3>
                                        <p class="card-text">Prezzo: {{dish.price}}</p>
                                        
                                        
                                     </div>
                                     
                                </div>
                                
                            </div>
                            
                        </div> -->
<template>
    <div class="container-fluid  ">
        
        <div class="row">

            <div  :class="cart.length > 0 ? 'col-lg-9 col-md-12' : 'col-12' ">

                <ul class="">
                    <li v-for="(dish, index) in allDishes" :key="index">
                        <div class="container-fluid ">
                            <div class="row bg-light px-2 py-2 ">
                                <div class="col-xl-2 col-md-4 col-lg-3 col-sm-4 col-xs-4">
                                    <img :src="'/' + dish.img" alt="" class=" img-dish">
                                </div>
                                <div class="col-xl-7 col-md-4 col-lg-6 col-sm-4 col-xs-4 d-flex flex-column justify-content-center">
                                    <div class="middle d-flex align-items-center ">
                                        <div class="text"> 

                                            <h3 class="card-title">{{dish.name}}</h3>
                                            <!-- <small class="card-text">Prezzo: {{dish.price}}€</small> -->
                                            <p>{{dish.description}}</p>    
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-4 col-lg-3 col-sm-4 col-xs-4 d-flex align-items-center justify-content-around">
                                    <h5 class="card-text"><strong> {{dish.price}}€</strong></h5>
                                    <button class="btn btn-outline-primary my-3" @click="addCart(dish)">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                                            <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"/>
                                            <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                    </li>
                </ul>
            </div>
            


            <!-- CARRELLO -->
            
                
            <div :class="cart.length > 0 ? 'col-2' : null " class=" cart-dish">
                <button class=" btn order-btn" v-if="cart.length > 0" @click="goSummary">Vai alla cassa</button>
                
                <ul  v-if="cart.length > 0" class="overflow-cart px-2">
                    <h4 class="py-2" style="text-align:center">~ Il tuo Menu ~</h4>
                    <li v-for="(item, index) in cart" :key="index">

                        <strong>
                            {{item.name}}
                        </strong><br>
                        
                        <small>
                            {{item.price}}€
                        </small>

                        <div>
                            
                            
                            <span @click="less(index)" class="cursor">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                                </svg>
                            </span>

                            <span>{{item.quantity}}</span>

                            <span @click="more(index)" class="cursor">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                </svg>
                            </span>
                        </div>
                        <hr style="width:8rem">    
                        <p class="text-danger cursor" @click="removeCart(item.id, index)">Rimuovi</p>

                    </li>
                </ul>
                


            </div>

            <!-- BANNER -->

            <div class="banner-container" v-show="isBannerCart">

                <div class="banner">
                    <h3>Il tuo carrello contiene già un ordine di "{{this.$session.get('nameRastaurantInCart')}}", vuoi svuotarlo e creare un nuovo carrello?</h3>

                    <div class="button-wrapper">
                        <button class="btn btn-outline-success mx-2" @click="keepCurrentCart">Annulla</button>
                        <button class="btn btn-outline-success mx-2" @click="startNewCart">Crea nuovo carrello</button>
                    </div>
                </div>

            </div>

        </div>

    </div>

</template>

<script>
export default {
    props: {
        dishes_json: String,
        restaurant_json: String
    },
    mounted() {

        this.allDishes = JSON.parse(this.dishes_json);
        this.restaurant = JSON.parse(this.restaurant_json);

        if (this.$session.exists('cart')) {

            this.cart = this.$session.get('cart');
        }
    },
    data: function() {
        return {

            allDishes: null,
            cart: [],
            idRestaurantInCart: null,
            isBannerCart: false,
            tmpItem: null,
            restaurant: null,
            maxiumOrderQuantity: 100
        }
    },

    methods: {
       

        addCart (item) {

            if (!item.quantity || item.quantity > 1) {

                Vue.set(item, 'quantity', 1);
            }


            if (this.cart.length == 0) {

                this.cart.push(item);
                this.$session.set('idRestInCart', item.restaurant_id);
                this.$session.set('nameRastaurantInCart', this.restaurant.name);

            } else {


                if (item.restaurant_id == this.$session.get('idRestInCart')) {

                    let indexes = [];

                    this.cart.forEach(element => {

                        indexes.push(element.id);
                    });

                    if (!indexes.includes(item.id)) {

                        this.cart.push(item);
                    }

                } else {
                    this.isBannerCart = !this.isBannerCart;
                    this.tmpItem = item;

                }

            }

            this.$session.set('cart', this.cart);
        },

        removeCart(id, index) {

            this.cart.forEach(element => {

                if (element.id == id) {

                    this.cart.splice(index, 1);
                }
                
            });

            this.$session.set('cart', this.cart);

        },

        less (ind) {

            if (this.cart[ind].quantity > 1) {

               this.cart[ind].quantity -= 1;
            }
            this.$session.set('cart', this.cart);
        },

        more (ind) {

            if (this.cart[ind].quantity < this.maxiumOrderQuantity) {

                this.cart[ind].quantity += 1;
            }
            this.$session.set('cart', this.cart);
        },


        goSummary () {

            let cartjson = JSON.stringify(this.cart);

            this.$session.clear('cart');

            axios.post('/send-cart-data', {
                cart: cartjson
            })
            .then(function (response) {

                window.location.href = "/order-summary";
            })
        },

        keepCurrentCart () {

            this.isBannerCart = !this.isBannerCart;

        },

        startNewCart () {

            this.isBannerCart = !this.isBannerCart;
            this.cart = []
            this.addCart(this.tmpItem);
            this.tmpItem = null

        }
    }

}
</script>

<style lang="scss" scoped>

ul{
    padding-left: 0;
}
.order-btn{
    border: 1px solid #e8ebeb;
    background-color: #fff;
    color: #00b8a9;
    margin-bottom: 0.7rem;
}
    .overflow-cart::-webkit-scrollbar {

     width: 12px;
    }

    a{

        color: #fff;
        background-color: #00ccbc;
        border-color: #00ccdc;
        padding:0.5rem 0.75rem;
        border-radius:5px;
        margin-left: 15px;
    }

    a:hover{

        text-decoration: none;
        color: #fff;
        background-color: #227dc7;
        border-color: #2176bd;
    }
    

    h4{

        font-size: 1.5rem;
        
    }

    .overflow-cart{

        
        font-size: 1.2rem;
        border-radius:10px;
    }

    li > *,h1{

        text-transform: capitalize;
    }
    .cursor:hover{

        cursor: pointer;
    }

    .bi-dash-circle:active{

        color: red;
    }

    .bi-plus-circle:active{

        color: green;
    }
    ul{
        li{
            
            list-style: none;
            margin-bottom:0.7rem ;
        }
    }
    .overflow-cart{

        overflow-y: hidden;
        height: 25rem;

        li{

            margin: 0;
            padding:1rem ;
            border-radius: 10px;
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
            border-radius: 20px;
            position: absolute;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 30px;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);

            h3 {
                text-align: center;
            }

            .button-wrapper {

                display: flex;
                flex-direction: row;
                padding-top: 20px;
            }
        }
    }

    .d-flex li{
        text-align: center;
        
    }
    .card:hover{
        box-shadow: 2px 2px 10px rgba(0,0,0,0.4);
    }
    .card{
        border-radius:4px;
        border:0;  
        transition: 0.4s;
    }

    .card:hover{
    
        box-shadow: 2px 2px 10px rgba(0,0,0,0.4);
    }

    .card{

        border-radius:4px;
        border:0;
 
    }

    .image-overlay {

        position: relative;

        .middle {
        transition: .5s ease;
        opacity: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        width: 100%;
        height: 100%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        text-align: center;
                .text {
                color: #222;
                    h3, p{
                    font-weight: bold;
                        }
                      }
                    }
                }  
    .image-overlay:hover img {
        opacity: 0.3;
        transition: 0.4s;
        cursor: pointer;
    }
    .image-overlay:hover .middle {
        opacity: 1;
        cursor: pointer;
    }
    
.cart-dish{
    position: absolute;
    top:-12rem;
    right:0;
    display: flex;
    flex-direction: column;
}
.img-dish{
    width: 7rem;
    height: 7rem;
    border-radius: 10px;
    border: 1px solid rgb(243, 243, 243);
    object-fit: cover;
}
@media screen and (max-width: 992px) {
    .cart-dish{
        display: none;
    }
}
@media screen and (max-width:576px){
    .img-dish{
        width: 100%;
        height: 7rem;
        border-radius: 10px;
        border: 1px solid rgb(243, 243, 243);
        object-fit: cover;
    }
}
</style>
<style lang="scss">
.square-logo{
    width: 6rem;
    height: 6rem;
    border-radius: 10px;
    border: 1px solid rgb(243, 243, 243);
   
    & img{
        border-radius: 10px;

        width: 100%;
        height: 100%; 
        object-fit: cover;  
    }
}
.details-restaurant{
    span{
        font-size: 1.0rem;
        margin-left: 0.5rem;
    }
}
@media screen and (max-width: 576px) {
    .center-space{
        width: 100%;
    }
    .square-logo{
    width: 6rem;
    height: 6rem;
    border-radius: 10px;
    border: 1px solid rgb(243, 243, 243);
   
    & img{
        border-radius: 10px;

        width: 100%;
        height: 100%; 
        object-fit: cover;  
    }
}
    
}

</style>