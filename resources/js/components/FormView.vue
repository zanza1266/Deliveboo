<template>
  <div>
      <slot></slot>
  </div>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>

section.background {
  width: 100%;
  height: 100%;
  background-image: linear-gradient(to left, #00CCBC, #067979);
  padding: 20px 0;

  div.card-contact {
      background-color: white;
      width: 70%;
      margin: 0 auto;
      padding: 20px 0px;
      padding-left: 10px;
      border-radius: 10px;
      box-shadow: 5px 10px rgba(0, 0, 0, 0.1);

    div.sub-card-contact {
      margin-left: 25%;

      div.top {

        label {
          font-size: 1.5rem;
        }
        input {
          width: 50%;
        }
      }

      div.logo {

        label {
          font-size: 1.5rem;
        }

        input.form-control {
          font-size: 1rem;
          width: 50%;
        }
      }

      div.checkbox-item {

        h4 {
          font-size: 1.5rem;
        }
        div.sub-check-items {
          padding: 10px 10px 0px 10px;
          position: relative;
          width: 300px;
          display: flex;
          flex-direction: column;
          border-radius: 10px;
          box-shadow: 5px 10px rgba(0, 0, 0, 0.1);
          background-image: linear-gradient(to right, #00CCBC, #067979);

          label {
            font-size: 1.2rem;
          }
          input {
            position: absolute;
            right: 10px;
          }
        }
      }

      div.radio {

        p {
          font-size: 1.5rem;
          margin-bottom: 5px;
        }
        label {
          font-size: 1.2rem;
        }
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
    }
  }
}

@media screen and (max-width: 900px) {

  section.background {

    div.card-contact {
      width: 90%;

      div.sub-card-contact {
        margin-left: 15%;

        div.checkbox-item {

          h4 {
            font-size: 1.3rem;
          }
        }
      }
    }
  }
}
// img{
//     width: 15%;
//     height: 30%;
// }
// div{
//
//     input[type="text"]{
//         width: 50%;
//         height: 35px;
//     }
// }
//
// label{
//     font-size: 1.2rem;
// }
// label:not(.checkbox-item label,.radio label){
//     font-size: 1.2rem;
//     font-weight:bold ;
// }
// .radio p,h4{
//     font-weight: bold;
// }
// p{
//     font-size: 1.2rem ;
//
// }
// span{
//     margin: 0 10px;
// }
// .checkbox-item{
//
// }
// button{
//     font-size: 1.2rem;
//     width: 150px;
//     padding: 10px 15px;
//     background-color:#00CCBC ;
//     border-radius: 10px;
//     color: white;
//     border: 1px solid #00CCBC;
// }
// button:hover{
//     background-color:#00a597 ;
//     transition: 0.4s;
// }
// img{
//     width: 15%;
//     height: 30%;
//
// }
</style>
