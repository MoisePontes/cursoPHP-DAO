<?php

/**
 * Description of Usuario
 *
 * @author Moises Pontes
 */
class Usuario{

    private $id_usuario;
    private $deslogin;
    private $dessenha;
    private $dtcadastro;

    function getId_usuario(){
        return $this->id_usuario;
    }

    function getDeslogin(){
        return $this->deslogin;
    }

    function getDessenha(){
        return $this->dessenha;
    }

    function getDtcadastro(){
        return $this->dtcadastro;
    }

    function setId_usuario($id_usuario){
        $this->id_usuario = $id_usuario;
    }

    function setDeslogin($deslogin){
        $this->deslogin = $deslogin;
    }

    function setDessenha($dessenha){
        $this->dessenha = $dessenha;
    }

    function setDtcadastro($dtcadastro){
        $this->dtcadastro = $dtcadastro;
    }

    public function loadById($id){

        $sql = new Sql();
        $results = $sql->select("SELECT * FROM tb_usuarios WHERE id_usuario = :id", array(':id' => $id));
        if(count($results) > 0){
            $row = $results[0];
            $this->setId_usuario($row['id_usuario']);
            $this->setDeslogin($row['deslogin']);
            $this->setDessenha($row['dessenha']);
            $this->setDtcadastro(new \DateTime($row['dtcadastro']));
        }
    }

    public function getList($Quary){
        $sql = new Sql();
        return $sql->select($Quary);
    }

    public static function search($Login){
        $sql = new Sql();
        return $sql->select("SELECT * FROM tb_usuarios LIKE :SEARCH ORDER BY deslogin", array(':SEARCH' => '%' . $Login . '%'));
    }

    public function login($Login,$senha){
        $sql = new Sql();
        $results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :login AND dessenha = :password", array(":login" => $Login, ":password" => $senha));
        if(count($results) > 0){
            $row = $results[0];
            $this->setId_usuario($row['id_usuario']);
            $this->setDeslogin($row['deslogin']);
            $this->setDessenha($row['dessenha']);
            $this->setDtcadastro(new \DateTime($row['dtcadastro']));
        }
        else{
            throw new Exception('Login e/ou Senha Inválidos');
        }
    }

    public function __toString(){
        return json_encode(array(
            'Id User' => $this->getId_usuario(),
            'Login' => $this->getDeslogin(),
            'Senha' => $this->getDessenha(),
            'Cadastro' => $this->getDtcadastro()->format('d/m/Y')
        ));
    }

}
