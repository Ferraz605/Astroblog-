<?php 
    namespace AstroBlog\DAO;

use Exception;
use mysqli;

    class Conexao{
        function conectar(){
            try{ // ACESSAR O BANCO DE DADOS
                $conn=mysqli_connect('localhost','root','','AstroBlog');
                
                // VALIDACAO
                if($conn){
                    return $conn;
                }

                echo "algo deu errado!";
            } catch(Exception $error){
                echo "Algo deu errado <br><br> $error";
            }


        } // FIM DO CONECTAR
    } // FIM DA CLASSE

?>