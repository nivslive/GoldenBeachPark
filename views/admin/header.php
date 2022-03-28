<style>
    .modify_mobile {
        position: absolute;
    border: 0;
    background-color: cyan !important;
    }

    .modify_mobile:hover {
        background-color: white;
    }

    .modify_mobile img {
        width: 2rem;
    }
    .brand-logo img {
        width: 8rem;
    }
ul .left {
    display:flex;
    align-items:center;
    justify-content:space-between
}


.menu {
  align-items: center;
  background-color: #303235;
  clip-path: polygon(81.05% 9.1%, 92% 9.1%, 92% 10.1%, 81.05% 10.1%);
  color: #f2f2f2;
  display: flex;
  flex-direction: column;
  font-family: sans-serif;
  font-size: 28px;
  height: 100%;
  position: absolute;
  top: 0;
  transition: clip-path 400ms cubic-bezier(0.4, 0, 0.2, 1),
    background-color 400ms cubic-bezier(0.4, 0, 0.2, 1);
  width: 100%;
}
.active .menu {
  background-color: #e07a8d;
  clip-path: polygon(101% -1%, 101% 101%, -1% 101%, -1% -1%);
}
</style>



<!-- START HEADER -->
<header id="header" class="page-topbar">
    <!-- start header nav-->
    <div class="navbar-fixed">
        <nav class="navbar-color">
            <div class="nav-wrapper topbar-color-admin">

                <ul class="left">                      
                    <li>
                        <h1 class="logo-wrapper">
                            <a href="dashboard" class="brand-logo">
                                <img src="public/site/img/logo.png" alt="materialize logo">
                            </a> 
                     
    
                        </h1>
                    </li>


<li>
                    <button class="modify_mobile" onclick="mobile()"><img src="public/admin/icons/hamburguer.svg"></button> </li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- end header nav-->
</header>
<!-- END HEADER -->