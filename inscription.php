<style>
   form{
    align-items: center;
    font-size: 1.5em;
    line-height: 1.5em;
    color: #555;
    text-decoration: none;
    text-align: center;
    font-weight: 700;
    transition: all 0.3s ease-in;
    padding: 1em;
}
form{
    align-items: center; 
    /* margin-left:7%; */
}
form input,form textarea{
    width: 96%;
    padding: 1em;
    padding: 0.3em;
    line-height: 5em;
    margin-top: 1em;
    border-radius: 5px;
   
}
</style>
 <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
    <input type="tetx" placeholder="entrez le code  de confirmation pour faire les commentaires en bas">
    <input type="text" name="no" id="no" placeholder="saisissez votre nom et prenom" autocomplete="off">
    <textarea name="ms" id=" message" placeholder="entrez votre commentaire de 300 mots" rows="5" max-lenght="10" autocomplete="off"></textarea>
    <input type="button" value="Envoyer" style="margin-top:2%;padding:0.8em;background:brown;color:#fff">
</form>