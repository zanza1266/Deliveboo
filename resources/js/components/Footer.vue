<template>
<footer class="section-footer">

    <div class="container-fluid center-space">
        <div class="row  overflow_x">
            <div class="col-3">
                <ul>

                    <li><h6>Scopri DeliveBoo</h6></li>
                    <li><a href="#">Chi siamo</a></li>
                    <li><a href="#">Pressroom</a></li>
                    <li><a href="#">Il nostro blog</a></li>
                    <li><a href="#">Programmazione</a></li>
                    <li><a href="#">Design</a></li>
                    <li><a href="#">Lavora con noi</a></li>
                    <li><a href="#">Diventa nostro partner</a></li>
    
                </ul>
            </div>
            <div class="col-3">
                
                <ul>

                    <li><h6>Note legali</h6></li>
                    <li><a href="#">Termini e condizioni</a></li>
                    <li><a href="#">Informativa sulla privacy</a></li>
                    <li><a href="#">Cookies</a></li>
    
                </ul>
                
            </div>
            <div class="col-3">

                <ul>

                    <li><h6>Aiuto</h6></li>
                    <li><a href="#">Contatti</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Tipi di cucina</a></li>
                    <li><a href="#">Mappa del sito</a></li>
    
                </ul>
                
            </div>
            <div class="col-3">

                <ul>

                    <li><h6>Porta DeliveBoo con te</h6></li>
                    <li><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR9SCcWWyYL-qlyts-92R7oxQuJseBK3qeQzH4AUNNKW4qKadazLxDtjcAIZgQwfXB2ybw&usqp=CAU" alt=""></li>
                    <li><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5f/Google_Play_Store_badge_IT.svg/640px-Google_Play_Store_badge_IT.svg.png" alt=""></li>
                    
    
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
footer{
    position: absolute;
    left: 0;
    width: 100%;
}

</style>
<style>
body{
    margin-bottom:22rem;
}
.center-space{
    width:80%;
    margin: 0 auto;
}
html{
    font-size: 15px;
    width:100%;
}
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

</style>