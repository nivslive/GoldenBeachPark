
<style>
#carregando {
                              display:flex;
                              align-items:center;
                              justify-content:center;
                             background: url("https://tenor.com/view/loading-gif-gif-24125199") center no-repeat;
                             position: absolute;
                          
                             height: 100%;
                             width: 100%;
                             animation: animationcarregando 5s ease-in-out infinite; 
                          }
                          
                          @keyframes animationcarregando{
                              0%, 100% {
                                  background-color:#68e5ff;
                              }
                          
                              50% {
                                  background-color:#0095f7;
                              }
                          }
                          
                          *, *::before, *::after {
                            margin: 0;
                            padding: 0;
                            box-sizing: border-box;
                          }
                          
                          
                          
                          .box-carregando {
                            width: 300px;
                            height: 300px;
                          
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            
                           
                          }
                          
                          .container-carregando {
                            height: 15px;
                            width: 105px;
                            display: flex;
                            position: relative;
                          }
                          .container-carregando .circle-carregando {
                            width: 15px;
                            height: 15px;
                            border-radius: 50%;
                            background-color: #fff;
                            animation: move 500ms linear 0ms infinite;
                            margin-right: 30px;
                          }
                          .container-carregando .circle-carregando:first-child {
                            position: absolute;
                            top: 0;
                            left: 0;
                            animation: grow 500ms linear 0ms infinite;
                          }
                          .container-carregando .circle-carregando:last-child {
                            position: absolute;
                            top: 0;
                            right: 0;
                            margin-right: 0;
                            animation: grow 500ms linear 0s infinite reverse;
                          }
                          
                          @keyframes grow {
                            from {
                              transform: scale(0, 0);
                              opacity: 0;
                            }
                            to {
                              transform: scale(1, 1);
                              opacity: 1;
                            }
                          }
                          @keyframes move {
                            from {
                              transform: translateX(0px);
                            }
                            to {
                              transform: translateX(45px);
                            }
                          }

</style>

<section id="carregando"> 

<div class="box-carregando">
  <div class="container-carregando">
    <span class="circle-carregando"></span>
    <span class="circle-carregando"></span>
    <span class="circle-carregando"></span>
    <span class="circle-carregando"></span>
  </div>
</div>

</section>