<?php

 namespace AstroBlog\DAO;
 require_once('Conexao.php');

 use AstroBlog\DAO\Conexao;

 use Exception;
 use mysqli;

    class Excluir
    {
        public function ExcluirUsuario(Conexao $conexao, int $idUsuario){
            $conn = $conexao->conectar();

            $sqlCurtidasFeitas = "DELETE FROM Curtida WHERE UsuarioId = '$idUsuario'";
            mysqli_query($conn, $sqlCurtidasFeitas);

            $sqlCurtidasRecebidas = "DELETE FROM Curtida WHERE ObservacaoId IN (SELECT idObservercao FROM Observacao WHERE UsuarioId = '$idUsuario')";
            mysqli_query($conn, $sqlCurtidasRecebidas);

            $sqlObservacoes = "DELETE FROM Observacao WHERE UsuarioId = '$idUsuario'";
            mysqli_query($conn, $sqlObservacoes);

            $sqlUsuario = "DELETE FROM Usuario WHERE idUsuario = '$idUsuario'";
            $resultado = mysqli_query($conn, $sqlUsuario);

            mysqli_close($conn);

            return $resultado;
        }
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