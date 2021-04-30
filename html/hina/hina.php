<?php
session_start([
    'gc_maxlifetime' => 60 * 60 * 1, // セッションファイルの存在が保証されるのは最終アクセスから1時間まで
    'cookie_lifetime' => 60 * 60 * 24 // セッションIDに対応するcookieの有効期限は最初のアクセスから24時間
]);
if (!isset($_SESSION['loginCode']) || !isset($_SESSION['loginName']) || $_SESSION['loginName']==='') {
    $loginCode = 0;
    $loginName = 'ゲスト';
} else {
    $loginCode = $_SESSION['loginCode'];
    $loginName = $_SESSION['loginName'];
}
?>

<!DOCTYPE html>
<html lang="ja">

<!-- OGPのためにprefix属性を付与されたheadタグ -->
<!-- トップページのみprefix属性中の"article"を"website"に置き換える -->
<head prefix="og: https://ogp.me/ns# fb: https://ogp.me/ns/fb# article: https://ogp.me/ns/article#">

    <!-- 重要なmetaタグ -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <!-- ページタイトルとdescription -->
    <title>page title</title>
    <meta name="description" content="description, description, description.">

    <!-- OGP関連 -->
    <meta property="og:url" content="http://shoplab.com/hina/hina.html"> <!-- このページのURL -->
    <meta property="og:type" content="article"> <!-- トップページは"website"、それ以外は"article" -->
    <meta property="og:title" content="page title"> <!-- このページのタイトル、サイト名は含まない -->
    <meta property="og:description" content="OGP description, OGP description, OGP description."> <!-- このページの説明 -->
    <meta property="og:site_name" content="Shop Lab."> <!-- サイト名 -->
    <meta property="og:image" content="https://shoplab.com/image/ogp/ogpimg.png"> <!-- SNSで表示する画像URL -->
    <meta property="og:locale" content="ja-JP"> <!-- このページの言語 -->
    <meta property="fb:app_id" content="hogehoge"> <!-- facebookのID -->
    <meta name="twitter:card" content="summary"> <!-- Twitter上の表示タイプ -->
    <meta name="twitter:site" content="@hogehoge"> <!-- TwitterのID -->

    <!-- favicon -->
    <link rel="icon" href="../image/common/favicon.ico">
    <link rel="apple-touch-icon" href="../image/common/apple-touch-icon-180x180.png" sizes="180x180">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/destyle.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css">
    <link rel="stylesheet" href="../css/main.css">
</head>

<body>
<div id="page">

    <header id="pageHead">
        <div id="pageHeadGrid" class="contentsMaxWidth">
            <div class="siteLogo">
                <a href="../index.php"><img src="../image/common/siteLogo.png" alt="Shop Lab." title="Shop Lab. HOME" class="img-siteLogo"></a>
            </div>
            <button id="sideMenuButton"><i class="fas fa-bars"></i></button>
            <div id="memberMenu" class="open">
                <button type="button" id="memberMenuButton" class="centering">
                    <span class="bold"><?=$loginName?></span>様
                    <i class="fas fa-caret-down"></i>
                </button>
                <div class="accordionMenu">
                    <nav>
                        <ul>
                            <?php if ($loginCode===1): ?>
                                <li><a href="../staff/staff_list.php">スタッフ管理</a></li>
                                <li><a href="../product/product_list.php">商品管理</a></li>
                                <li><a href="../order/download.php">注文情報ダウンロード</a></li>
                                <li><a href="../staff/signout.php">ログアウト</a></li>
                            <?php elseif ($loginCode===2): ?>
                                <li><a href="../member/disp.php">会員情報確認</a></li>
                                <li><a href="../member/edit.php">会員情報変更</a></li>
                                <li><a href="../member/signout.php">ログアウト</a></li>
                            <?php else: ?>
                                <li><button type="button" onclick="location.href='../member/signin.php'">ログイン</button></li>
                                <li><button type="button" onclick="location.href='../member/signup.php'">新規会員登録</button></li>
                                <li><a href="../staff/signin.php">スタッフログイン</a></li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div> <!-- /.accordionMenu -->
            </div> <!-- /#memberMenu -->
            <form action="../index.php" method="get" id="searchForm">
                <div id="searchInputWrap">
                    <input type="text" name="searchWord" id="searchInput">
                    <button type="submit" id="searchButton"><i class="fas fa-search"></i></button>
                </div>
            </form>
        </div> <!-- /#pageHeadGrid -->
    </header>

    <div id="sideMenu">
        <nav>
            <ul>
                <?php if ($loginCode===1): ?>
                    <li><a href="../staff/staff_list.php">スタッフ管理</a></li>
                    <li><a href="../product/product_list.php">商品管理</a></li>
                    <li><a href="../order/download.php">注文情報ダウンロード</a></li>
                    <li><a href="../staff/signout.php">ログアウト</a></li>
                <?php elseif ($loginCode===2): ?>
                    <li><a href="../member/disp.php">会員情報確認</a></li>
                    <li><a href="../member/edit.php">会員情報変更</a></li>
                    <li><a href="../member/signout.php">ログアウト</a></li>
                <?php else: ?>
                    <li><a href="../member/signin.php">ログイン</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>

    <main id="pageMain">
        h
    </main>

    <footer id="pageFoot">
        <p id="copyright">
            <small>
                &copy; 2021 Shop Lab. Corp.
            </small>
        </p>
    </footer>

</div>
</body>
</html>