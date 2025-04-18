<?php
$targetUrl = 'includes/config.php?action=create_tables';
$delayInSeconds = 10;
$phpVersionOk = version_compare(PHP_VERSION, '7.0.0', '>=') && version_compare(PHP_VERSION, '8.0.0', '<');
if ($phpVersionOk) {
    header('Refresh: ' . $delayInSeconds . '; url=' . $targetUrl);
} else {
    header('Content-Type: text/html; charset=UTF-8');
    echo '环境检测未通过：PHP 版本不符合要求（需要 7.x）。';
    exit;
}
header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>环境检测中...</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }
        .container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 100%;
            max-width: 500px;
            text-align: center;
        }
        .redirect-info {
            margin-bottom: 20px;
        }
        .redirect-info h2 {
            color: #2c3e50;
            margin-bottom: 15px;
        }
        .countdown-container {
            font-size: 24px;
            margin: 20px 0;
            color: #3498db;
        }
        .env-info {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
            margin-top: 20px;
            border-left: 4px solid #3498db;
        }
        .env-info h3 {
            margin-top: 0;
            color: #2c3e50;
        }
        .env-info p {
            margin-bottom: 0;
            text-align: left;
        }
        .php-version {
            margin-top: 10px;
        }
        .php-version strong {
            width: 120px;
            display: inline-block;
        }
        .status-ok {
            color: #27ae60;
            font-weight: bold;
        }
        .one-time-info {
            margin-top: 20px;
            padding: 10px;
            background-color: #fff3cd;
            border-radius: 5px;
            color: #856404;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="redirect-info">
            <h2>环境检测完成</h2>
            <p>正在准备跳转，请稍候...</p>
        </div>
        <div class="countdown-container">
            <span id="countdown"><?= $delayInSeconds ?></span> 秒后将自动跳转
        </div>
        <div class="env-info">
            <h3>环境检测结果</h3>
            <p class="php-version"><strong>PHP 版本：</strong> <?= PHP_VERSION ?> <span class="status-ok"><?= $phpVersionOk ? '符合要求' : '不符合要求' ?></span></p>
        </div>
        <div class="one-time-info">
            <p>注意：此页面只能访问一次，初始化成功后将自动删除此文件</p>
        </div>
    </div>
    <script>
        let timeLeft = <?= $delayInSeconds ?>;
        const countdownElement = document.getElementById('countdown');
        const interval = setInterval(() => {
            timeLeft--;
            countdownElement.textContent = timeLeft;
            if (timeLeft <= 0) {
                clearInterval(interval);
            }
        }, 1000);
    </script>
<?php
if ($phpVersionOk) {
    ignore_user_abort(true);
    ob_start();
    register_shutdown_function(function () {
        $currentFile = __FILE__;
        sleep($delayInSeconds + 2);
        unlink($currentFile);
    });
}
?>
