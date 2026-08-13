<?php 
    namespace AstroBlog\DAO;
    require_once('Conexao.php');

    use AstroBlog\DAO\Conexao;
    use DateTime;
    use Exception;
    use mysqli;

    class Cadastrar
    {
        public function CadastrarUsuario(Conexao $conexao, String $nome, String $Email, String $Senha, String $tipo, DateTime $dataCadastro,int $curtida,int $contarUsuario){
            try{
                $conn = $conexao -> conectar(); // ABRE CONEXAO
                $sql="insert into Usuario(idUsuario,nome,email,senha,tipo,dataCadastro,curtida,contarUsuario)
                        values('','$nome','$Email','$Senha','$tipo','".$dataCadastro->format('Y-m-d')."','$curtida','$contarUsuario')";                
                $resultado = mysqli_query($conn,$sql);

                if($resultado){
                    return "<br><br> Usuário Inserido com sucesso! ✔";
                }
                return "<br><br> Usuário Não Inserido ✖";
            }catch(Exception $erro){
                echo "<br><br> Impossível Cadastrar o Usuário!<br><br> $erro";
            } // FIM DO TRY E KAT
        } // FIM DA CLASSE CADATRARUSUARIO

        // VALIDAR SE EMAIL JA EXISTE
        
        public function ValidarEmail(Conexao $conexao,string $Email){
        try
        {
            $conn=$conexao-> conectar();// abre a conexao 
            $sql="select email from Usuario where email= '$Email'"; // ALTER TABLE NO USUARIO PARA
            $resultado=mysqli_query($conn,$sql);

             while($dados = mysqli_fetch_array($resultado))
             { 
                    if($dados['email'] == $Email)
                    {
                        return $dados['email'] ;
                    }// fim do if 
             }// fim do WHILE 
        }// fim do try 
        catch(Exception $erro)
        {
            echo" Algo deu errado <br> <br> $erro";
        }
    }// Fim do CONSULTAR TIPO


        public function contarUsuario(Conexao $conexao){
            $conn = $conexao->conectar(); // ABRE CONEXAO
            $sql = "select count(contarUsuario) As total from Usuario";
            $resultado = mysqli_query($conn,$sql);
            $dados = mysqli_fetch_assoc($resultado);

            return $dados['total']; 
        } // FIM DE CONTAR USUARIO

        public function contarCurtida(Conexao $conexao){
            $conn = $conexao->conectar(); // ABRE CONEXAO
            $sql = "select count(idCurtida) As total from Curtida";
            $resultado = mysqli_query($conn,$sql);
            $dados = mysqli_fetch_assoc($resultado);//serve para extrair uma linha de resultado de uma consulta

            return $dados['total'];
        } // FIM DE CONTAR CURTIDA

        public function contarObservacoes(Conexao $conexao){
            $conn = $conexao->conectar(); // ABRE CONEXAO
            $sql = "select count(contarObservacao) As total from Observacao";
            $resultado = mysqli_query($conn,$sql);
            $dados = mysqli_fetch_assoc($resultado);//serve para extrair uma linha de resultado de uma consulta

            return $dados['total'];
        } // FIM DE CONTAR OBSERVAÇÔES

        public function contarEventos(Conexao $conexao){
            $conn = $conexao->conectar(); // ABRE CONEXAO
            $sql = "select count(contarEvento) As total from EventoAstronomico";
            $resultado = mysqli_query($conn,$sql);
            $dados = mysqli_fetch_assoc($resultado);//serve para extrair uma linha de resultado de uma consulta

            return $dados['total'];            
        }

        public function contarObjetos(Conexao $conexao){
            $conn = $conexao->conectar(); // ABRE CONEXAO
            $sql = "select count(objetoObservado) As total from Observacao";
            $resultado = mysqli_query($conn,$sql);
            $dados = mysqli_fetch_assoc($resultado);//serve para extrair uma linha de resultado de uma consulta

            return $dados['total'];            
        }

####################################################################################
        public function cadastrarLocal(Conexao $conexao, String $nomeLocal, String $cidade, String $estado, String $pais, String $descricao){
            $conn = $conexao->conectar();
            $sql = "insert into LocalObservacao (nomeLocal, cidade, estado, pais, descricao)
                    values ('$nomeLocal','$cidade','$estado','$pais','$descricao')";

            $resultado = mysqli_query($conn, $sql);

            if (!$resultado) {
                echo "<br><br> Local não inserido! ✖ Erro: " . mysqli_error($conn);
            }

            return $resultado; // true ou false de verdade, não string
        }
####################################################################################
        public function cadastrarEquipamento(Conexao $conexao, String $nomeEquipamento, String $tipo,String $marca,String $modelo){
            try{
                $conn = $conexao -> conectar(); // ABRE CONEXAO
                $sql="insert into Equipamento (idEquipamento,nomeEquipamento,tipo,marca,modelo)
                values('','$nomeEquipamento','$tipo','$marca','$modelo')";
                
                $resultado = mysqli_query($conn,$sql);

                if($resultado){
                    return "<br><br> Equipamento Inserido com sucesso!✔";
                }
                return "<br><br> Equipamento Não inserido! ✖";
            }catch(Exception $erro){
                echo "<br><br> Impossível Cadastrar o Equipamento!<br><br> $erro!";
            } // FIM DO TRY E KAT
        } // FIM  DO CADASTRAR EQUIPAMENTO
####################################################################################
        public function cadastrarEvento(Conexao $conexao, String $nomeEvento, String $categoria, string $dataEvento, string $descricaoEvento){
                $conn = $conexao -> conectar(); // ABRE CONEXAO
                $sql="insert into EventoAstronomico(idEventoAstronomico,nomeEvento,categoria,dataEvento,descricao)
                values('','$nomeEvento','$categoria','$dataEvento','$descricaoEvento')";
                
                $resultado = mysqli_query($conn,$sql);

                if(!$resultado){
                    echo "<br><br> Local não inserido! ✖ Erro: " . mysqli_error($conn);
                }

                return $resultado;
        } // FIM  DO CADASTRAR EVENTO
####################################################################################
public function cadastrarObservacao(Conexao $conexao, string $titulo, string $categoria, string $objetoObservado, string $dataObservacao, string $condicaoClimatica, string $descricao, int $contarObservacao, int $EventoAstronomicoId, int $EquipamentoId, int $UsuarioId, int $localId){
    try{
        $conn = $conexao -> conectar(); // ABRE CONEXAO
        $sql="insert into Observacao (titulo,categoria,objetoObservado,dataObservacao,condicaoClimatica,descricao,contarObservacao,EventoAstronomicoId,EquipamentoId,UsuarioId,localId)
        values('$titulo','$categoria','$objetoObservado','$dataObservacao','$condicaoClimatica','$descricao','$contarObservacao','$EventoAstronomicoId','$EquipamentoId','$UsuarioId','$localId')";
        
        $resultado = mysqli_query($conn,$sql);

        if($resultado){
            return "<br><br> Observação Inserida com sucesso!✔";
        }
        return "<br><br> Observação Não inserida!✖";
    }catch(Exception $erro){
        echo "<br><br> Impossível Cadastrar Observação!<br><br> $erro!";
    } // FIM DO TRY E KAT
} // FIM  DO CADASTRAR OBSERVACOES
    } // FIM DA CLASSE CADASTRAR
?>