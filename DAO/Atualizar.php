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
function atualizarEvento(Conexao $conexao, int $idEventoAstronomico, string $nomeEvento, string $categoria, string $dataEvento, string $descricao)
 {
   try
    {
        $conn=$conexao->conectar();
        $sql = "update EventoAstronomico set
                        nomeEvento = '$nomeEvento',
                        categoria = '$categoria',
                        dataEvento = '$dataEvento',
                        descricao = '$descricao'
                        where idEventoAstronomico = '$idEventoAstronomico'";
         
       $resultado= mysqli_query($conn,$sql);

      if (!$resultado) {
        echo "<br><br> Falha ao atualizar! ✖ Erro: " . mysqli_error($conn);
    }

    mysqli_close($conn);

    return $resultado;
    }
    catch(Exception $erro)
    { 
         echo $erro;  
    }
 }// fim do atualizarEvento
 ##################################################################################
 function atualizarObservacao(Conexao $conexao,int $idObservercao, string $titulo, string $categoria, string $objetoObservado, string $dataObservacao, string $condicaoClimatica, string $descricao, int $contarObservacao, int $EventoAstronomicoId, int $EquipamentoId, int $UsuarioId, int $localId)
 {
  try
    {
        $conn=$conexao->conectar();
        $sql = "update Observacao set
                        titulo = '$titulo',
                        categoria = '$categoria',
                        objetoObservado = '$objetoObservado',
                        dataObservacao = '$dataObservacao',
                        condicaoClimatica = '$condicaoClimatica',
                        descricao = '$descricao',
                        EventoAstronomicoId = '$EventoAstronomicoId',
                        EquipamentoId = '$EquipamentoId',
                        LocalId = '$localId'
                        where idObservercao = '$idObservercao'";
         
       $resultado= mysqli_query($conn,$sql);

      if (!$resultado) {
        echo "<br><br> Falha ao atualizar! ✖ Erro: " . mysqli_error($conn);
    }

    mysqli_close($conn);

    return $resultado;
    }
    catch(Exception $erro)
    { 
         echo $erro;  
    }
 }// fim do AtualizarObservação

 function AlterarTipoUsuario(string $tipo){
  if($tipo == 'admin'){
    $tipo = 'usuario';
  } else {
    $tipo = 'admin';
  }
 }

public function alternarCurtida(Conexao $conexao, int $usuarioId, int $observacaoId){
    $conn = $conexao->conectar();

    $sqlChecar = "SELECT idCurtida FROM Curtida WHERE UsuarioId = '$usuarioId' AND ObservacaoId = '$observacaoId'";
    $resultadoChecar = mysqli_query($conn, $sqlChecar);
    $jaCurtiu = mysqli_fetch_assoc($resultadoChecar);

    if($jaCurtiu){
        $sql = "DELETE FROM Curtida WHERE UsuarioId = '$usuarioId' AND ObservacaoId = '$observacaoId'";
        $acao = "descurtido";
    } else {
        $sql = "INSERT INTO Curtida (UsuarioId, ObservacaoId) VALUES ('$usuarioId','$observacaoId')";
        $acao = "curtido";
    }

    mysqli_query($conn, $sql);

    $sqlContagem = "SELECT COUNT(*) AS total FROM Curtida WHERE ObservacaoId = '$observacaoId'";
    $resultadoContagem = mysqli_query($conn, $sqlContagem);
    $dadosContagem = mysqli_fetch_assoc($resultadoContagem);

    mysqli_close($conn);

    return ['acao' => $acao, 'total' => $dadosContagem['total']];
}

public function alternarTipoUsuario(Conexao $conexao, int $idUsuario){
    $conn = $conexao->conectar();

    $sqlAtual = "SELECT tipo FROM Usuario WHERE idUsuario = '$idUsuario'";
    $resultadoAtual = mysqli_query($conn, $sqlAtual);
    $dadosAtual = mysqli_fetch_assoc($resultadoAtual);

    $novoTipo = ($dadosAtual['tipo'] === 'admin') ? 'usuario' : 'admin';

    $sql = "UPDATE Usuario SET tipo = '$novoTipo' WHERE idUsuario = '$idUsuario'";
    $resultado = mysqli_query($conn, $sql);

    mysqli_close($conn);

    return $resultado;
}
} // fim da classe atualizar 

?>

