<img  src="images/GSBlogo.png" alt="logo gsb" align = left hspace ="0"/>

  <fieldset>
    <legend> <center> Visiteurs </center> </legend> 
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
      <th style="text-align: center" scope="col">matricule</th>
      <th style="text-align: center" scope="col">nom</th>
      <th style="text-align: center" scope="col">pr&#233;nom</th>
      <th style="text-align: center" scope="col">adresse</th>
      <th style="text-align: center" scope="col">ville</th>
    </tr>
  </thead>
  <tbody>
<?php
    $i = 0;
    while($i < count($vis))
    {
    ?>
        <tr>
        <td style="text-align: center"><?php echo $vis[$i]["mat"]?></td>
        <td style="text-align: center"><?php echo $vis[$i]["nom"]?></td>
        <td style="text-align: center"><?php echo $vis[$i]["pren"]?></td>
        <td style="text-align: center"><?php echo $vis[$i]["adresse"]?></td>
        <td style="text-align: center"><?php echo $vis[$i]["ville"]?></td>
        
        </tr>
    <?php
        $i = $i + 1;
     }
    ?> 
  </tbody>
</table>

  <!-- <td style="border-image-source: center"><?php echo '<img  src="$imag" />'?></td> -->