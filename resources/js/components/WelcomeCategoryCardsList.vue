<template>

    <div class="container-fluid bgcustom">
        <div class="row">
            <div class="col-2">
                <div class="row">
                    <div class="col py-3 multipleSearch d-none animate__animated">
                        <h6>Ricerca Avanzata</h6>
                        <div v-for="(category, index) in categoriesList" :key="index" class="searchElements">
                                <label  :for=category.name>{{category.name}}</label>
                                <input type="checkbox"  :id=category.name  :value=category.id v-model="selectedCategories">

                        </div>

                        <a href="#" class="mt-5 custom-btn" @click="displaySearched()">Cerca</a>
                    </div>
                    <div class="col pt-4 divSearch animate__animated animate__fadeInRight  d-inline-block">
                        
                            <a class="btn custom-btn btnSearch d-inline-block " @click="showMultipleSearch()">
                                Ricerca Avanzata
                            </a> 
                    </div>
                </div>
            </div>
            <div class="col-10 d-flex justify-content-center flex-wrap">
                <div v-for="(category, index) in categoriesList" :key="index" class="card text-center card_style" @click="displayRestaurants(category.id)"  :style="{ backgroundImage: 'url(' + category.bgimg + ')' }" style="background-size: cover;">
                    <div class="card-body d-flex justify-content-start align-items-end">
                        <h3 class="card-title"> {{category.name}} </h3>
                    </div>
                </div>
            </div>
        </div>
        


        <div class="row ">
            <div class="offset-2 col-10">
                <ul>
                    <li v-for="(restaurant, index) in displayedRestaurants" :key="index">

                        <div class="card restaurants-card" style="width: 18rem;">
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


    },

    data: function () {
        return {

            categoriesList: JSON.parse(this.categories),
            displayedRestaurants : [],
            selectedCategories: []
        }
    },

    methods: {
        showMultipleSearch(){
            document.querySelector('.multipleSearch').classList.toggle('animate__fadeInLeft');
            document.querySelector('.multipleSearch').classList.toggle('d-none');
            document.querySelector('.divSearch').classList.toggle('animate__fadeInLeft');
            document.querySelector('.divSearch').classList.toggle('animate__fadeInRight');

            if(document.querySelector('.btnSearch').innerText == "Ricerca Avanzata"){

                document.querySelector('.btnSearch').innerText = "Chiudi";

            }else if(document.querySelector('.btnSearch').innerText == "Chiudi"){

                document.querySelector('.btnSearch').innerText = "Ricerca Avanzata";

            }

        },
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

                console.log(res.data.data);
                this.displayedRestaurants = res.data.data;

            })
        }
    }

}
</script>

<style lang="scss" scoped>
.multipleSearch{
    border: #00423d 1px solid;
    border-left: none;
    border-radius: 10%;
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
    background-color:#00998c;
    color: white;
    letter-spacing: 2px;
    
}
.card_style{
    border-radius: 10px;
    width: 15rem;
    height: 8rem;
    margin: 2px  3rem;
    cursor: pointer;
    background-color: rgb(6, 121, 121);
    position: relative;
      transition: all 0.5s ease;
    filter: grayscale(60%);
    h3{
        font-weight: bold;
        color: white;
        font-size: 15px;
        position: absolute;
        bottom: 0px;
    }
}
.card_style:hover{
    filter: grayscale(0%);
}
ul{
    display: flex;
    flex-wrap: wrap;
    
    li{
        margin: 2rem;
        list-style: none;

        a{
            color: white;
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
    .custom-btn{
        margin: 0 0.5rem;
        padding: 0.6rem 1.5rem;
        border-radius: 0.5rem;
        background: white;
        color:  rgb(6, 121, 121);
        box-shadow:2px 3px rgba(0, 0, 0, 0.226);
    }
    .custom-btn:hover{
        background-color: rgb(231, 231, 231);
        text-decoration: none;
        color: rgb(6, 121, 121);
    }
    .searchElements{
        display: flex;
        justify-content: space-between;
            label{
                padding-left: 50px;
                font-weight: bold;
                text-transform: capitalize;
            }   
    }
    .multipleSearch a{
        letter-spacing: 0;
        padding:0.5rem 0.75rem;
        border-radius:5px;
        margin-left: 15px;
        margin-left: 50px;
        margin-bottom: 20px;
    }
    
</style>
<style>

body{
    background-image: url('/deliveboo_img/placeholder.svg');
    background-repeat: repeat;
}
</style>