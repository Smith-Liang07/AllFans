<!-- main-section -->
<!-- <div class="main-content"> -->
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="post-filters">
					{!! Theme::partial('usermenu-settings') !!}
				</div>
			</div>
			<div class="col-md-8">
				<div class="panel panel-default">
				
					<div class="panel-heading no-bg panel-settings">
						@include('flash::message')
						<h3 class="panel-title">
							Add Payment Method
						</h3>
					</div>
					<div class="panel-body nopadding">
						<div class="fans-form">
							<form method="POST" action="{{ url('/'.$username.'/settings/save-payment-details') }}">
								{{ csrf_field() }}
								
								<div class="row">
									<div class="col-md-6">
										<fieldset class="form-group required {{ $errors->has('card_name') ? ' has-error' : '' }}">
											{{ Form::label('card_name', trans('Name on Card')) }}
											{{ Form::text('card_name', Auth::user()->name, ['class' => 'form-control', 'placeholder' => trans('Name on Card')]) }}
											@if ($errors->has('card_name'))
											<span class="help-block">
												{{ $errors->first('card_name') }}
											</span>
											@endif
										</fieldset>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<fieldset class="form-group required  {{ $errors->has('cvv') ? ' has-error' : '' }}">
											{{ Form::label('card_number', trans('Card Number')) }}
											@if(Auth::user()->is_payment_set == true)
												{{ Form::text('card_number', Auth::user()->payment()->first()->card_number, array('class' => 'form-control', 'placeholder' => trans('Card Number'))) }}
											@else
												{{ Form::text('card_number', '', array('class' => 'form-control', 'placeholder' => trans('Card Number'))) }}
											@endif
											@if ($errors->has('card_number'))
												<span class="help-block">
												{{ $errors->first('card_number') }}
											</span>
											@endif
										</fieldset>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-3">
										<fieldset class="form-group required {{ $errors->has('cvv') ? ' has-error' : '' }} ">
											{{ Form::label('exp_mm', trans('Expiration Month')) }}
											@if(Auth::user()->is_payment_set == true)
												{{ Form::text('exp_mm', Auth::user()->payment()->first()->exp_mm, array('class' => 'form-control', 'placeholder' => trans('MM'))) }}
											@else
												{{ Form::text('exp_mm', '', array('class' => 'form-control', 'placeholder' => trans('MM'))) }}
											@endif
											@if ($errors->has('exp_mm'))
												<span class="help-block">
												{{ $errors->first('exp_mm') }}
											</span>
											@endif
										</fieldset>
									</div>
									<div class="col-md-3">
										<fieldset class="form-group required {{ $errors->has('cvv') ? ' has-error' : '' }}">
											{{ Form::label('exp_yyyy', trans('Expiration Year')) }}
											@if(Auth::user()->is_payment_set == true)
												{{ Form::text('exp_yyyy', Auth::user()->payment()->first()->exp_yy, array('class' => 'form-control', 'placeholder' => trans('YYYY'))) }}
											@else
												{{ Form::text('exp_yyyy', '', array('class' => 'form-control', 'placeholder' => trans('YYYY'))) }}
											@endif
											@if ($errors->has('exp_yyyy'))
												<span class="help-block">
												{{ $errors->first('exp_yyyy') }}
											</span>
											@endif
										</fieldset>
									</div>
									<div class="col-md-3">
										<fieldset class="form-group required  {{ $errors->has('cvv') ? ' has-error' : '' }}">
											{{ Form::label('cvv', trans('CVV')) }}
											@if(Auth::user()->is_payment_set == true)
												{{ Form::text('cvv', Auth::user()->payment()->first()->cvv, array('class' => 'form-control', 'placeholder' => trans('CVV'))) }}
											@else
												{{ Form::text('cvv', '', array('class' => 'form-control', 'placeholder' => trans('CVV'))) }}
											@endif
											@if ($errors->has('cvv'))
												<span class="help-block">
												{{ $errors->first('cvv') }}
											</span>
											@endif
										</fieldset>
									</div>									
								</div>
								
								<div class="row">
									<div class="col-md-6">
										<fieldset class="form-group">
											{{ Form::label('billing_address', trans('Billing Street Address')) }}
											@if(Auth::user()->is_payment_set == true)
												{{ Form::text('billing_address', Auth::user()->payment()->first()->billing_address, ['class' => 'form-control', 'placeholder' => trans('Billing Street Address')]) }}
											@else
												{{ Form::text('billing_address', '', ['class' => 'form-control', 'placeholder' => trans('Billing Street Address')]) }}
											@endif
										</fieldset>
									</div>
									<div class="col-md-6">
										<fieldset class="form-group">
											{{ Form::label('billing_city', trans('City')) }}
											@if(Auth::user()->is_payment_set == true)
												{{ Form::text('billing_city', Auth::user()->payment()->first()->billing_city, ['class' => 'form-control', 'placeholder' => trans('City')]) }}
											@else
												{{ Form::text('billing_city', '', ['class' => 'form-control', 'placeholder' => trans('City')]) }}
											@endif
										</fieldset>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<fieldset class="form-group">
											{{ Form::label('billing_state', trans('State/Province')) }}
											@if(Auth::user()->is_payment_set == true)
												{{ Form::text('billing_state', Auth::user()->payment()->first()->billing_state, ['class' => 'form-control', 'placeholder' => trans('State/Province')]) }}
											@else
												{{ Form::text('billing_state', '', ['class' => 'form-control', 'placeholder' => trans('State/Province')]) }}
											@endif
										</fieldset>
									</div>
									<div class="col-md-6">
										<fieldset class="form-group">
											{{ Form::label('billing_zip', trans('Zip/Postal Code')) }}
											@if(Auth::user()->is_payment_set == true)
												{{ Form::text('billing_zip', Auth::user()->payment()->first()->billing_zip, ['class' => 'form-control', 'placeholder' => trans('Zip/Postal Code')]) }}
											@else
												{{ Form::text('billing_zip', '', ['class' => 'form-control', 'placeholder' => trans('Zip/Postal Code')]) }}
											@endif
										</fieldset>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-10">
										<fieldset class="form-group {{ $errors->has('cvv') ? ' has-error' : '' }}">
											{{ Form::checkbox('subscribe_content_confirm', 'Yes') }}
											{{ Form::label('subscribe_content_confirm',trans('Yes, I am at least 18 years old and confirm use of my card for transactions.')) }}
										</fieldset>
										@if ($errors->has('subscribe_content_confirm'))
											<span class="help-block">
												{{ $errors->first('subscribe_content_confirm') }}
											</span>
										@endif
									</div>
								</div>
									
									@if(Setting::get('custom_option1') != NULL || Setting::get('custom_option2') != NULL)
										<div class="row">
											@if(Setting::get('custom_option1') != NULL)
											<div class="col-md-6">
												<fieldset class="form-group">
													{{ Form::label('custom_option1', Setting::get('custom_option1')) }}
													{{ Form::text('custom_option1', Auth::user()->custom_option1, ['class' => 'form-control']) }}
												</fieldset>
											</div>
											@endif

											@if(Setting::get('custom_option2') != NULL)
											<div class="col-md-6">
												<fieldset class="form-group">
													{{ Form::label('custom_option2', Setting::get('custom_option2')) }}
													{{ Form::text('custom_option2', Auth::user()->custom_option2, ['class' => 'form-control']) }}
												</fieldset>
											</div>
											@endif
										</div>
									@endif

									@if(Setting::get('custom_option3') != NULL || Setting::get('custom_option4') != NULL)
										<div class="row">
											@if(Setting::get('custom_option3') != NULL)
											<div class="col-md-6">
												<fieldset class="form-group">
													{{ Form::label('custom_option3', Setting::get('custom_option3')) }}
													{{ Form::text('custom_option3', Auth::user()->custom_option3, ['class' => 'form-control']) }}
												</fieldset>
											</div>
											@endif

											@if(Setting::get('custom_option4') != NULL)
											<div class="col-md-6">
												<fieldset class="form-group">
													{{ Form::label('custom_option4', Setting::get('custom_option4')) }}
													{{ Form::text('custom_option4', Auth::user()->custom_option4, ['class' => 'form-control']) }}
												</fieldset>
											</div>
											@endif
										</div>
									@endif


									<div class="pull-right">
										{{ Form::submit(trans('common.save_changes'), ['class' => 'btn btn-success']) }}
									</div>
									<div class="clearfix"></div>
								</form>
							</div>
						</div>
					</div>
					<!-- End of first panel -->

