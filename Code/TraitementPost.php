<?php
if($_FILES['fichier']['error'] == 0 && $_POST['ameliorer']=="Publiez ce que vous voulez" ){
echo"qu'une photo";
$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
//1. strrchr renvoie l'extension avec le point (« . »).
//2. substr(chaine,1) ignore le premier caractère de chaine.
//3. strtolower met l'extension en minuscules.
$extension_upload = strtolower(  substr(  strrchr($_FILES['fichier']['name'], '.')  ,1)  );
if ( in_array($extension_upload,$extensions_valides) ) echo "Extension correcte";
$nom = $_FILES['fichier']['name'];}
if($_FILES['fichier']['error']>0 && $_POST['ameliorer']!="Publiez ce que vous voulez"  ){
    echo "vous avec mis du texte mais pas de photo";
}
if($_FILES['fichier']['error']==0 && $_POST['ameliorer']!="Publiez ce que vous voulez"  ){
    echo "texte et photo";
}
if($_FILES['fichier']['error']>0 && $_POST['ameliorer']=="Publiez ce que vous voulez"  ){
    echo "t'as rien mis trouduc";
}
?>
