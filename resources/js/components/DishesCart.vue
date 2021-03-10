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
                <a class="text-right mt-4" v-if="cart.length > 0" :href="'/order-summary?cart='+ JSON.stringify(this.cart)">Riepilogo Ordine</a>
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

        this.allDishes = JSON.parse(this.dishes_json)

    },
    data: function() {
        return {

            allDishes: null,
            cart: []

        }
    },
    methods: {
       

        addCart (item) {

            if (!item.quantity) {
                
            Vue.set(item, 'quantity', 1);

            }


            if (this.cart.length == 0) {

                this.cart.push(item);

            } else {

                let indexes = [];

                this.cart.forEach(element => {

                    indexes.push(element.id);
                });

                if (!indexes.includes(item.id)) {

                    this.cart.push(item);
                }

            }

            console.log(this.cart);
        },

        removeCart(id, index) {

            this.cart.forEach(element => {

                if (element.id == id) {

                    this.cart.splice(index, 1);
                }
                
            });

        },

        less (ind) {

            if (this.cart[ind].quantity > 1) {

               this.cart[ind].quantity -= 1;
            }
        },

        more (ind) {

            if (this.cart[ind].quantity < 5) {

                this.cart[ind].quantity += 1;
            }
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
                h3, p{
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