{{--					<div class="panel panel-default">--}}
{{--						<div class="panel-heading no-bg panel-settings">--}}
{{--							<h3 class="panel-title">--}}
{{--								{{ trans('common.update_password') }}--}}
{{--							</h3>--}}
{{--						</div>--}}
{{--						<div class="panel-body nopadding">--}}
{{--							<div class="fans-form">								--}}
{{--								<form method="POST" action="{{ url('/'.Auth::user()->username.'/settings/password/') }}">--}}
{{--									{{ csrf_field() }}--}}

{{--									<div class="row">--}}
{{--										<div class="col-md-6">--}}
{{--											<fieldset class="form-group {{ $errors->has('current_password') ? ' has-error' : '' }}">--}}
{{--												{{ Form::label('current_password', trans('common.current_password')) }}--}}
{{--												<input type="password" class="form-control" id="current_password" name="current_password" value="{{ old('current_password') }}" placeholder= "{{ trans('messages.enter_old_password') }}">--}}

{{--												@if ($errors->has('current_password'))--}}
{{--												<span class="help-block">--}}
{{--													{{ $errors->first('current_password') }}--}}
{{--												</span>--}}
{{--												@endif--}}
{{--											</fieldset>--}}
{{--										</div>--}}
{{--										<div class="col-md-6">--}}
{{--											<fieldset class="form-group {{ $errors->has('new_password') ? ' has-error' : '' }}">--}}
{{--												{{ Form::label('new_password', trans('common.new_password')) }}--}}
{{--												<input type="password" class="form-control" id="new_password" name="new_password" value="{{ old('new_password') }}" placeholder="{{ trans('messages.enter_new_password') }}">--}}

{{--												@if($errors->has('new_password'))--}}
{{--												<span class="help-block">--}}
{{--													{{ $errors->first('new_password') }}--}}
{{--												</span>--}}
{{--												@endif--}}
{{--											</fieldset>--}}
{{--										</div>--}}
{{--									</div>--}}

{{--									<div class="pull-right">--}}
{{--										{{ Form::submit(trans('common.save_password'), ['class' => 'btn btn-success']) }}--}}
{{--									</div>--}}
{{--									<div class="clearfix"></div>--}}
{{--								</form>--}}
{{--							</div>--}}
{{--						</div>--}}
{{--					</div>--}}
					<!-- End of second panel -->

				</div>
			</div><!-- /row -->
		</div>
	<!-- </div> --><!-- /main-content -->
