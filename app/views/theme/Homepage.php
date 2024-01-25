<?php
// echo '<pre>';
// print_r($data['allProduct']);
// echo '</pre>';
?>


</div>
<section class="homepage__main">
    <div class="container">
        <div class="fetch-filter">
            <div class="fetch-wrapper">
                <div class="row row-product">
                    <?php
                    foreach ($data['allProduct'] as $key => $value) {
                        ?>

                        <div class="col-lg-3 col-md-6 col-12 col-product"
                            id="col_id_<?php echo $value['id_font'] ?>">
                            <div class="font-item mb-4">
                                <div
                                    class="font-item__thumb position-relative overflow-hidden">
                                    <a href="javascript:;"
                                        class="btn-font-thumb"
                                        data-id="6535">
                                        <img src="<?php echo siteUrl ?>/public/admin/upload/font-feature-img/<?php echo $value['image_feature'] ?>"
                                            alt="">
                                    </a>
                                </div>
                                <div
                                    class="font-item__detail p-3 bg-white">
                                    <a href="" class="title limit-text-1">
                                        <?php echo $value['font_name'] ?>
                                    </a>
                                    <input type="hidden" value="">
                                    <ul
                                        class="details list-unstyled mb-0 d-flex flex-wrap">
                                        <li class="w-100 mb-1 price">
                                            <input type="hidden" value="">
                                            <strong>Giá:
                                                <?php
                                                if ($value['price'] == 0) {

                                                    echo "Miễn phí";
                                                } else {
                                                    echo $value['price'] ?>
                                                    <i
                                                        class="fab fa-bitcoin"></i>
                                                <?php } ?>

                                            </strong>
                                        <li
                                            class="w-100 mb-1 limit-text-1">
                                            <strong>Tác giả:
                                                <?php echo $value['tac_gia'] ?>
                                            </strong>
                                        </li>

                                        <li class="w-100"><strong>Số lượt
                                                tải font: </strong>
                                            <?php echo rand(5, 100) ?>
                                        </li>
                                    </ul>
                                </div>
                                <div
                                    class="font-item__button text-center">
                                    <?php
                                    if (!empty($_SESSION['userinfo'])) {
                                        ?>
                                        <div
                                            class="font-item__button text-center">
                                            <a onclick="FunctionDownload(<?php echo $value['id_font'] ?>)"
                                                class=" d-block btn-call-popup"
                                                data-isvip="false">TẢI FONT
                                                NÀY NGAY</a>
                                        </div>
                                        <?php

                                    } else {
                                        ?>
                                        <div
                                            class="font-item__button text-center">
                                            <a onclick="FunctionLogin()"
                                                class=" d-block btn-call-popup"
                                                data-isvip="false">TẢI FONT
                                                NÀY NGAY</a>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                    <?php } ?>
                </div>
                <div class="fetch-btn-more text-center">
                    <button class="btn w-auto btn-more-font">Xem
                        thêm</button>
                </div>
            </div>
        </div>
    </div>
</section>