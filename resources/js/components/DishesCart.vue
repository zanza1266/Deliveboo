<template>
    <div>
        <ul>
            <li v-for="(dish, index) in allDishes" :key="index">

                <img :src="'/' + dish.img" alt="" style="width: 100px">

                <h3>
                    Nome Piatto: {{dish.name}}
                </h3>

                <p>
                    Prezzo: {{dish.price}}
                </p>

                <button @click="addCart(dish)">Aggiungi al carrello</button>

            </li>
        </ul>

        <!-- CARRELLO -->

        <div>
            <ul>
                <li v-for="(item, index) in cart" :key="index">

                    <p>
                        Nome Piatto: {{item.name}}
                    </p>

                    <small>
                        Prezzo: {{item.price}}
                    </small>

                    <div>
                        <span>Quantità: </span>

                        <span @click="less(index)">-</span>

                        <span>{{item.quantity}}</span>

                        <span @click="more(index)">+</span>
                    </div>

                    <button @click="removeCart(item.id, index)">Rimuovi</button>

                </li>
            </ul>
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

            // if (this.cart.length == 0) {

            //     this.cart.push(item) 

            // } else {

            //     let putting = true;

            //     for (let i = 0; i < this.cart.length; i++) {

            //         if (item.id == this.cart[i].id) {
            //             putting = false; 
            //         } 
            //     } 
                
            //     if (putting) {

            //         this.cart.push(item); 
            //     } 
            // }

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

<style>

</style>