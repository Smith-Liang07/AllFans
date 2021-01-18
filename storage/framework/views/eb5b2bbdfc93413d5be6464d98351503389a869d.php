<div class="container">

<div class="row tpadding-20">
  <div class="col-md-6">

    <h2 class="register-heading">Create an Account</h2>
    <div class="panel panel-default">
      <div class="panel-body nopadding">

        <div class="login-bottom">

          <ul class="signup-errors text-danger list-unstyled"></ul>

          <form method="POST" class="signup-form" action="<?php echo e(url('/register')); ?>">
            <?php echo e(csrf_field()); ?>





















            <div class="row">
              <div class="col-md-12">
                <fieldset class="form-group required <?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                  <?php echo e(Form::label('email', trans('auth.email_address'))); ?> 
                  <?php echo e(Form::text('email', NULL, ['class' => 'form-control', 'id' => 'email', 'placeholder'=> trans('auth.email_address')])); ?>

                  <?php if($errors->has('email')): ?>
                  <span class="help-block">
                    <?php echo e($errors->first('email')); ?>

                  </span>
                  <?php endif; ?>
                </fieldset>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <fieldset class="form-group required <?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                  <?php echo e(Form::label('name', trans('auth.name'))); ?> 
                  <?php echo e(Form::text('name', NULL, ['class' => 'form-control', 'id' => 'name', 'placeholder'=> trans('auth.name')])); ?>

                  <?php if($errors->has('name')): ?>
                  <span class="help-block">
                    <?php echo e($errors->first('name')); ?>

                  </span>
                  <?php endif; ?>
                </fieldset>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <fieldset class="form-group required <?php echo e($errors->has('gender') ? ' has-error' : ''); ?>">
                  <?php echo e(Form::label('gender', trans('common.gender'))); ?>

                  <?php echo e(Form::select('gender', array('female' => 'Female', 'male' => 'Male', 'other' => 'None'), null, ['placeholder' => trans('auth.select_gender'), 'class' => 'form-control'])); ?>

                  <?php if($errors->has('gender')): ?>
                  <span class="help-block">
                    <?php echo e($errors->first('gender')); ?>

                  </span>
                  <?php endif; ?>
                </fieldset>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <fieldset class="form-group required <?php echo e($errors->has('username') ? ' has-error' : ''); ?>">
                  <?php echo e(Form::label('username', trans('common.username'))); ?> 
                  <?php echo e(Form::text('username', NULL, ['class' => 'form-control', 'id' => 'username', 'placeholder'=> trans('common.username')])); ?>

                  <?php if($errors->has('username')): ?>
                  <span class="help-block">
                    <?php echo e($errors->first('username')); ?>

                  </span>
                  <?php endif; ?>
                <small class="text-muted"><a href="<?php echo e(url('/')); ?>"><?php echo e(url('/')); ?>/username</a></small>
                </fieldset>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-12">
                <fieldset class="form-group required <?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                  <?php echo e(Form::label('password', trans('auth.password'))); ?> 
                  <?php echo e(Form::password('password', ['class' => 'form-control', 'id' => 'password', 'placeholder'=> trans('auth.password')])); ?>

                  <?php if($errors->has('password')): ?>
                  <span class="help-block">
                    <?php echo e($errors->first('password')); ?>

                  </span>
                  <?php endif; ?>
                </fieldset>
              </div>
            </div>

            <div class="row">

























            </div>

            <div class="row">
              <?php if(Setting::get('captcha') == "on"): ?>
              <div class="col-md-12">
                <fieldset class="form-group<?php echo e($errors->has('captcha_error') ? ' has-error' : ''); ?>">
                  <?php echo app('captcha')->display(); ?>

                  <?php if($errors->has('captcha_error')): ?>
                  <span class="help-block">
                    <?php echo e($errors->first('captcha_error')); ?>

                  </span>
                  <?php endif; ?>
                </fieldset>
              </div>    
              <?php endif; ?>    
            </div>

            <?php echo e(Form::button(trans('auth.signup_to_dashboard'), ['type' => 'submit','class' => 'btn btn-success btn-submit'])); ?>

            <a href="/login" class="btn btn-success" style="margin-top: 10px"><?php echo e(trans('common.signin')); ?></a>
          </form>
        </div>  
        <?php if(config('services.google.client_id') != NULL && config('services.google.client_secret') ||
          config('services.twitter.client_id') != NULL && config('services.twitter.client_secret') ||
          config('services.facebook.client_id') != NULL && config('services.facebook.client_secret') ||
          config('services.linkedin.client_id') != NULL && config('services.linkedin.client_secret') ): ?>
          <div class="divider-login">
            <div class="divider-text"> <?php echo e(trans('auth.login_via_social_networks')); ?></div>
          </div>
          <?php endif; ?>
          <ul class="list-inline social-connect">


            <li><a href="<?php echo e(url('twitter')); ?>" class="btn btn-social tw"><span class="social-circle"><i class="fa fa-twitter" aria-hidden="true"></i></span></a></li>



            <li><a href="<?php echo e(url('facebook')); ?>" class="btn btn-social fb"><span class="social-circle"><i class="fa fa-facebook" aria-hidden="true"></i></span></a></li>





          </ul>
        </div>
      </div><!-- /panel -->
    </div>
    
  </div><!-- /row -->
</div><!-- /container -->
<?php echo Theme::asset()->container('footer')->usePath()->add('app', 'js/app.js'); ?>