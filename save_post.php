<?php
// Caminho do arquivo de postagens
$postsFile = 'posts/posts.json';

// Receber o conteúdo do POST
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['content'])) {
    // Conteúdo da nova postagem
    $newPost = [
        'content' => $data['content'],
        'timestamp' => time()
    ];

    // Carregar postagens anteriores
    $posts = file_exists($postsFile) ? json_decode(file_get_contents($postsFile), true) : [];

    // Adicionar a nova postagem
    $posts[] = $newPost;

    // Salvar as postagens de volta no arquivo
    file_put_contents($postsFile, json_encode($posts));

    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false]);
}
?>
