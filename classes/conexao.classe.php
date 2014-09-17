<?php
/*************************************************
 Classe de conexуo com banco de dados
@author    Tiago Mendes de Souza
@mail    tiago.mendes.souza@gmail.com
@date    02/01/2007
*************************************************/

class database {

    private $host = "localhost";
    private $user= "root";
    private $pass = "";
    private $db = "OO";
    private $message_error = "Essa poha fudeo!";

    private $dbc;
    private $dbs;

    /*
     Metodos que trazem o conteudo da variavel desejada
     @return   $xxx = conteudo da variavel solicitada
     */
    protected function getHost(){return $this->host;}
    protected function getUser(){return $this->user;}
    protected function getPass(){return $this->pass;}
    protected function getDB(){  return $this->db;}
    protected function getMsg(){ return $this->message_error;}

    /*
     Metodo construtor do banco de dados
     */
    public function database(){
    }

    /*
     Metodo que cria a conexao com o banco de dados configurado
     @return   $dbc = contem a conexao com o banco
     @version   1.0
     */
    public function connectionDB(){
        // conecta ao bando de dados e guarda a conexуo
        $this->dbc = mysql_connect($this->getHost(),$this->getUser(),$this->getPass());
         
        //seleciona a base para ser usada
        $dbs = mysql_select_db($this->db,$this->dbc);
         
        return ($dbs);
    }

    /*
     Retorna o id da ultima query executada
     @return   $id_insert = id da ultima inserчуo
     @version   1.0
     */
    public function retornaID(){
        $id_insert = mysql_insert_id();
        return ($id_insert);
    }



    /*
     Metodo que fecha a conexao com o bando de dados
     @version   1.0
     */
    public function closeDB(){
        mysql_close($this->dbc);
    }
}
?>