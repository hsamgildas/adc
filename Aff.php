<?php
        session_start();
        require_once('Securite.php');
        include 'get_droit.php';
       
?>
   <style>
      .table{
    text-align: center;
    align-items: center;
    width: 99vw;
    margin-left: 0.1%;
    background-color: #fff;
    box-shadow: #fff;
    border: none;
    height: 99vh;
    margin: auto;
    font-size: 1.2em;
    overflow-y: auto;
}
table{
    text-align: center;
    align-items: center; 
    margin: auto; 
    margin-top:8em;
    line-height:3em;
     
}
.table th,.table td{
    border-bottom:1px solid #eee;
    text-align: justify;
    align-items: center;
    font-size: 0.8em;
    font-weight: 900;
    border-right: 1px solid #eee;
    font-family:"Open Sans",Verdana, Geneva, sans-serif;
    
}
.table th{
      background:#eb3007;
}
button{
      background:#eb3007;
      line-height:2em;
}
a{
      text-decoration:none;
      color:#fff;
      font-size:1.5em;
      font-family:Arial,sans-serif;
      font-weight:700;
}
   </style>
   <div class="table">
         <table>
               <thead><tr id="th"><th>Telephone</th><th>Nom et Prenom</th><th>E-mail</th><th>Action</th></tr></thead>
               <tbody>
                  <?php
                  $req="SELECT * FROM  tauhenifiaion au INNER JOIN logine lo ON lo.idlo=au.idlo";
                  $ps=$pdo->prepare($req);
                  $ps->execute();
                  foreach ($ps as $key => $value) {?>
                  <tr><td><?php echo $value['telephone']; ?></td>
                  <td><?php echo $value['nom_prenom']; ?></td>
                  <td><?php echo $value['email']; ?></td>
                  <td>
                  <?php if(in_array('1-2-0',$d)){ ?>
                  <button><a class="btn btn-danger"onclick="return confirm('Etes- vous sure de supprimer cet utilisateur?')"href="profil.php?ma=<?php echo ($value['userlo']) ?>"style="font-size:10px">Supprimer</a></button>
                  <button><a class="btn btn-success" href="droits/droits.php?p=<?php echo ($value['userlo']) ?>"style="font-size:10px">+droit</a></td></button>
                  <?php }?>
                  </tr>
                  <?php } ?>
               </tbody>
         </table>
   </div>