<template>

    <div class=" col d-flex justify-content-center flex-wrap">
        <div v-for="(category, index) in categoriesList" :key="index" class="card text-center" style="width: 18rem;">
            <div class="card-body">
                <h3 class="card-title"> {{category.name}} </h3>

                <a :href= "'/restaurants?category=' + category.id" class="btn btn-primary"> Vedi Ristoranti </a>
                <!-- <slot></slot> -->
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

            categoriesList: JSON.parse(this.categories)

        }
    }

}
</script>

<style>

</style>