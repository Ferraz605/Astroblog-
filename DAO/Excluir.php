<?php

 namespace AstroBlog\DAO;
 require_once('Conexao.php');

 use AstroBlog\DAO\Conexao;

 use Exception;
 use mysqli;

    class Excluir
    {
        function ExcluirUsuario(Conexao $conexao,int $codigo){
            try{
                $conn = $conexao->conectar();
                $sql = "Delete from Usuario where idUsuario = '$codigo'";
                $resultado = mysqli_query($conn,$sql);

                if($resultado){
                    return "<br><br>Usuario excluido com sucesso!";
                }
                return "<br><br>Usuario não excluido";
            }catch(Exception $error){
                echo $error;
            } // FIM DO TRY E KAT
        } // FIM DA FUNÇÂO EXCLUIR USUARIO

        function ExcluirLocal(Conexao $conexao,int $codigo){
            try{
                $conn = $conexao->conectar();
                $sql = "Delete from LocalObservacao where idLocal = '$codigo'";
                $resultado = mysqli_query($conn,$sql);

                if($resultado){
                    return "<br><br>Local excluido com sucesso!";
                }
                return "<br><br>Local não excluido";
            }catch(Exception $error){
                echo $error;
            } // FIM DO TRY E KAT
        } // FIM DA FUNÇÂO EXCLUIR LOCAL

        function ExcluirEquipamento(Conexao $conexao,int $codigo){
            try{
                $conn = $conexao->conectar();
                $sql = "Delete from Equipamento where idEquipamento = '$codigo'";
                $resultado = mysqli_query($conn,$sql);

                if($resultado){
                    return "<br><br>Equipamento excluido com sucesso!";
                }
                return "<br><br>Equipamento não excluido";
            }catch(Exception $error){
                echo $error;
            } // FIM DO TRY E KAT
        } // FIM DA FUNÇÂO EXCLUIR EQUIPAMENTO

        function ExcluirObservacao(Conexao $conexao,int $codigo){
            try{
                $conn = $conexao->conectar();
                $sql = "Delete from Observacao where idObservercao = '$codigo'";
                $resultado = mysqli_query($conn,$sql);

                if($resultado){
                    return "<br><br>Observação excluida com sucesso!";
                }
                return "<br><br>Observação não excluida";
            }catch(Exception $error){
                echo $error;
            } // FIM DO TRY E KAT
        } // FIM DA FUNÇÂO EXCLUIR OBSERVACAO

        function ExcluirEvento(Conexao $conexao,int $codigo){
            try{
                $conn = $conexao->conectar();
                $sql = "Delete from EventoAstronomico where idEventoAstronomico = '$codigo'";
                $resultado = mysqli_query($conn,$sql);

                if($resultado){
                    return "<br><br>Evento excluido com sucesso!";
                }
                return "<br><br>Evento não excluido";
            }catch(Exception $error){
                echo $error;
            } // FIM DO TRY E KAT
        } // FIM DA FUNÇÂO EXCLUIR EVENTO
    } // FIM DA CLASSE EXCLUIR
?>