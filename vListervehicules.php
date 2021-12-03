
<img  src="images/GSBlogo.png" alt="logo gsb" align = left hspace ="0"/>

<fieldset>
    <legend><center>V&eacute;hicules </center> </legend> 

<style>
  table{
    font-family: 'Open Sans Condensed', sans-serif;
  }

</style>

<body background="img/fondbleu1.jpg" style=" height: 900px; background-position: center; background-size: cover;">
<div class="bg-white rounded" style="margin-left:auto;margin-right:auto;width:900px; margin-top:50px; ">
<table class="table table-bordered ">
  <thead style="background-color: #66a3d3 !important;" >
    <tr>
      <th style="text-align: center" scope="col">id</th>
      <th style="text-align: center" scope="col">marque</th>
      <th style="text-align: center" scope="col">mod&egrave;le</th>
      <th style="text-align: center" scope="col">couleur</th>
      <th style="text-align: center" scope="col">km</th>
<th style="text-align: center" scope="col">type d'essence</th>
<th style="text-align: center" scope="col">plein</th>
<th style="text-align: center" scope="col">defauts</th>



 <th style="text-align: center" scope="col">image</th>
        
        
    </tr>
  </thead>
  <tbody>
<?php
    $i = 0;
    while($i < count($veh))
    {
    ?>
        <tr>

        <td style="text-align: center"><?php echo $veh[$i]["id"]?></td>
        <td style="text-align: center"><?php echo $veh[$i]["marq"]?></td>
        <td style="text-align: center"><?php echo $veh[$i]["mod"]?></td>
        <td style="text-align: center"><?php echo $veh[$i]["coul"]?></td>
        <td style="text-align: center"><?php echo $veh[$i]["km"]?></td>
        <td style="text-align: center"><?php echo $veh[$i]["typeessence"]?></td>
        <td style="text-align: center"><?php echo $veh[$i]["plein"]?></td>
        <td style="text-align: center"><?php echo $veh[$i]["defauts"]?></td>
        <td align="center" style="width: 200px; height: 180px"> <br> <br><img class="img-polaroid" src="./images/<?php echo $veh[$i]["image"]?>" /></td>
        </tr>
    <?php
        $i = $i + 1;
     }
    ?> 
  </tbody>
</table>

  <!-- <td style="border-image-source: center"><?php echo '<img  src="$imag" />'?></td> -->