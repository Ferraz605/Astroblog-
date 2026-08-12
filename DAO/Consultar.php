<?php
 namespace AstroBlog\DAO;
 require_once('Conexao.php');

use AstroBlog\DAO\Conexao;
use Exception;
use mysqli;

class Consultar
{
  function consultarUsuarioEspecifico(conexao $conexao,int $codigo)
  {
     try
     {
         $conn=$conexao-> conectar();// abre a conexao 
         $sql="select * from AstroBlog where codigo= '$codigo'";
         $result=mysqli_query($conn,$sql);

        //serve para capturar os dados retornados por uma consulta
         while(($dados = mysqli_fetch_array($result)))
        {
            if($dados ['codigo']== $codigo)
             {
               return '<br> Código:'.$dados['codigo'].
                      '<br> Nome:'.$dados['nome'].
                      '<br> Email:'.$dados['email'].
                      '<br> Senha :'.$dados['senha'].
                      '<br> Tipo :'.$dados['tipo'].
                      '<br> Data do Cadastro:'.$dados['dataCadastro'].
                      '<br> Curtidas:'.$dados['curtida'].
                      '<br> Quantidade de Usuários:'.$dados['contarUsuário'];
             }// fim do if       
        }//Fim do While
     }// fim do TRY 
     catch(Exception $erro)
     {
          echo" Algo deu errado <br> <br> $erro";
     }
  }// fim do consultarCliente 


  public function consultarIdUsuario(Conexao $conexao, string $usuario){
    $conn = $conexao->conectar();
    $usuarioEscapado = mysqli_real_escape_string($conn, $usuario);
    $sql = "SELECT idUsuario FROM Usuario WHERE nome = '$usuarioEscapado'";
    $resultado = mysqli_query($conn, $sql);
    $dados = mysqli_fetch_assoc($resultado);
    return $dados['idUsuario'] ?? null;
}

    function ConsultarTipo(conexao $conexao,string $nome)
    {
        try
        {
            $conn = $conexao-> conectar();// abre a conexao 
            $sql="select nome, tipo from Usuario where nome = '$nome'";
            $result=mysqli_query($conn,$sql);

             while($dados = mysqli_fetch_array($result))
             { 
                    if($dados['nome'] == $nome)
                    {
                        return $dados['tipo'];
                    }// fim do if 
             }// fim do WHILE 
        }// fim do try 
        catch(Exception $erro)
        {
            echo "Algo deu errado <br> <br> $erro";
        }
    }// Fim do CONSULTAR TIPO

    function ConsultarSenha(conexao $conexao,String $Senha)
    {
        try
        {
            $conn=$conexao-> conectar();// abre a conexao 
            $sql="select senha from Usuario where senha= '$Senha'"; // ALTER TABLE NO USUARIO PARA
            $resultado=mysqli_query($conn,$sql);

             while($dados = mysqli_fetch_array($resultado))
             { 
                    if($dados['senha'] == $Senha)
                    {
                        return $dados['senha'] ;
                    }// fim do if 
             }// fim do WHILE 
        }// fim do try 
        catch(Exception $erro)
        {
            echo" Algo deu errado <br> <br> $erro";
        }
    }// Fim do CONSULTAR TIPO

function ConsultarUsuario(conexao $conexao,String $Usuario)
    {
        try
        {
            $conn=$conexao-> conectar();// abre a conexao 
            $sql="select nome from Usuario where nome= '$Usuario'"; // ALTER TABLE NO USUARIO PARA
            $resultado=mysqli_query($conn,$sql);

             while($dados = mysqli_fetch_array($resultado))
             { 
                    if($dados['nome'] == $Usuario)
                    {
                        return $dados['nome'] ;
                    }// fim do if 
             }// fim do WHILE 
        }// fim do try 
        catch(Exception $erro)
        {
            echo" Algo deu errado <br> <br> $erro";
        }
    }// Fim do CONSULTAR TIPO
    
    
###############################################################
    function consultarLocalEspecifico(conexao $conexao,int $codigo)
    {
     try
        {
         $conn=$conexao-> conectar();// abre a conexao 
         $sql="select * from LocalObservacao where idLocal = '$codigo'";
         $result=mysqli_query($conn,$sql);

          $dados = mysqli_fetch_array($result);
              
          return $dados;    

        }// fim do TRY 

     catch(Exception $erro)
     {
          echo" Algo deu errado <br> <br> $erro";
     }
 }// fim do consultarLocal 

