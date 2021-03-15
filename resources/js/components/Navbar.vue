<template>

<div>
    <nav>
        <div class="container-fluid center-space">
            <div class="row">
                <div class="col">
                    <ul>
                            <li>
                                <a href="/">
                                    <img src="deliveboo_img/logo.png" width="150px" style="margin-top:5px;">
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
       
    }
}
</script>

<style lang="scss" scoped>

nav{
    position: relative;
    background-color: #00ccbc;
    height: 8rem;
    width: 100%;
    
    
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
            input[type="text" i] {
                padding-left:5px ;
                margin-left: 3rem;
                border-radius: 0.3rem;
                border: 2px solid white;
                box-shadow:2px 3px rgba(0, 0, 0, 0.226);

                
            }
            .nav-item{
                a{
                    
                    margin: 0 0.5rem;
                    padding: 0.6rem 1.5rem;
                    border-radius: 0.5rem;
                    background: white;
                    color:  rgb(6, 121, 121);
                    box-shadow:2px 3px rgba(0, 0, 0, 0.226);
                    text-align: center;
                }
                a:hover{
                    background-color: rgb(231, 231, 231);
                    text-decoration: none;
                    color: rgb(6, 121, 121);
                }
            }
        }
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
    top: 4.5rem;
    height: 12rem;
    width: 10rem;
    background-color: white;
    z-index: 10;
    display: none;
    border-radius: 10px;

}

@media screen and (max-width:768px){
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
                margin: 0 5px;
                .nav-link{
                    margin: 0 0.5rem;
                    padding: 0.6rem 1.2rem;
                    border-radius: 0.5rem;
                    background: white;
                    color: rgb(6, 121, 121) ;
                    border: 1px solid rgb(224, 224, 224);
                    transition: all 0.5s;    
                    a{
                        text-align: center;
                    }            
                }
                .nav-link:hover{
                    background-color:rgb(221, 221, 221) ;
                    text-decoration: none;
                    color: rgb(6, 121, 121);
                    box-shadow:2px 3px rgba(0, 0, 0, 0.226);
                    transition: all 0.5s;
                }
            }
    .cart-button{
        svg{
            margin: 0 auto;
        }
    }
    
    
}
.dropdown-item{

}




</style>