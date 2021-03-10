<template>
    <div class="container-fluid">
        <div class="row">

            <div  :class="cart.length > 0 ? 'col-10' : 'col-12' ">

                <ul class="d-flex  flex-wrap">
                    <li v-for="(dish, index) in allDishes" :key="index">
                        <div class="card" style="width:17rem">
                            <img :src="'/' + dish.img" alt="" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">{{dish.name}}</h5>
                                <p class="card-text">Prezzo: {{dish.price}}</p>
                                <button class="btn btn-primary" @click="addCart(dish)">Aggiungi al carrello</button>
                                
                            </div>
                        </div>  
                    </li>
                </ul>
            </div>
            


            <!-- CARRELLO -->

            <div :class="cart.length > 0 ? 'col-2' : null " class=" overflow-cart">
                <ul class="" v-if="cart.length > 0">
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
                    <!-- <form action="{{ route('my-dishes.destroy', $dish->id) }}" method="post">
                        @csrf
                        @method('delete')

                        <h3>Sei sicuro di voler eliminare questo piatto?</h3>
                        <button class="btn btn-outline-danger" @click="activeBannerDish">Elimina</button>
                    </form> -->

                    <h3>Il tuo carrello contiene un ordine da un altro ristorante, vuoi svuotarlo e creare un nuovo carrello?</h3>

                    <button class="btn btn-outline-success mx-2" @click="keepCurrentCart">Annulla</button>
                    <button class="btn btn-outline-success mx-2" @click="startNewCart">Annulla</button>
                    
                </div>

            </div>

        </div>

    </div>
  
</template>

<script>
export default {
    props: {
        dishes_json: String 
    },
    mounted() {

        this.allDishes = JSON.parse(this.dishes_json);

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
            tmpItem: null
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

            if (this.cart[ind].quantity < 5) {

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
    list-style-type: none;
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

.banner-container {
    border: 2px solid red;
}
</style>