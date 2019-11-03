<?php

require_once ('config.php');

//$sql = new Sql();
//$usuarios = $sql->select('SELECT * FROM tb_usuarios');
//echo json_encode($usuarios);
//$select = new Usuario();
//$select->loadById('14');
//echo $select;
//$sql =  new Usuario();
//$list = $sql->getList("SELECT * FROM tb_usuarios ORDER BY deslogin;");
//
//var_dump($list[0]);
//foreach($list as $value){
//    extract($value);
//    
//    echo 'Id: '.$id_usuario .'<br>';
//    echo 'Login: '.$deslogin .'<br>';
//    echo 'Senha: '.$dessenha .'<br>';
//    echo 'Data Cad: '.$dtcadastro.'<br>';
//}

//$login =  new Usuario();
//$login->login("Moise", "001001");
//echo $login;

//$insert = new Usuario('Tata', '432');
////$insert->setDeslogin('Lucas');
////$insert->setDessenha('#321@');
//$insert->insert();
//
//echo $insert;

//$user = new Usuario();
//$user->loadById(21);
//$user->update("Mara", "484");
//echo $user;

$user = new Usuario();
$user->loadById(14);
$user->delete();