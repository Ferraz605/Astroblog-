<?php
namespace Astroblog\View\telas;
session_start();
header('Content-Type: application/json');

require_once('../../DAO/Conexao.php');
require_once('../../DAO/Atualizar.php');

use AstroBlog\DAO\Conexao;
use AstroBlog\DAO\Atualizar;

$conexao = new Conexao();
$atualizar = new Atualizar();

$usuarioId = $_SESSION['idUsuario'] ?? null;

if(!$usuarioId){
    echo json_encode(['erro' => 'Você precisa estar logado para curtir.']);
    exit;
}

$observacaoId = (int) ($_POST['idObservacao'] ?? 0);

$resultado = $atualizar->alternarCurtida($conexao, $usuarioId, $observacaoId);

echo json_encode($resultado);
exit;

?>