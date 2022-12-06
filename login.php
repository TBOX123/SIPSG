<?= $this->extend('auth/template') ?>

<?= $this->section('content') ?><main>

	<div class="container">



		<div class="card-header">
			<h3 class="text-center font-weight-light my-4"><?= lang('Auth.loginTitle') ?></h3>
		</div>
		<div class="card-body">
			<?= view('Myth\Auth\Views\_message_block') ?>
			<form action="<?= route_to('login') ?>" method="POST">

				<div class="form-floating mb-3">
					<?php if ($config->validFields === ['email']) : ?>
						<div class="form-group">
							<label for="login"><?= lang('Auth.email') ?></label>
							<input type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>">
							<div class="invalid-feedback">
								<?= session('errors.login') ?>
							</div>
						</div>
					<?php else : ?>
						<div class="form-group">
							<label for="login"><?= lang('Auth.emailOrUsername') ?></label>
							<input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
							<div class="invalid-feedback">
								<?= session('errors.login') ?>
							</div>
						</div>
					<?php endif; ?>
				</div>
				<div class="form-floating mb-3">
					<div class="form-group">
						<label for="password"><?= lang('Auth.password') ?></label>
						<input type="password" name="password" class="form-control  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>">
						<div class="invalid-feedback">
							<?= session('errors.password') ?>
						</div>
					</div>

					<?php if ($config->allowRemembering) : ?>
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
								<?= lang('Auth.rememberMe') ?>
							</label>
						</div>
					<?php endif; ?>
				</div>

				<button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.loginAction') ?></button>

				<?php if ($config->activeResetter) : ?>
					<p><a href="<?= route_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a></p>
				<?php endif; ?>
				<div class="d-flex align-items-center justify-content-between mt-4 mb-0">
					<a class="small" href=" <?= route_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a>


				</div>
			</form>



		</div>
	</div>
	</div>
	</div>
	</div>
</main>

<?= $this->endSection() ?>