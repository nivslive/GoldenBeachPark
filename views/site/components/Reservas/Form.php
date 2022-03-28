<div class="row" style="color:white;">
    <span id="creativewritting" class="name-title-tarifas"> Golden Beach Hotel</span>
</div>

<div class="row text-white">


    <div class="input-group input-group-icon col s12 m4 l4">


        <div class="row">









            <div class="col s8">


                <input type="date" class="input-inner white-text" placeholder="Calendario antes" />
                <div class="input-icon"></div>


            </div>



            <div class="col s3 form-item-tarifas" style="height:3rem; display: flex; align-items: center; justify-content:center;">

<i class="far fa-calendar-alt indigo-text darken-4"></i>

            </div>


        </div>




    </div>

  







    <div class="input-group input-group-icon col s12 m4 l4">


<div class="row">









    <div class="col s8">


        <input type="date" class="white-text" placeholder="Calendario depois" />
        <div class="input-icon"></div>


    </div>



    <div class="col s3 orange form-item-tarifas" style="height:3rem; display: flex; align-items: center; justify-content:center;">


<i class="fas fa-calendar-alt indigo-text darken-4"></i>

    </div>


</div>




</div>

























<div class="input-group input-group-icon col s12 m4 l4">


<div class="row">









    <div class="col s8">


    <select type="text" class="input-inner" placeholder="Full Name" >
                <option>1 Noite</option>
                <?php 
                $number = 2;
                do{
            
              echo       "<option>$number Noites</option>";

              $number++;

            } while($number <= 9); ?>
        </select>

        <div class="input-icon"></div>


    </div>



    <div class="col s3 orange form-item-tarifas" style="height:3rem; display: flex; align-items: center; justify-content:center;">

<i class="fas fa-moon indigo-text darken-4"></i>

    </div>


</div>




</div>

















    
</div>


<div class="row">
<div class="input-group input-group-icon col s12 m4 l4">


<div class="row">









    <div class="col s8">


    <select type="text" class="input-inner" placeholder="Full Name" >
                <option>1 Apartamento</option>
                <?php 
                $number = 2;
                do{
            
              echo       "<option>$number Apartamentos</option>";

              $number++;

            } while($number <= 4); ?>
        </select>



    </div>



    <div class="col s3 orange form-item-tarifas" style="height:3rem; display: flex; align-items: center; justify-content:center;">

<i class="fas fa-bed indigo-text darken-4"></i>

    </div>


</div>




</div>


  












<div class="input-group input-group-icon col s12 m4 l4">


<div class="row">









    <div class="col s8">


    <select type="text" class="input-inner" placeholder="Full Name" >
                <option>1 Adulto</option>
                <?php 
                $number = 2;
                do{
            
              echo       "<option>$number adultos</option>";

              $number++;

            } while($number <= 99); ?>
        </select>


    </div>



    <div class="col s3 orange form-item-tarifas" style="height:3rem; display: flex; align-items: center; justify-content:center;">


<i class="fas fa-user indigo-text darken-4"></i>

    </div>


</div>



</div>
















<div class="input-group input-group-icon col s12 m4 l4">


<div class="row">









    <div class="col s8">
    <select type="text" class="input-inner" placeholder="Full Name" >
                <option>1 Criança</option>
                <?php 
                $number = 2;
                do{
            
              echo       "<option>$number Crianças</option>";

              $number++;

            } while($number <= 99); ?>
        </select>

        <div class="input-icon"></div>


    </div>



    <div class="col s3 orange form-item-tarifas" style="height:3rem; display: flex; align-items: center; justify-content:center;">

<i class="fas fa-child indigo-text darken-4"></i>

    </div>


</div>




</div>












</div>



<div class="row">
    <div class="input-field col  s12 m4 l4 white-text font-weight">
    
        Tem um código?
    </div>

    









    <div class="input-group input-group-icon col s12 m4 l4">


<div class="row">









    <div class="col s11">

    <select name="select" placeholder="" style="border-radius:40px;">
  <option value="valor1">Sim</option>
  <option value="valor2" selected>Não</option>
</select>
        <div class="input-icon"></div>


    </div>



  

</div>




</div>






















    <div class="input-group input-group-icon col s12 m4 l4">


<div class="row">









    <div class="col s11">


       
    <input type="text" placeholder="Digite o codigo aqui" />
        <div class="input-icon"></div>


    </div>



  

</div>




</div>





<div class="input-group input-group-icon col s12 m4 l4">


<div class="row">









    <div class="col s11" style="display:flex;justify-content:right;">


       
    <input type="submit" class="btn orange" placeholder="Digite o codigo aqui" />
        <div class="input-icon"></div>


    </div>



  

</div>




</div>







</div>


