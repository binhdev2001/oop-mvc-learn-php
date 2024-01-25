<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="icon"
        href="https://nguyenphuongbinh.com/public\theme\assets\image\6819083.png"
        sizes="32x32" />
    <link rel="icon"
        href="https://nguyenphuongbinh.com/public\theme\assets\image\6819083.png"
        sizes="192x192" />
    <!-- Bootstrap core CSS -->
    <link
        href="<?php echo siteUrl ?>/public/theme/vendor/bootstrap/css/bootstrap.min.css"
        rel="stylesheet">
    <!-- Additional CSS Files -->
    <link rel="stylesheet"
        href="<?php echo siteUrl ?>/public/theme/assets/css/theme.css">
    <link rel="stylesheet"
        href="<?php echo siteUrl ?>/public/theme/assets/css/home.css">
    <link rel="stylesheet"
        href="<?php echo siteUrl ?>/public/theme/assets/css/owl.css">
    <link rel="stylesheet"
        href="<?php echo siteUrl ?>/public/theme/vendor/fontawesome/css/all.min.css">
</head>

<body>

    <!-- Main Heder Section -->
    <div class="bg-white d-flex align-items-center fixed-top shadow menu-app-row"
        style="min-height: 56px; z-index: 5">
        <div class="container">
            <div class="row align-items-center">
                <!-- search -->
                <div class="col d-flex align-items-center">
                    <!-- logo -->
                    <!-- search bar -->
                    <div class="input-group ms-2" type="button">

                        <!-- desktop -->
                        <div class="header__desktop-logo">
                            <a href="<?php echo siteUrl ?>">
                                <img class="logo-img"
                                    src="<?php echo siteUrl ?>/public/theme/assets/image/logo.png"
                                    alt="Logo">
                            </a>
                        </div>

                    </div>
                </div>
                <!-- nav -->
                <div
                    class="col d-none d-xl-flex justify-content-center">
                    <!-- home -->
                    <div class="mx-4 nav__btn nav__btn-active">
                        <button type="button" class="btn px-4">
                            <i
                                class="fas fa-home text-muted fs-4"></i>
                        </button>
                    </div>
                    <!-- market -->
                    <div class="mx-4 nav__btn">
                        <a title="Chợ tài nguyên"
                            href="/chia-se-font-viet-hoa/">
                            <button type="button" class="btn px-4">
                                <i
                                    class="fas fa-store text-muted fs-4"></i>
                            </button>
                        </a>
                    </div>
                    <!-- gaming -->
                    <div class="mx-4 nav__btn">
                        <a title="Blog kiếm tiền online"
                            href="/category/kiem-tien-online/">
                            <button type="button" class="btn px-4">
                                <i
                                    class="fas fa-book text-muted fs-4"></i>
                            </button>
                        </a>
                    </div>
                    <!-- group -->
                    <div class="mx-4 nav__btn">
                        <a title="Thông tin tài khoản"
                            href="<?php echo siteUrl ?>/thong-tin-tai-khoan">
                            <button type="button" class="btn px-4">
                                <i type="button"
                                    class="position-relative fas fa-user text-muted fs-4">
                                </i>
                            </button>
                        </a>
                    </div>

                </div>
                <!-- menus -->

                <div
                    class="col d-flex align-items-center justify-content-end">
                    <?php if (!empty($_SESSION['userinfo'])) { ?>
                        <input id="user_id" type="hidden"
                            value="<?php echo ($_SESSION['userinfo']['ID']) ?>">
                    <?php } ?>
                    <div class="login-user-desktop">
                        <a href="<?php echo siteUrl ?>/dang-nhap">
                            <button type="button"
                                class="btn btn-primary"
                                style="color: white">
                                Đăng nhập
                            </button>
                        </a>
                        <a href="<?php echo siteUrl ?>/dang-ky">
                            <button type="button"
                                class="btn btn-outline-primary">
                                Đăng ký
                            </button>
                        </a>
                    </div>
                    <!-- main menu -->

                    <div class="menu-mobile rounded-circle p-1 bg-gray d-flex align-items-center justify-content-center mx-2 "
                        type="button" id="mainMenu"
                        data-bs-toggle="dropdown"
                        data-bs-target="#collapseExample"
                        aria-expanded="false"
                        data-bs-auto-close="outside">
                        <i class="fas fa-ellipsis-h"></i>
                    </div>
                    <!-- main menu dd -->
                    <ul class="dropdown-menu border-0 shadow p-3 overflow-auto"
                        aria-labelledby="mainMenu"
                        id="#collapseExample"
                        style="width: 23em; max-height: 600px">
                        <hr />
                        <!--btn-login-->
                        <div class="login-user-mobile">
                            <a
                                href="<?php echo siteUrl ?>/login-page">
                                <button type="button"
                                    class="btn btn-primary"
                                    style="color: white">
                                    Đăng nhập
                                </button>
                            </a>
                            <a
                                href="<?php echo siteUrl ?>/register-page">
                                <button type="button"
                                    class="btn btn-outline-primary">
                                    Đăng ký
                                </button>
                            </a>
                        </div>
                    </ul>
                    <!-- end -->
                </div>
            </div>
        </div>
    </div>
    <!-- END Main Heder Section -->
    <main class="main homepage">