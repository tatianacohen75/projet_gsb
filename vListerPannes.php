<img  src="images/GSBlogo.png" alt="logo gsb" align = left hspace ="0"/>

<fieldset>
    <legend><center> Pannes </center> </legend> 

<style>
  table{
    font-family: 'Open Sans Condensed', sans-serif;
  }

</style>

<body background="img/fondbleu1.jpg" style=" height: 900px; background-position: center; background-size: cover;">
<div class="bg-white rounded" style="margin-left:auto;margin-right:auto;width:900px; margin-top:50px; ">
<table class="table table-bordered ">
  <thead style="background-color: #66a3d3 !important;" >


<div align="right"><label>Vous cherchez une panne ?</p> Cliquer sur ici pour l'effectuer &nbsp;
            <a href="rechercherPannes.php"> <IMG src=images/rechercher.png alt="rechercher" width:"100" height:"10";> </a></div>

            <br>


    <tr>

      <th style="text-align: center" scope="col">id de la panne</th>
      <th style="text-align: center" scope="col">id du v&eacute;hicule</th>
      
<th style="text-align: center" scope="col">description de la panne</th>
              
    </tr>
  </thead>
  <tbody>
<?php
    $i = 0;
  
    while($i < count($p))
    {
    ?>
        <tr>
        <td style="text-align: center"><?php echo $p[$i]["idP"]?></td>
        <td style="text-align: center"><?php echo $p[$i]["idVehicule"]?></td>
       <td style="text-align: center"><?php echo $p[$i]["libPanne"]?></td>
        </tr>
    <?php
        $i = $i + 1;
     }
    ?> 
  </tbody>
</table>

  <!-- <td style="border-image-source: center"><?php echo '<img  src="$imag" />'?></td> -->