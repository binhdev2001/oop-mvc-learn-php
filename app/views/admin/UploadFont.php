<link href="<?php echo siteUrl ?>/public/admin/css/uploadfile.css"
  rel="stylesheet" type="text/css">
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div
    class="d-sm-flex align-items-center justify-content-between mb-4 mt-3">
    <h1 class="h3 mb-0 text-gray-800">Upload Font</h1>
    <a href="#"
      class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-download fa-sm text-white-50"></i>
      Generate Report</a>
  </div>

  <!-- Content Row -->
  <!-- Content Row -->
  <div class="row">
    <div class="col-8 mb-8">
      <div class="upload-font-box">
        <form id="acf-form" class="acf-form" method="post"
          enctype=" multipart/form-data">
          <div id="acf-form-data" class="acf-hidden">
            <input type="hidden" id="_acf_screen" name="_acf_screen"
              value="acf_form"><input type="hidden" id="_acf_post_id"
              name="_acf_post_id" value="new_post">
          </div>
          <div class="acf-fields acf-form-fields-top">
            <div
              class="acf-field acf-field-text acf-field--post-title is-required"
              data-name="_post_title" data-type="text"
              data-key="_post_title" data-required="1">
              <div class="acf-label">
                <label for="acf_post_title">Tiêu đề
                  <span class="acf-required">*</span>
                  <p class="jk-desc">
                    <strong>Cách đặt tiêu
                      đề:</strong>Font việt
                    hoá+Tên font<br><strong>Ví dụ:
                    </strong>Font việt hóa
                    Goatskin Brush
                  </p>
                </label>
                <div class="hidden msg msg_acf_post_title">
                  <p><strong>⛔ Cảnh báo !
                    </strong>Vui lòng nhập tên
                    font !</p>
                </div>
              </div>
              <div class="acf-input">
                <div class="acf-input-wrap"><input type="text"
                    id="acf_post_title" name="acf_post_title"></div>
              </div>
            </div>
            <div
              class="acf-field acf-field-text acf-field--post-title is-required"
              data-name="_post_title">
              <div class="acf-label">
                <label for="acf_post_price">Giá
                  <span class="acf-required">*</span>
                </label>
                <div class="hidden msg msg_acf_price">
                  <p><strong>⛔ Cảnh báo !
                    </strong>Vui lòng nhập giá
                    font !</p>
                </div>
              </div>
              <div class="acf-input">
                <div class="acf-input-wrap"><input type="number"
                    id="acf_post_price" name="acf_post_price" min="1">
                </div>
              </div>
            </div>
            <div
              class="acf-field acf-field-taxonomy acf-field-620f625df437e is-required"
              data-name="font_categories" data-type="taxonomy"
              data-key="field_620f625df437e" data-required="1">
              <div class="acf-label">
                <label for="acf-field_620f625df437e">Danh
                  mục <span class="acf-required">*</span></label>
              </div>
              <div class="hidden msg_cate_id">
                <p><strong>⛔ Cảnh báo ! </strong>Bạn chưa chọn danh
                  mục !</p>
              </div>
              <div class="acf-input">
                <div class="acf-taxonomy-field" data-save="1"
                  data-ftype="checkbox" data-taxonomy="danh-muc-font"
                  data-allow_null="0">

                  <div class="categorychecklist-holder">
                    <ul class="acf-checkbox-list acf-bl">

                      <?php
                      $cate_arr = $data['cate_font'];
                      $new_cate_arr = array();
                      // add them chidren arr vao new_arrr
                      foreach ($cate_arr as $key => $value) {
                        $new_cate_arr[$value['id']] = array_unique($value);
                        $new_cate_arr[$value['id']]['children'] = array();
                      }

                      // add them mang con vao mang cha
                      foreach ($new_cate_arr as $key => &$value) {
                        if (isset($new_cate_arr[$key]['parent_id'])) {
                          $parent = $new_cate_arr[$key]['parent_id'];
                          // neu co bien #parrent moi run-> if
                      
                          $new_cate_arr[$parent]['children'][] = &$new_cate_arr[$key];


                        }
                      }
                      foreach ($new_cate_arr as $key => $value) {
                        if (!isset($value['parent_id'])) {
                          ?>
                          <li id="input_cate_<?php echo $value['id'] ?>">
                            <label>
                              <input type="checkbox" name="field_cate_id"
                                value="<?php echo $value['id'] ?> ">
                              <span>
                                <?php echo $value['value'] ?>
                              </span>
                            </label>
                            <ul class="children acf-bl pl-3"
                              id="children_input_<?php echo $value['id'] ?>  ">
                              <?php if ($value['children'] > 0) {
                                foreach ($value['children'] as $k => $val) {
                                  ?>


                                  <li data-id="29">
                                    <label>
                                      <input type="checkbox"
                                        name="field_cate_id"
                                        value="<?php echo $val['id'] ?>">
                                      <span>
                                        <?php echo $val['value'] ?>
                                      </span>
                                    </label>
                                  </li>

                                  <?php
                                }
                              }
                              ?>
                              <?php
                        }
                      }
                      ?>
                        </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div
            class="acf-field acf-field-text acf-field-6203694e97c73"
            data-name="font_author" data-type="text"
            data-key="field_6203694e97c73">
            <div class="acf-label">
              <label for="acf-field_6203694e97c73">Tác
                giả</label>
            </div>
            <div class="hidden msg msg_font_author">
              <p><strong>⛔ Cảnh báo !
                </strong>Vui lòng nhập tên tác
                giả !</p>
            </div>
            <div class="acf-input">
              <div class="acf-input-wrap"><input type="text"
                  id="font_author" name="acf[field_6203694e97c73]">
              </div>
            </div>
          </div>
          <div
            class="acf-field acf-field-text acf-field-6203696097c74 is-required"
            data-name="font_source" data-type="text"
            data-key="field_6203696097c74" data-required="1">
            <div class="acf-label">
              <label for="acf-field_6203696097c74">Việt
                hóa bởi <span class="acf-required">*</span></label>
            </div>
            <div class="hidden msg msg_team_viet_hoa">
              <p><strong>⛔ Cảnh báo !
                </strong>Vui lòng nhập thông
                tin người việt hóa!</p>
            </div>
            <div class="acf-input">
              <div class="acf-input-wrap"><input type="text"
                  id="team-viet-hoa" name="acf[field_6203696097c74]"
                  required="required" fdprocessedid="cb9vh">
              </div>
            </div>
          </div>


          <div class="acf-form-submit p-3" id="btnSubmit">
            <input type="submit"
              class="acf-button button button-primary button-large"
              value="Đăng bài">
          </div>
      </div>
      </form>
    </div>
    <div class="col-4 ">
      <div
        class="acf-field acf-field-image acf-field-621060349e873 is-required"
        data-name="font_thumbnail" data-type="image"
        data-key="field_621060349e873" data-required="1">
        <div class="acf-label">
          <label for="acf-field_621060349e873">Ảnh đại
            diện <span class="acf-required">*</span></label>
        </div>
        <div class="hidden msg msg_img">
          <p><strong>⛔ Cảnh báo ! </strong>Bạn chưa chọn
            ảnh dại diện cho font !</p>
        </div>
        <div class="acf-input">
          <form id="acf-form-feature" class="acf-form" method="post"
            enctype=" multipart/form-data">

            <div class="acf-image-uploader"
              data-preview_size="thumbnail" data-library="all"
              data-mime_types="" data-uploader="wp">

              <div class="form-group">
                <p>
                  <img
                    src="<?php echo siteUrl ?>/public/admin/img/thumb-temp.svg"
                    id="output_avatar" alt="..." class="img-thumbnail"
                    alt="150x1500"
                    style="width: 350px; height: 200px;">
                </p>
              </div>
              <div class="hide-if-value">
                <p><input class="input-file "
                    id="file-feature-uploader" accept="image/*"
                    name="file-feature-uploader" type="file"
                    class="file" onchange="loadFile(event)">
                </p>

              </div>
            </div>
          </form>
        </div>
      </div>

      <div
        class="acf-field acf-field-file acf-field-6203697897c75 is-required"
        data-name="font_upload" data-type="file"
        data-key="field_6203697897c75" data-required="1">
        <div class="acf-label">
          <label for="acf-field_6203697897c75">Font tải
            lên <span class="acf-required">*</span></label>
          <div class="hidden msg msg_file">
            <p><strong>⛔ Cảnh báo ! </strong>Bạn chưa chọn
              file tải lên !</p>
          </div>
          <p class="description">Có thể tải lên định
            dạng .ttf, .otf hoặc .zip (Nếu nhiều font
            nên nén zip lại)</p>
        </div>
        <div class="acf-input">
          <div class="acf-file-uploader" data-library="all"
            data-mime_types=".zip, .otf, .ttf, .rar"
            data-uploader="wp">
            <input type="hidden" name="acf[field_6203697897c75]"
              value="" data-name="id">
            <div class="show-if-value file-wrap">
              <div class="file-icon">
                <img data-name="icon" src="" alt="">
              </div>
              <div class="file-info">
                <p>
                  <strong data-name="title"></strong>
                </p>
                <p>
                  <strong>File name:</strong>
                  <span id="msgfilename"></span>
                </p>
                <p>
                  <strong>File size:</strong>
                  <span id="msgfilesize"></span>
                </p>
              </div>
              <div class="acf-actions -hover">
                <a class="acf-icon -pencil dark" data-name="edit"
                  href="#" title="Edit"></a>
                <a class="acf-icon -cancel dark" data-name="remove"
                  href="#" title="Remove"></a>
              </div>
            </div>
            <div class="">
              <form>

                <p><input class="input-file" id="file_strim"
                    type="file" accept=".zip,.rar,.7zip,.ttf,.otf"
                    name="file_strim" type="file" class="file">
                </p>
              </form>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->
  <script
    src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script type="text/javascript">
    // ================Xử lý ảnh upload ảnh đại diện ===================
    var loadFile = function (event) {

      var output = document.getElementById('output_avatar');
      output.src = URL.createObjectURL(event.target.files[0]);
      jQuery(function ($) {
        $('#output_avatar').addClass('active-avatar');
      });
    };
    // ================End code Xử lý ảnh  ===================
    // ================Xử lý upaload ảnh đại diện cho font ===================
    jQuery(function ($) {
      $('#file-feature-uploader').change(function (e) {
        var file = document.getElementById('file-feature-uploader');
        var files = file.files;
        var data = new FormData();
        data.append('action', 'up_load_avt_font');
        data.append('file', files[0]);
        var ajax_url = '<?php echo siteUrl ?>/upload-font';
        $.ajax({
          type: 'POST',
          url: ajax_url,
          data: data,
          contentType: false,
          processData: false,
          success: function (response) {
            var result = JSON.parse(response);
            console.log('response: ', result.status);
            if (result.status == 1) {
            } else {
            }

          },
          error: function (error) {
            progress.innerText = 'Error: ' + error.status;
          }
        });
      });
    });
    // ================Xử lý upalod file nén===================
    jQuery(function ($) {
      $('#file_strim').change(function (e) {
        var file = document.getElementById('file_strim');
        var files = file.files;
        var data = new FormData();
        data.append('action', 'up_load_font_archive');
        data.append('file_archive', files[0]);
        var ajax_url = '<?php echo siteUrl ?>/upload-font';
        $.ajax({
          type: 'POST',
          url: ajax_url,
          data: data,
          contentType: false,
          processData: false,
          success: function (response) {
            var result = JSON.parse(response);
            if (result.status == 1) {
              $('#msgfilename').append(result.name);
              $('#msgfilesize').append(result.size + ' MB');
              $('.file-wrap').removeClass('show-if-value');
            } else {

            }

          },
          error: function (error) {
            progress.innerText = 'Error: ' + error.status;
          }
        });
      });
    });
    // ================Xử lý upalod file ===================
    // ================Xử lý thông tin font===================
    jQuery(function ($) {
      $('#btnSubmit').click(function (e) {
        e.preventDefault();
        var acf_post_title = $('#acf_post_title').val();
        console.log("Tieu de bai viet " + acf_post_title);
        var acf_post_price = $('#acf_post_price').val();
        console.log("Gia " + acf_post_price);
        var font_author = $('#font_author').val();
        console.log("Tac gia " + font_author);
        var team_viet_hoa = $('#team-viet-hoa').val();
        console.log("team-viet-hoa " + team_viet_hoa);
        var file_feature_uploader = $('#file-feature-uploader')[0].files[0];
        console.log("file-feature-uploader " + file_feature_uploader);
        var file_strim = $('#file_strim')[0].files[0];
        console.log("file_strim " + file_feature_uploader);
        var cate_id = $('input[name=\'field_cate_id\']:checked:enabled').val();
        console.log("Danh muc " + cate_id);
        var user_id = $('#user_id').val();
        console.log("user_id " + user_id);
        var data = new FormData();
        var check_err = true;
        data.append('action', 'post_data_font_detail');
        data.append('user_id', user_id);
        $('.msg_file').addClass('hidden');
        if (acf_post_price) {
          data.append('acf_post_price', acf_post_price);
          $('.msg_acf_price').addClass('hidden');

        } else {
          $('.msg_acf_price').removeClass('hidden');
          check_err = false;
        }

        if (cate_id) {
          data.append('cate_id', cate_id);
          $('.msg_cate_id').addClass('hidden');
          check_err = true;

        } else {
          $('.msg_cate_id').removeClass('hidden');
          check_err = false;
        }
        if (file_strim) {
          data.append('file_archive', file_strim);
          $('.msg_file').addClass('hidden');
          check_err = true;

        } else {
          $('.msg_file').removeClass('hidden');
          check_err = false;

        }
        if (file_feature_uploader) {
          data.append('file_feature_uploader', file_feature_uploader);
          $('.msg_img').addClass('hidden');

        } else {
          $('.msg_img').removeClass('hidden');
          check_err = false;


        }
        if (acf_post_title) {
          data.append('acf_post_title', acf_post_title);
          $('.msg_acf_post_title').addClass('hidden');

        } else {
          $('.msg_acf_post_title').removeClass('hidden');
          check_err = false;

        }
        if (font_author) {
          data.append('font_author', font_author);
          $('.msg_font_author').addClass('hidden');
          check_err = true;

        } else {
          $('.msg_font_author').removeClass('hidden');
          check_err = false;
        }
        if (team_viet_hoa) {
          data.append('team_viet_hoa', font_author);
          $('.msg_team_viet_hoa').addClass('hidden');
          check_err = true;

        } else {
          $('.msg_team_viet_hoa').removeClass('hidden');
          check_err = false;

        }

        if (check_err == true) {
          console.log('check_err: ', check_err);
          var ajax_url = '<?php echo siteUrl ?>/upload-font';
          $.ajax({
            type: 'POST',
            url: ajax_url,
            data: data,
            contentType: false,
            processData: false,
            beforeSend: function () {
              $('#loader').removeClass('hidden');
            },
            success: function (response) {
              if (response == 1) {
                const myTimeout = setTimeout(myGreeting, 3000);
                function myGreeting() {
                  location.reload();
                }

              } else {
                alert('Có lỗi xảy ra vui lòng load lại trang!!');
              }

            },
            error: function (error) {
              progress.innerText = 'Error: ' + error.status;
            }
          });
        } else {
          console.log('check_err: ', check_err);
        }

      });
    });
    // ================Xử lý thông tin font===================
  </script>