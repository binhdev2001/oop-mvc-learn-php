</div>
</main>
<footer class="footer">
    <div class="footer__main">
    </div>
    <div class="footer__copyrighter text-center py-3">
        © 2023 WEB DEMO MVC</div>
</footer>

<script
    src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript">
    // ================Hàm dowload font cate id==================
    function FunctionDownload(FontID) {
        var data = new FormData();
        var user_id = $('#user_id').val();
        data.append('action', 'download_font');
        data.append('id_font', FontID);
        data.append('user_id', user_id);
        var ajax_url = '<?php echo siteUrl ?>/download-font';
        $.ajax({
            type: 'POST',
            url: ajax_url,
            data: data,
            contentType: false,
            processData: false,
            success: function (response) {

                window.location.replace("<?php echo siteUrl ?>/download-font")



            },
            error: function (error) {
                progress.innerText = 'Error: ' + error.status;
            }
        });


    };


    // ================Hàm  show poup Login==================
    function FunctionLogin() {

        jQuery(function ($) {
            alert("Bạn cần đăng ký và đăng nhập để tải font");

        })
    }
    // ================Kết thúc show poup loginn==================
</script>

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

</body>

</html>