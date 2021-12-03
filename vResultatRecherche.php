<img  src="images/GSBlogo.png" alt="logo gsb" align = left hspace ="0"/>


<!-- Affichage des informations sur les visiteurs-->

<div class="container">

    <table class="table table-bordered table-striped table-condensed">
      <caption>
<?php
    if (isset($mat))
    {
?>
        <h3><?php echo $mat;?></h3>
<?php    
    }
?>
      </caption>
      <thead>
        <tr>
          <th>matricule</th>
          <th>nom</th>
          <th>prenom</th>
          
<?php
    
        $i = 0;
   
    { 
 ?>     
        <tr>
            <td align="right"><?php echo $vis[$i]["mat"]?></td>
            <td align="right"><?php echo $vis[$i]["nom"]?></td>
            <td align="right"><?php echo $vis[$i]["pren"]?></td>
         
<?php
 }
?>
       </tbody>       
     </table>    
  </div>

 
