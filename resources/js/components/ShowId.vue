<template>
    <div class="center-space">
        <slot></slot>
    </div>
</template>

<script>
    export default {

    }
</script>

<style lang="scss" scoped>

    .card-body{

        width: 80%;
        outline: none;
        background-image: linear-gradient(45deg, lightgrey, transparent);
        border-radius: 10px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .stats{

        border: 1px solid #332d2f;
        color: #332d2f;
    }

    .stats:hover{

        color: white;
        background-color: #332d2f;
        border: 1px solid #332d2f;
    }

    .center-space{

        position: relative;
        width:100%;
        margin: 0;
    }

    .center-space::before{

        content: "";
        position: absolute;
        top: 0; left: 0;
        width: 100%; height: 100%;
        filter: brightness(60%);
        background-image: url("https://wallpapercave.com/wp/wp4289147.jpg");
        background-size: cover;
    }

    .card:hover{

       -webkit-box-shadow: 14px 9px 5px 0px rgba(255,255,255, 0.9);
        -moz-box-shadow: 14px 9px 5px 0px rgba(0,0,0,0.3);
        box-shadow: 8px 8px 4px 0px #74757b;
    }

    .card-container{

        border-radius: 5px;
        width: 45%;
        margin: 3rem auto;

        & > *{
            margin: 0 auto;
            font-size: 1rem;
        }

        img{

            text-align: center;
            width: 100%;
            height: 18rem;
            background-size: cover;
        }

        a:hover{

            color: white;
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
            border: 5px solid red;
            border-radius: 20px;
            position: absolute;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 30px;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
        }
    }

    .buttons-container {

        width: 100%;
        padding: 0 50px;
    }

    .action {

        display: flex;
        justify-content: center;
        color: white;
        margin-bottom: 10px;
        width: 90%;
        background-color: #00ccbc;
        border-radius: 8px;
        border:none;
        padding: 10px;
        transition: all .2s;
        text-decoration: none;
    }

    .bottom {

        display: flex;
        justify-content: center;
        color: white;
        margin-bottom: 10px;
        width: 80%;
        border-radius: 8px;
        border:none;
        padding: 7px;
        font-size: 12px;
        text-decoration: none;
        transition: all .2s;
    }

    .delete {

        background-color: red;
    }

    .edit {

        background-color: #067979;
    }

    .action:hover {

        background-color:rgba(0,204,188,0.4);
        width: 100%;
    }

    .bottom:hover {

        background-color:rgba(0,204,188,0.4);
        cursor: pointer;
    }

    @media screen and (min-width: 992px) and (max-width: 1024px){

        .card-container{
            width:60%;
        }
    }
    
    @media screen and (min-width: 769px) and (max-width: 991px){

        .card-container{
            width:70%;
        }
    }

    @media screen and (min-width: 481px) and (max-width: 768px){
        .card-container{
            width:80%;
        }
        .card-container >*{
            font-size: 0.8rem;
        }
        a{
            font-size:0.7rem;
        }
        img{
            height:5rem;
        }
    }

    @media screen and (max-width: 480px){

        .card-container {

            width:90%;
        }
        .card-container >* {

            font-size: 0.8rem;
        }

        a {

            font-size:0.7rem;
        }

        img {

            height:2rem;
        }
    }

</style>