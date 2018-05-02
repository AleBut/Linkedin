<?php
if($_FILES['fichier']['error'] == 0 && $_POST['ameliorer']=="Publiez ce que vous voulez" ){
    $img=$_FILES['fichier']['name'];
    echo '<div><img src='.$img.' alt="" height="200" width"220"/></div>';
$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
//1. strrchr renvoie l'extension avec le point (« . »).
//2. substr(chaine,1) ignore le premier caractère de chaine.
//3. strtolower met l'extension en minuscules.
$extension_upload = strtolower(  substr(  strrchr($_FILES['fichier']['name'], '.')  ,1)  );
if ( in_array($extension_upload,$extensions_valides) ) echo "Extension correcte";
$nom = $_FILES['fichier']['name'];}
if($_FILES['fichier']['error']>0 && $_POST['ameliorer']!="Publiez ce que vous voulez"  ){
    echo '<div style="width : 400px;"><p style="text-align : center;">'.$_POST['ameliorer'].'</p></div>';
}
if($_FILES['fichier']['error']==0 && $_POST['ameliorer']!="Publiez ce que vous voulez"  ){
    echo '<div style="width : 400px;"><p style="text-align : center;">'.$_POST['ameliorer'].'</p><img src='.$_FILES['fichier']['name'].' alt="" height="200" width"220"/></div>';
}
if($_FILES['fichier']['error']>0 && $_POST['ameliorer']=="Publiez ce que vous voulez"  ){
    echo "t'as rien mis trouduc";
}
?>
