<template>
    <div class="container-fluid">
        <div class="row">

            <div class="col-10">

                <ul class="d-flex  flex-wrap">
                    <li v-for="(dish, index) in allDishes" :key="index">
                        <div class="card" style="width:18rem">
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

            <div class="col-2">
                <ul class="">
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
                        <hr style="width:10rem">    
                        <p class="text-danger cursor" @click="removeCart(item.id, index)">Rimuovi</p>

                    </li>
                </ul>
            </div>
        </div>

        <a :href="'/order-summary?cart='+ JSON.stringify(this.cart)">Riepilogo Ordine</a>
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
i{
    width: 30px;
}
</style>