<template>
    <div class="container-fluid">
        <div class="row">

            <div  :class="cart.length > 0 ? 'col-10' : 'col-12' ">

                <ul class="d-flex  flex-wrap">
                    <li v-for="(dish, index) in allDishes" :key="index">
                        <div class="card" style="width:20rem">
                            <div class="image-overlay"> <img :src="'/' + dish.img" alt="" class="card-img-top">
                                 <div class="middle d-flex align-items-center justify-content-center">
                                    <div class="text"> 
                                        <h3 class="card-title">{{dish.name}}</h3>
                                        <p class="card-text">Prezzo: {{dish.price}}</p>
                                        
                                        
                                     </div>
                                     
                                </div>
                                
                            </div>
                            <button class="btn btn-primary my-3" @click="addCart(dish)">Aggiungi al carrello</button>
                        </div>
                        
                    </li>
                </ul>
            </div>
            


            <!-- CARRELLO -->
            
                
            <div :class="cart.length > 0 ? 'col-2' : null ">
                
                <ul  v-if="cart.length > 0" class="overflow-cart px-2">
                    <h4 class="py-2">~ Il tuo Menu ~</h4>
                    <li v-for="(item, index) in cart" :key="index">

                        <strong>
                            {{item.name}}
                        </strong><br>
                        
                        <small>
                            {{item.price}}€
                        </small>

                        <div>
                            <span>Quantità: </span>

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

            <button class="text-right go-summary" v-if="cart.length > 0" @click="goSummary">Riepilogo Ordine</button>

            <!-- Banner -->

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

            if (!item.quantity) {

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

    .overflow-cart::-webkit-scrollbar {

        width: 12px;
    }

    .overflow-cart::-webkit-scrollbar-track {
    
        background: black;
    }

    .overflow-cart::-webkit-scrollbar-thumb {

        background-color: #00ccbc;    
        border-radius: 20px;       
        border: 3px solid black; 
    }

    h4{

        font-size: 1.5rem;
        font-family: 'Akaya Telivigala', cursive;
    }

    .overflow-cart{

        font-family: 'Akaya Telivigala', cursive;
        font-size: 1.2rem;
        background-image: url("https://p7.hiclipart.com/preview/166/648/1011/paper-brown-rectangle-paper-sheet-png-image.jpg");
        background-size: cover;
        border-radius:10px;
    }

    ul{
    
        list-style-type: none;
        padding: 0;

        li{

            margin: 0.8rem;
        }
    }

    li > *,h1{

        text-transform: capitalize;
    }

    img{

        width: 100%;
        height: 10rem;
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

    .overflow-cart{

        overflow-y: auto;
        height: 25rem;

        li{

            margin: 0;
            padding:1rem ;
            border-radius: 10px;
        }
    }

    .go-summary{

        position: absolute;
        right:5%;
        top: -50px;
        text-decoration: none;
        padding: 5px 12px;
        border-radius: 10px;
        background-color: #227dc7;
        color: white;
        width: 8.7rem;
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

                h3, p {

                    font-weight: bold;
                }
            }
        }
    }

    .image-overlay:hover img {

        opacity: 0.3;
        cursor: pointer;
    }

    .image-overlay:hover .middle {

        opacity: 1;
        cursor: pointer;
    }

    .btn{

        width:50%;
        margin: 0 auto;
    }

</style>