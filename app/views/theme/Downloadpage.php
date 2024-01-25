<section class="section-fontqcaoz">
	<div class="container">
		<section class="section-fontqcaoz">
			<div class="container">
				<div class="section-fontqcaoz--item position-relative"
					style="padding: 10px 0px;">
					<a target="_blank"
						href="<?php echo siteUrl ?>/thong-tin-tai-khoan"
						class="d-inline-block w-100">
						<img src="https://fonttiengviet.com/wp-content/uploads/2023/09/dangkythanhvien1.jpg"
							class="w-100">
					</a>
				</div>
			</div>

		<div class="section-fontqcaoz__middle">

			<p class="text-center mb-0">Chào bạn <b>					<?php
								echo $_SESSION['userinfo']['display_name'];

								?></b>.&nbsp;Vui lòng chờ, đang tạo file
				download trong <strong id="countdown">6</strong> giây
			</p>
			<p class="text-center mb-0">
				<b>Lưu ý:</b> Font này chỉ sử dụng cho mục đích cá
				nhân. Sử dụng cho mục đích thương mại nên mua bản
				quyền gốc từ tác giả.
			</p>

			<div id="download" class="text-center mt-3"></div>
		</div>

		<div class="row">
			<div class="container">
				<div class="section-fontqcaoz--item position-relative"
					style="padding: 10px 0px;">
					<a target="_blank"
						href="<?php echo siteUrl ?>/thong-tin-tai-khoan"
						class="d-inline-block w-100">
						<img src="https://www.wordstream.com/wp-content/uploads/2021/07/google-display-ads-example-2-final.png"
							class="w-100">
					</a>
				</div>
			</div>
		</div>
	</div>
</section>

<script type="text/javascript">
	var timer2 = "0:06";
	var interval = setInterval(function () {
		var timer = timer2.split(':');
		//by parsing integer, I avoid all extra string processing
		var minutes = parseInt(timer[0], 10);
		var seconds = parseInt(timer[1], 10);
		--seconds;
		if (seconds == 0) {
			console.log(seconds);
			clearInterval(interval);
			var data = new FormData();
			data.append('action', 'download_font');
			var ajax_url = '<?php echo siteUrl ?>/tai-xuong';
			$.ajax({
				type: 'POST',
				url: ajax_url,
				data: data,
				contentType: false,
				processData: false,
				success: function (response) {

					window.location.replace("<?php echo siteUrl ?>/tai-xuong")



				},
				error: function (error) {
					progress.innerText = 'Error: ' + error.status;
				}
			});

		}
		$('#countdown').html(seconds);
		timer2 = minutes + ':' + seconds;
	}, 1000);


</script>