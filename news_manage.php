<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>云影新闻网 | 新闻管理</title>
    <link rel="stylesheet" type="text/css" href="./css/reset.css">
    <link rel="stylesheet" type="text/css" href="./css/header.css">
    <link rel="stylesheet" type="text/css" href="./css/footer.css">
    <link rel="stylesheet" type="text/css" href="./css/news_manage.css">
</head>
<body>
<div id="container">
    <?php
    require ('./inc/header.inc');
    require_once './class/Db.conf.php';
    require_once './class/DbConnect.class.php';
     ?>

<!-- main部分开始 -->
    <div id="main">
        <div id="managecenter">
            <div class="title">管理中心</div>
            <ul>
                <li><a href="./index.php">首&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp页</a></li>
                <li><a href="./categories_manage.php">类别管理</a></li>
                <li><a href="./news_manage.php">新闻管理</a></li>
                <li><a href="./comments_manage.php">评论管理</a></li>
            </ul>
        </div>
        <div id="newsmanage">
            <div class="title">新闻管理</div>
            <?php
                require_once './class/NewsDAO.class.php';
                $news = new NewsDAO();
                if (isset($_GET["newsId"])) {
                    $news->deleteNews($_GET["newsId"]);
                }
                if (isset($_POST["category"]) and isset($_POST["newstitle"]) and isset($_POST["newscontent"])) {
                    $news->insertNews($_POST["newstitle"], $_POST["newscontent"], date("Ymd"), $_POST["category"]);
                }
                $news->manageNews();
             ?>
            <form action="./news_manage.php" method="post">
                所属类别&nbsp&nbsp
                <?php
                    require_once './class/CategoryDAO.class.php';
                    $ca = new CategoryDAO();
                    $ca->optionCategories($ca->getCategories());
                 ?>
                <p>新闻标题</p>
                <textarea name="newstitle" rows="2" cols="100"></textarea>
                <p>新闻内容</p>
                <textarea name="newscontent" rows="10" cols="100"></textarea>
                <p><input type="submit" value="添加新闻"></p>
            </form>
        </div>
    </div>
<!-- main部分结束 -->

    <?php
    require './inc/footer.inc';
     ?>
</div>
</body>
</html>
