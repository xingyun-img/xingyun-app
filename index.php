<?php
include 'includes/config.php';
include 'includes/functions.php';
$appConfig = getAppConfig();
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $appConfig['site_title'] ?? 'APP下载' ?></title>
    <style>
        body { 
            font-family: 'Helvetica Neue', Arial, sans-serif; 
            margin: 0; 
            padding: 0; 
            background: #fff; 
            color: #333; 
        }
        .container { 
            max-width: 1200px; 
            margin: 0 auto; 
            padding: 20px; 
        }
        header { 
            text-align: center; 
            padding: 20px 0;
        }
        .header-logo {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 15px;
            margin-bottom: 10px;
        }
        .app-info-header {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            margin-bottom: 20px;
        }
        header h1 { 
            margin: 0; 
            font-size: 1.8rem; 
            color: #333; 
        }
        .version-info {
            color: #666;
            font-size: 0.9rem;
        }
        .app-description { 
            margin: 20px 0; 
            line-height: 1.6; 
        }
        .app-description-images { 
            display: flex; 
            flex-wrap: wrap; 
            gap: 15px; 
            margin: 30px 0; 
        }
        .app-description-image { 
            width: calc(33.333% - 10px); 
            min-width: 150px; 
            height: 200px; 
            object-fit: cover; 
            border-radius: 10px; 
        }
        .download-section { 
            text-align: center; 
            margin: 50px 0 30px 0; 
        }
        .download-btn { 
            display: inline-block; 
            background: #66a3ff; 
            color: white; 
            padding: 15px 0; 
            font-size: 1.2rem; 
            text-decoration: none; 
            border-radius: 50px; 
            transition: background 0.3s; 
            width: 90%; 
            max-width: 400px; 
            margin: 0 auto;
        }
        .download-btn:hover { 
            background: #5593ee; 
        }
        footer { 
            text-align: center; 
            padding: 20px 0; 
            color: #6c757d; 
            font-size: 0.9rem; 
            border-top: 1px solid #eee; 
            margin-top: 20px;
        }
        @media (max-width: 768px) {
            .app-description-image { 
                width: 100%; 
                margin-bottom: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <div class="app-info-header">
                <img src="https://www.xingyun1.cn/logo.png" 
                     alt="应用名称" 
                     class="header-logo">
                <div>
                    <h1><?= $appConfig['app_name'] ?? '名称' ?></h1>
                    <div class="version-info">版本: <?= $appConfig['app_version'] ?? '1.0.0' ?></div>
                </div>
            </div>
            
            <p class="app-description">
                <?= $appConfig['app_description'] ?? '简介' ?>
            </p>
            
            <div class="app-description-images">
                <?php if (!empty($appConfig['app_description_image1'])): ?>
                    <img src="<?= $appConfig['app_description_image1'] ?>" 
                         alt="简介图1" 
                         class="app-description-image">
                <?php endif; ?>
                <?php if (!empty($appConfig['app_description_image2'])): ?>
                    <img src="<?= $appConfig['app_description_image2'] ?>" 
                         alt="简介图2" 
                         class="app-description-image">
                <?php endif; ?>
                <?php if (!empty($appConfig['app_description_image3'])): ?>
                    <img src="<?= $appConfig['app_description_image3'] ?>" 
                         alt="简介图3" 
                         class="app-description-image">
                <?php endif; ?>
            </div>
            
            <div class="download-section">
                <a href="download.php" class="download-btn">下载</a>
            </div>
            
            <footer>
                <p>© <?= date('Y') ?> <?= $appConfig['app_name'] ?? '名称' ?>. 保留所有权利.</p>
            </footer>
        </header>
    </div>
</body>
</html>
