    <template>

<div>
    <nav>
        <div class="container-fluid center-space">
            <div class="row">
                <div class="col">
                    <ul class="">
                            <li>
                                <a class="logo" href="/">
                                    <img src="/deliveboo_img/logo-white.png" width="150px" style="margin-top:5px;">
                                </a>
                            </li>
                            <li>
                                <slot></slot>
                            </li>
                    </ul>
                            
                </div>
            </div>
        </div>
    </nav>
    
    
    
</div>
</template>

<script>

export default {
    components:{
        
    },
    methods:{
        
    }
}
</script>

<style lang="scss" scoped>


nav{
    position: relative;
    background-color: white;
    height: 6rem;
    width: 100%;
    border-bottom: 1px solid lightgray;
    
    
    ul{
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        li{
            list-style: none;
            select{
                border-radius: 5px;
                padding: 0.2rem;
            }
            .logo{

                svg{
                    width: 8rem;
                    height: 4rem;
                    color: #00ccbc;
                }
            }
            input[type="text" i] {
                padding-left:5px ;
                margin-left: 3rem;
                border-radius: 0.3rem;
                border: 2px solid white;
                box-shadow:2px 3px rgba(0, 0, 0, 0.226);

                
            }
            .nav-item{
                margin: 0 5px;
                .nav-link{
                    margin: 0 0.5rem;
                    padding: 0.6rem 1.2rem;
                    border-radius: 0.5rem;
                    background: rgb(6, 121, 121);
                    color: white ;
                    border: 1px solid rgb(224, 224, 224);
                    transition: all 0.5s;                
                }
                .nav-link:hover{
                    background-color: rgba(6, 121, 121, 0.692);
                    text-decoration: none;
                    color: rgb(255, 255, 255);
                    box-shadow:2px 3px rgba(0, 0, 0, 0.226);
                    transition: all 0.5s;
                }
            }
        }
    }
    .dropdown-item{
        width: 90%;
        margin: 0 0.5rem;    
        color: rgb(168, 41, 9);
        
    }
}
.hamburger-menu{
    display: none;
    position: relative;
    
}
.navbar_visible{
    display: flex;
    flex-direction: row;
}
.dropdown-burger{
    position:absolute;
    top: 4rem;
    height: 15rem;
    width: 10rem;
    background-color: white;
    z-index: 10;
    display: none;
    border-radius: 10px;

}

@media screen and (max-width:992px){
    .hamburger-menu{
        display: inline-block;
    }
    .navbar_visible{
        display: none;
    }
    .active{
        display: block;
    }
    .nav-item{
        margin-bottom: 30px;
        .nav-link{
            width:80%;
            height: 30%;
            text-align: center;
        }
    }
    .cart-button{
        svg{
            margin: 0 auto;
        }
    }
    
    
}


</style>