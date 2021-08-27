<?php declare(strict_types=1);
$pdfFiles = [
    1 => 'sample1.pdf'
];
if (!isset($_GET['type']) ||  !isset($pdfFiles[$_GET['type']])){
    exit;
}
$file = $pdfFiles[$_GET['type']];
// ファイルサイズの計算
header('Content-lengh: ' . filesize($file));
// どんなファイルの種類か
header('Content-Type: application/octet-stream');
// どんな名前で保存させるか
header('Content-Disposition: attachment; filename=' .$file);
readfile($file);

