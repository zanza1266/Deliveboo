<template>
<footer class="section-footer mt-auto">

    <div class="container-fluid center-space">
        <div class="row  overflow_x">
            <div class="col">
                <ul>
                    <li><h6>Giuseppe Zerino</h6></li>
                    <li><b>Linkedin:</b> <a href="https://www.linkedin.com/in/giuseppe-zerino-86a2bb1b7/">Mirko Guerra</a> </li>
                    <li><b>Github:</b> <a href="https://github.com/Laxeer0">MirkoGuerra</a> </li>
                    <li><b>Numero:</b> +39 334 9703296 </li>
                    <li><b>E-mail:</b> <a href="mailto:giuseppe.zerino28@gmail.com">giuseppe.zerino28@gmail.com</a></li>
                </ul>
            </div>

            <div class="col">
                <ul>
                    <li><h6>Mirko Guerra</h6></li>
                    <li><b>Linkedin:</b> <a href="https://www.linkedin.com/in/mirko-guerra-90a268207/">Mirko Guerra</a> </li>
                    <li><b>Github:</b> <a href="https://github.com/mirkoguerra">MirkoGuerra</a> </li>
                    <li><b>Numero:</b> +39 320 9582596 </li>
                    <li><b>E-mail:</b> <a href="mailto:mirkoguerra93@gmail.com">mirkoguerra93@gmail.com</a></li>
                </ul>
            </div>

            <div class="col">
                <ul>
                    <li><h6>Gianluca Zanzarella</h6></li>
                    <li><b>Linkedin:</b> <a href="https://www.linkedin.com/in/gianluca-zanzarella/">Gianluca Zanzarella</a> </li>
                    <li><b>Github:</b> <a href="https://github.com/zanza1266">zanza1266</a> </li>
                    <li><b>Numero:</b> +39 366 4822719 </li>
                    <li><b>E-mail:</b> <a href="mailto:gianlucazanza@hotmail.com.com">gianlucazanza@hotmail.com.com</a></li>
                </ul>
            </div>

            <div class="col">
                <ul>
                     <li><h6>Leonardo Barbieri</h6></li>
                    <li><b>Linkedin:</b> <a href="https://www.linkedin.com/in/leonardo-barbieri-340475194">Leonardo Barbieri</a> </li>
                    <li><b>Github:</b> <a href="https://github.com/Leobar00">Leobar00</a> </li>
                    <li><b>Numero:</b> +39 320 8798962 </li>
                    <li><b>E-mail:</b> <a href="mailto:barbierileon@gmail.com">barbierileon@gmail.com</a></li>
                </ul>
            </div>

            <div class="col">
                <ul>
                     <li><h6>Martina Pozzerle</h6></li>
                    <li><b>Linkedin:</b> <a href="https://www.linkedin.com/in/martina-pozzerle/">Martina Pozzerle</a> </li>
                    <li><b>Github:</b> <a href="https://github.com/pozmar">pozmar</a> </li>
                    <li><b>Numero:</b> +39 347 8865448 </li>
                    <li><b>E-mail:</b> <a href="mailto:martina.pozzerle@libero.it">martina.pozzerle@libero.it</a></li>
                </ul>
            </div>


            
        </div>
        <div class="bottom-footer d-flex justify-content-between">
            <div>
                <i class="fab fa-facebook "></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-instagram"></i>

            </div>
            <div>
                <small>© 2021 Deliveroo</small>
            </div>

        </div>
    </div>
</footer>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>

footer{
    position: absolute;
  bottom: 0;
  width: 100%;
}

$color-li : white;
.section-footer{
    overflow-x:hidden;
    background-color: #2e3333;
    width: 100%;
    height: 22rem;
    .overflow_x{
            overflow-x: auto;     
        ul{
            min-width:10rem;
            width: 90%;
            border-radius: 5px;
            margin: 2rem 0;
            background-color: #434848;
            padding: 15px;
            height: 80%;
            li{
                display:block;
                color:$color-li;
                list-style: none;
            
                h6{
                    font-size: 100%;
                    font-weight: bold;
                }
                a{
                    text-decoration: none;
                    color:$color-li;
                    font-size: 95%;
                    

                }
                a:hover{
                    color:teal;
                }
                img{
                    width:60%;
                    height: 90%;
                    border-radius:10px;
                    margin: 5px 0;
                    cursor: pointer;
                }
            }
        }
    }
    


    .bottom-footer{
        width: 100%;
        padding: 0 15px;
        i{
            color:$color-li;
            margin: 0.3rem;
            cursor:pointer;
        }
        i:hover{
            color:teal;

        }
        small{
            color:$color-li;
            color: #4f6f85;
            font-size: 0.7rem;
        }
        
    }
}
</style>
<style>
body{
    margin-bottom: 22rem;
}
.center-space{
    width:80%;
    margin: 0 auto;
}
html{
    font-size: 15px;
    width:100%;
     position: relative;
     min-height: 100%;
}
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

</style>