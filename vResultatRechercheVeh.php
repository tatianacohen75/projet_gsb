<img  src="images/GSBlogo.png" alt="logo gsb" align = left hspace ="0"/>

<!-- Affichage des informations sur les vehicules-->

<div class="container">

    <table class="table table-bordered table-striped table-condensed">
      <caption>
<?php
    if (isset($id))
    {
?>
        <h3><?php echo $id;?></h3>
<?php    
    }
?>
      </caption>
      <thead>
        <tr>
          <th>id</th>
          <th>marque</th>
          <th>modele</th>
           <?php
    
        $i = 0;
   
    { 
 ?>     
        <tr>
            <td align="right"><?php echo $veh[$i]["id"]?></td>
            <td align="right"><?php echo $veh[$i]["marq"]?></td>
            <td align="right"><?php echo $veh[$i]["mod"]?></td>
         
<?php
 }
?>
     </tbody> 

     </table>    
  </div>

 
