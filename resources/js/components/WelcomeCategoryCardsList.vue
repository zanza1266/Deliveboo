<template>

    <div class="container-fluid center-space">
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
            <div class=" col d-flex justify-content-center ">
                <div v-for="(category, index) in categoriesList" :key="index" class="card text-center card_style" @click="displayRestaurants(category.id)" >
                    <div class="card-body d-flex justify-content-start align-items-end">
                        <h3 class="card-title"> {{category.name}} </h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <ul>
                    <li v-for="(restaurant, index) in displayedRestaurants" :key="index">
                        
                        <div class="card restaurants-card" >
                            <img :src="restaurant.logo" alt="restaurant-logo" class="card-img-top" >
                            <div class="card-body">
                                <a class="card-title" :href="'restaurant/' + restaurant.id">{{restaurant.name}}</a>
                                <p class="card-text">Indirizzo: {{restaurant.address}}</p>
                                <small>
                                    Telefono: {{restaurant.phone}}
                                </small>
                            </div>
                        </div>
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

        // console.log(JSON.parse(this.categories));

    },

    data: function () {
        return {

            categoriesList: JSON.parse(this.categories),
            displayedRestaurants : [],
            selectedCategories: [],
            restauratsGroup: [],
            containerFilter: []

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

            let categoriesString = this.selectedCategories.join()


            axios.get(`http://127.0.0.1:8000/api/restaurants-filtered`, {
                params: {
                    categories: categoriesString
                }
            })
            .then((res) =>{

                console.log(res.data);

            })
        }
    }

}
</script>

<style lang="scss" scoped>

.card_style{
    border-radius: 10px;
    width: 10rem;
    height: 5rem;
    margin: 2px  3rem;
    cursor: pointer;
    background-color: rgb(6, 121, 121);
    position: relative; 
    h3{
        font-weight: bold;
        color: white;
        font-size: 15px;
        position: absolute;
        bottom: 0px;
    }
}
ul{
    display: flex;
    
    li{
        margin: 2rem;
        list-style: none;
        
        a{
            color: black;
            font-size: 1.3rem;
            font-weight: bold;
        }
        a:hover{
            text-decoration: none;
        }
        img{
            width: 10rem;
            height: 5rem;
        }
    }
}
.restaurants-card{
    width: 18rem;
    transition: all 1s;
}
.restaurants-card:hover{
    transform: scale(1.2);
}
</style>