<template>

<div>
    <nav>
        <div class="container-fluid center-space">
            <div class="row">
                <div class="col">
                    <ul>
                            <li>
                                <img src="deliveboo_img/logo.png" width="150px" style="margin-top:5px;">
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
            svg{
                width: 8rem;
                height: 4rem;
            }
            input[type="text" i] {
                padding-left:5px ;
                margin-left: 3rem;
                border-radius: 0.3rem;
                border: 2px solid white;
                box-shadow:2px 3px rgba(0, 0, 0, 0.226);

                
            }
            .links{
                a{
                    margin: 0 0.5rem;
                    padding: 0.6rem 1.5rem;
                    border-radius: 0.5rem;
                    background: white;
                    color:  rgb(6, 121, 121);
                    box-shadow:2px 3px rgba(0, 0, 0, 0.226);
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


</style>