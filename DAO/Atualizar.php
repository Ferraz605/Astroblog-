<?php

namespace AstroBlog\DAO;
require_once('Conexao.php');

use mysqli;
use Exception;
use AstroBlog\DAO\Conexao;

class Atualizar
{
    function atualizarUsuario(Conexao $conexao,int $codigo,string $campo,string $dado)
    {
        try{
            $conn=$conexao->conectar();//abrir a conexao
            $sql="update AstroBlog set $campo = '$dado' where codigo='$codigo'";// comando do banco 
            $result= mysqli_query($conn,$sql);//serve para enviar e executar a instrução SQL no banco de dados MySQL.

            //comando para encerrar a conexao , usa-se depois que voce ja usou o mysqli_query  
            mysqli_close($conn);

            if($result)
            {
                 return"<br> <br> Usuário Atualizado com Sucesso!✔ ";
            }

             return"<br> <br> Falha ao Atualizar!✖";
        }
        catch(Exception $erro)
        {
            echo $erro;
        }
    }// fim do atualizarUsuário
####################################################################################
function atualizarLocalEspecifico(Conexao $conexao,int $codigo,string $campo,string $dado)
 { 
    try
    {
        $conn=$conexao->conectar();
        $sql="update AstroBlog set $campo = '$dado' where codigo='$codigo'";
        $result= mysqli_query($conn,$sql);

        mysqli_close($conn);

        if($result)
        {
           return"<br> <br> Local Atualizado com Sucesso!✔ ";
        }
         return"<br> <br> Falha ao Atualizar!✖";
    }
    catch(Exception $erro)
    { 
         echo $erro;  
    }
       
 }// Fim do AtualizarLocal 

 public function atualizarLocal(Conexao $conexao, int $idLocal, String $nomeLocal, String $cidade, String $estado, String $pais, String $descricao){
   try
    {
        $conn=$conexao->conectar();
        $sql = "update LocalObservacao set
                        nomeLocal = '$nomeLocal',
                        cidade = '$cidade',
                        estado = '$estado',
                        pais = '$pais',
                        descricao = '$descricao'
                        where idLocal = '$idLocal'";
         
       $resultado= mysqli_query($conn,$sql);

        mysqli_close($conn);

      if (!$resultado) {
        echo "<br><br> Falha ao atualizar! ✖ Erro: " . mysqli_error($conn);
    }

    return $resultado;
    }
    catch(Exception $erro)
    { 
         echo $erro;  
    }
       
 }
####################################################################################

 public function atualizarEquipamento(Conexao $conexao, int $idEquipamento,string $nomeEquipamento, string $tipo, string $marca, string $modelo){
   try
    {
        $conn=$conexao->conectar();
        $sql = "update Equipamento set
                        nomeEquipamento = '$nomeEquipamento',
                        tipo = '$tipo',
                        marca = '$marca',
                        modelo = '$modelo'
                        where idEquipamento = '$idEquipamento'";
         
       $resultado= mysqli_query($conn,$sql);

        mysqli_close($conn);

      if (!$resultado) {
        echo "<br><br> Falha ao atualizar! ✖ Erro: " . mysqli_error($conn);
    }

    return $resultado;
    }
    catch(Exception $erro)
    { 
         echo $erro;  
    }
       
 }
##########

 
####################################################################################
 function atualizarEvento(Conexao $conexao,int $codigo,string $campo,string $dado)
 {
     try
     {
        $conn=$conexao->conectar();
        $sql="update AstroBlog set $campo = '$dado' where codigo='$codigo'";
        $result= mysqli_query($conn,$sql);

         mysqli_close($conn);

         if($result)
          {
            return"<br> <br> Evento Atualizado com Sucesso!✔ ";
          }
           return"<br> <br> Falha ao Atualizar!✖";  
     }
     catch(Exception $erro)
     {
        echo $erro;
     }
 }// fim do AtualizarEvento 
 ##################################################################################
 function atualizarObservacao(Conexao $conexao,int $codigo,string $campo,string $dado)
 {
    try
    {  
        $conn=$conexao->conectar();
        $sql="update AstroBlog set $campo = '$dado' where codigo='$codigo'";
        $result= mysqli_query($conn,$sql);

         mysqli_close($conn);

         if($result)
         {
           return"<br> <br> Observação Atualizada com Sucesso!✔ ";          
         }
         return"<br> <br> Falha ao Atualizar!✖";  
    }
    catch(Exception $erro)
    {
       echo $erro;   
    }
 }// fim do AtualizarObservação

} // fim da classe atualizar 

?>

