<main class="main account">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 mb-md-4 mb-sm-4">
				<div class="account__user text-center">
					<div class="avatar-box position-relative">
						<img class="avatar"
							src="https://www.shareicon.net/data/512x512/2017/01/06/868320_people_512x512.png"
							width="96" height="96">
						<div id="avatar_loading" style="display:none"
							class="loading-process position-absolute align-items-center justify-content-center top-50 start-50 translate-middle">
							<div class="spinner-border text-light"
								role="status">
								<span
									class="visually-hidden">Loading...</span>
							</div>
						</div>
					</div>
					<div class="account__content">

						<h4>Xin chào <strong>
								<?php
								echo $_SESSION['userinfo']['display_name'];

								?>
							</strong></h4>
					</div>
				</div>
				<div class="account__cat">
					<ul class="list-unstyled mb-0">
						<li>
							<a href="<?php echo siteUrl ?>/thong-bao"
								class="d-block">
								Thông báo
							</a>
						</li>
						<li>
							<a href="<?php echo siteUrl ?>/quan-ly-tai-khoan"
								class="d-block active">
								Quản lý tài khoản
							</a>
						</li>
						<li>
							<a href="<?php echo siteUrl ?>/font-yeu-thich"
								class="d-block">
								Quản lý font yêu thích
							</a>
						</li>
						<li>
							<a href="<?php echo siteUrl ?>/font-tai-len"
								class="d-block">
								Font bạn đã tải lên
							</a>
						</li>
						<li>

							<form method="POST" class="account__btn">
								<button class="account__btn"
									type=" submit" name="logout_user"
									value="Logout">Đăng
									xuất</button>
							</form>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-lg-9">
				<div class="account__form">
					<form id="form_account">
						<input type="hidden" id="_wpnonce"
							name="_wpnonce" value="c7c984a9b4"><input
							type="hidden" name="_wp_http_referer"
							value="/quan-ly-tai-khoan/"> <input
							type="hidden" name="user_id"
							value="16273">
						<div class="mb-3">
							<label for="fullname"
								class="form-label mb-0">Họ và
								tên</label>
							<input type="text" class="form-control"
								id="fullname" name="fullname"
								placeholder="Nguyễn Văn A"
								value="Nguyễn Phương Bình">
						</div>
						<div class="mb-3">
							<label for="email"
								class="form-label mb-0">Địa chỉ
								email</label>
							<input type="email" class="form-control"
								id="email" name="email"
								placeholder="nguyenvana00@gmail.com"
								value="nbinh6538@gmail.com"
								disabled="">
						</div>
						<h3 class="mt-4 mb-3">Thay đổi mật khẩu</h3>
						<div class="mb-3">
							<label for="current_pwd"
								class="form-label mb-0">Mật khẩu hiện
								tại (bỏ trống nếu không đổi)</label>
							<div
								class="input-form position-relative input-pwd">
								<input type="password"
									class="form-control"
									id="current_pwd"
									name="current_pwd">
								<a class="show-pwd" href="#"><i
										class="far fa-eye"></i></a>
								<small
									class="current_pwd_error"></small>
							</div>
						</div>
						<div class="mb-3">
							<label for="new_pwd"
								class="form-label mb-0">Mật khẩu mới
								(bỏ trống nếu không đổi)</label>
							<div
								class="input-form position-relative input-pwd">
								<input type="password"
									class="form-control" id="new_pwd"
									name="new_pwd">
								<a class="show-pwd" href="#"><i
										class="far fa-eye"></i></a>
								<small class="new_pwd_error"></small>
							</div>
						</div>
						<div class="mb-3">
							<label for="confirm_pwd"
								class="form-label mb-0">Xác nhận mật
								khẩu mới</label>
							<div
								class="input-form position-relative input-pwd">
								<input type="password"
									class="form-control"
									id="confirm_pwd"
									name="confirm_pwd">
								<a class="show-pwd" href="#"><i
										class="far fa-eye"></i></a>
								<small
									class="confirm_pwd_error"></small>
							</div>
						</div>
						<div class="text-center">
							<button id="submit" type="submit"
								class="btn d-inline-flex align-items-center mb-2">Lưu
								thay đổi</button>
							<small class="form_notif d-block"></small>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</main>