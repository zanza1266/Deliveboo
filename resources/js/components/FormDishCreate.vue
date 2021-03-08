<template>
<div>
  <slot></slot>
  </div>
</template>

<script>
export default {
   name:'form-dish-create'
}
</script>

<style lang="scss" scoped>
div{
    text-align: center;
    input[type="text"]{
        width: 50%;
        height: 50px;
        margin: 0 auto;
    }
}
.card-contact{
    background-color:white;
    width: 50%;
    margin: 30px auto;
    padding:20px 0px;
    border-radius: 10px;
    box-shadow: 5px 10px rgba(0, 0, 0, 0.1);
}
label{
    font-size: 1.2rem;
}
label:not(.checkbox-item label,.radio-available label){
    font-size: 1.2rem;
    font-weight:bold ;
}
.radio-available p,h4{
    font-weight: bold;
}
p{
    font-size: 1.2rem ;

}
span{
    margin: 0 10px;
}
.checkbox-item{
    width: 70%;
    margin: 0 auto;
}
button{
    font-size: 1.2rem;
    width: 150px;
    padding: 10px 15px;
    background-color:#00CCBC ;
    border-radius: 10px;
    color: white;
    border: 1px solid #00CCBC;
}
button:hover{
    background-color:#00a597 ;
    transition: 0.4s;
}

</style>