 public function consultarLocais(Conexao $conexao) {
    $conn = $conexao->conectar();
    $sql = "SELECT * FROM LocalObservacao";
    $resultado = mysqli_query($conn, $sql);
    return $resultado;
}

public function consultarEquipamentos(Conexao $conexao) {
    $conn = $conexao->conectar();
    $sql = "SELECT * FROM Equipamento";
    $resultado = mysqli_query($conn, $sql);
    return $resultado;
}

public function consultarEventos(Conexao $conexao) {
    $conn = $conexao->conectar();
    $sql = "SELECT * FROM EventoAstronomico";
    $resultado = mysqli_query($conn, $sql);
    return $resultado;
}

public function consultarObservacoes(Conexao $conexao){
    $conn = $conexao->conectar();
    $sql = "SELECT o.*, u.nome AS nomeUsuario 
            FROM Observacao o 
            LEFT JOIN Usuario u ON o.UsuarioId = u.idUsuario 
            ORDER BY o.dataObservacao DESC";
    $resultado = mysqli_query($conn, $sql);
    return $resultado;
}

 ###################################################################################################
    function consultarEquipamento(conexao $conexao,int $codigo)
    {
        try
        {
         $conn=$conexao-> conectar();// abre a conexao 
         $sql="select * from AstroBlog where codigo= '$codigo'";
         $result=mysqli_query($conn,$sql);

          while(($dados = mysqli_fetch_array($result)))
            {
               if($dados ['codigo']== $codigo)
               {
                  return '<br> Código:'.$dados['codigo'].
                         '<br> Nome do Equipamento:'.$dados['nomeEquipamento'].
                         '<br> Tipo de Equipamento:'.$dados['tipo'].
                         '<br> Marca:'.$dados['marca'].
                         '<br> Modelo:'.$dados['modelo'];
               }// fim do IF
            }// fim do While         
        }// fim do Try 
        catch(Exception $erro)
        {
             echo" Algo deu errado <br> <br> $erro";
        }
    }// fim do consultarEquipamento

    function consultarEquipamentoEspecifico(conexao $conexao,int $codigo)
    {
        try
            {
            $conn=$conexao-> conectar();// abre a conexao 
            $sql="select * from Equipamento where idEquipamento = '$codigo'";
            $result=mysqli_query($conn,$sql);

            $dados = mysqli_fetch_array($result);
                
            return $dados;    

            }// fim do TRY 

        catch(Exception $erro)
        {
            echo" Algo deu errado <br> <br> $erro";
        }
 }// fim do consultarLocal 


####################################################################################################
    function consultarEvento(conexao $conexao,int $codigo)
    {
        try
        {
            $conn=$conexao-> conectar();// abre a conexao 
            $sql="select * from AstroBlog where codigo= '$codigo'";
            $result=mysqli_query($conn,$sql);

             while(($dados = mysqli_fetch_array($result)))
                { 
                    if($dados ['codigo']== $codigo)
                        {
                           return '<br> Código:'.$dados['codigo'].
                                   '<br> Nome do Evento:'.$dados['nomeEvento'].
                                   '<br> Categoria do Evento :'.$dados['categoria'];
                    
                        }// fim do if 
                }// fim do WHILE 
        }// fim do try 
        catch(Exception $erro)
        {
            echo" Algo deu errado <br> <br> $erro";
        }
    }// Fim do consultarEvenento 
#####################################################################################################
    function consultarObservacao(conexao $conexao,int $codigo)
    {
        try
        {
            $conn=$conexao-> conectar();// abre a conexao 
            $sql="select * from AstroBlog where codigo= '$codigo'";
            $result=mysqli_query($conn,$sql);
            
            while(($dados = mysqli_fetch_array($result)))
            { 
               if($dados ['codigo']== $codigo)
                {
                  return '<br> Código:'.$dados['codigo'].
                         '<br> Titulo:'.$dados['titulo'].
                         '<br> Categoria :'.$dados['categoria'].
                         '<br> Objeto Observado:'.$dados['objetoObservado'].
                         '<br> Data da Observação:'.$dados['dataObservacao'].
                         '<br> Condição Climática:'.$dados['condicaoClimatica'].
                         '<br> Descrição:'.$dados['descricao'].
                         '<br> Imagem:'.$dados['imagem'].
                         '<br> Contar Observações:'.$dados['contarObservacao'].
                         // Chaves Estrangeiras (FK):
                        '<br> ID Evento:'.$dados['EventoAstronomicoId'].
                        '<br> ID Equipamento:'.$dados['EquipamentoId'].
                        '<br> ID Usuário:'.$dados['UsuarioId'].
                        '<br> ID Local:'.$dados['LocalId'];                        
                }// fim do IF              
            }// fim do while 
          
        }// fim do TRY
        catch(Exception $erro)
        {
            echo" Algo deu errado <br> <br> $erro";
        }
    }// fim do Consultar Obervaçao

function consultarObservacaoEspecifica(conexao $conexao,int $codigo)
    {
        try
            {
            $conn=$conexao-> conectar();// abre a conexao 
            $sql="select * from Observacao where idLocal = '$codigo'";
            $result=mysqli_query($conn,$sql);

            $dados = mysqli_fetch_array($result);
                
            return $dados;    

            }// fim do TRY 

        catch(Exception $erro)
        {
            echo" Algo deu errado <br> <br> $erro";
        }
 }// fim do consultarLocal 


}// fim da classe Consultar 

?>