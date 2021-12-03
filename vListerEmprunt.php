
<img  src="images/GSBlogo.png" alt="logo gsb" align = left hspace ="0"/>

<fieldset>
    <legend><center> Liste des emprunts  </center> </legend> 

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
      <th style="text-align: center" scope="col">R&#233;f&#233;rence du visiteur</th>
      <th style="text-align: center" scope="col">R&#233;f&#233;rence du vehicule</th>
      <th style="text-align: center" scope="col">Justificatif d'emprunt</th>
      <th style="text-align: center" scope="col">Date d'attribution</th>
      <th style="text-align: center" scope="col">Date de restitution</th>
      
    </tr>
  </thead>
  <tbody>
<?php
    $i = 0;
    while($i < count($vis))
    {
    ?>
        <tr>
        <td style="text-align: center"><?php echo $vis[$i]["refVis"]?></td>
        <td style="text-align: center"><?php echo $vis[$i]["refVeh"]?></td>
        <td style="text-align: center"><?php echo $vis[$i]["justificatif"]?></td>
        <td style="text-align: center"><?php echo $vis[$i]["dateAttrib"]?></td>
        <td style="text-align: center"><?php echo $vis[$i]["dateRes"]?></td>
        </tr>
    <?php
        $i = $i + 1;
     }
    ?> 
  </tbody>
</table>

  <!-- <td style="border-image-source: center"><?php echo '<img  src="$imag" />'?></td> -->