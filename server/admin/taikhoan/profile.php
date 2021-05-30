<div class="profile-usertitle">
				<div class="profile-usertitle-name">
					<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])): ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<div class="profile_info">
			<img src="../Images/user.jpg" class="img-responsive" width="50px;" height="50px;">

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

				<?php endif ?>
			</div>
		</div>
	</div>
				</div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>