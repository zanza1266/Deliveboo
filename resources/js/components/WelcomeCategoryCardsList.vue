<template>

    <div class="container">
        <div class="row">
            <div class="col">
                <div v-for="(category, index) in categoriesList" :key="index">

                    <label :for=category.name>{{category.name}}</label>
                    <input type="checkbox" :id=category.name  :value=category.id v-model="selectedCategories">

                </div>

                <a href="#" @click="displaySearched()">Cerca</a>
            </div>
        </div>

        <div class="row">
            <div class=" col d-flex justify-content-center flex-wrap">
                <div v-for="(category, index) in categoriesList" :key="index" class="card text-center" style="width: 18rem;">
                    <div class="card-body">
                        <h3 class="card-title"> {{category.name}} </h3>

                        <a href="#" @click="displayRestaurants(category.id)" class="btn btn-primary"> Vedi Ristoranti </a>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <ul>
                    <li v-for="(restaurant, index) in displayedRestaurants" :key="index">

                        <img :src="restaurant.logo" alt="restaurant-logo">


                        <h2>
                            <a :href="'restaurant/' + restaurant.id">{{restaurant.name}}</a>
                        </h2>

                        <p>
                            Indirizzo: {{restaurant.address}}
                        </p>

                        <small>
                            Telefono: {{restaurant.phone}}
                        </small>
                    </li>
                </ul>
            </div>
        </div>
    </div>



</template>

<script>
export default {

    props: {
        categories: String
    },

    mounted() {

        console.log(JSON.parse(this.categories));

    },

    data: function () {
        return {

            categoriesList: JSON.parse(this.categories),
            displayedRestaurants : [],
            selectedCategories: [],
            restauratsGroup: []

        }
    },

    methods: {

        displayRestaurants(id) {

            axios.get(`http://127.0.0.1:8000/api/restaurants-resource/${id}`)
            .then((res) =>{

                this.displayedRestaurants = res.data.data;
            })
        },

        displaySearched() {

            for (let i = 0; i < this.selectedCategories.length; i++) {

                // console.log(this.selectedCategories[i]);

                axios.get(`http://127.0.0.1:8000/api/restaurants-resource/${this.selectedCategories[i]}`)
                .then((res) =>{
                    let ordine = res.data.data;
                    console.log(ordine);
                    // let ordinato = []
                    // ordine.forEach(element =>{
                    //     ordinato.push(element);
                    // })
                    // let ciao = [...new Set([ordinato])];
                    // console.log(ciao);

                })

            }
            
                    


        }
    }

}
</script>

<style>

</style>