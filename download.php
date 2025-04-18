<?php
include 'includes/config.php';
include 'includes/functions.php';
$appConfig = getAppConfig();
$conn = dbConnect();
$conn->query("INSERT INTO download_stats (download_time, ip_address) VALUES (NOW(), '" . $conn->real_escape_string($_SERVER['REMOTE_ADDR']) . "')");

if (!empty($appConfig['app_download_file'])) {
    $file = $_SERVER['DOCUMENT_ROOT'] . $appConfig['app_download_file'];
    if (file_exists($file)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/vnd.android.package-archive');
        header('Content-Disposition: attachment; filename="' . basename($file) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        readfile($file);
        exit;
    } else {
        echo '下载文件不存在，请联系管理员';
        exit;
    }
} elseif (!empty($appConfig['app_download_url'])) {
    header('Location: ' . $appConfig['app_download_url']);
    exit;
} else {
    echo '下载链接未配置，请联系管理员';
    exit;
}
?>
