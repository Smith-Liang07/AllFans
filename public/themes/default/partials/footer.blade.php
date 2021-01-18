<!-- Modal starts here-->
<div class="modal fade" id="usersModal" tabindex="-1" role="dialog" aria-labelledby="usersModalLabel">
    <div class="modal-dialog modal-likes" role="document">
        <div class="modal-content">
        	<i class="fa fa-spinner fa-spin"></i>
        </div>
    </div>
</div>
<div class="col-md-12">
	<div class="footer-description">
		<div class="row" style="margin-bottom: 60px">
			<span class="col-sm-2 col-2 col-lg-2 col-xs-2"></span>
			<a href="{{url('/faq')}}" class="col-sm-2 col-2 col-lg-2 col-xs-2">FAQ</a>
			<a href="{{url('support')}}" class="col-sm-2 col-2 col-lg-2 col-xs-2">Support</a>
			<a href="{{url('termsOfUse')}}" class="col-sm-2 col-2 col-lg-2 col-xs-2">Terms of Use</a>
			<a href="{{url('privacyPolicy')}}" class="col-sm-2 col-2 col-lg-2 col-xs-2">Privacy Policy</a>
		</div>
		<div class="fans-terms text-center" >
		    Copyright &copy; 2020 Fans Platform. All rights reserved.

			<span class="dropdown"  style="margin-left: 20px">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
										<span>
											<?php $key = 'en'; ?>
											@if($key == 'gr')
												<span class="flag-icon flag-icon-gr"></span>
											@elseif($key == 'en')
												<span class="flag-icon flag-icon-us"></span>
											@elseif($key == 'zh')
												<span class="flag-icon flag-icon-cn"></span>
											@else
												<span class="flag-icon flag-icon-{{ $key }}"></span>
											@endif

                                        </span> <i class="fa fa-angle-down" aria-hidden="true"></i></a>
			<ul class="dropdown-menu">
				@foreach( Config::get('app.locales') as $key => $value)
					<li class=""><a href="#" class="switch-language" data-language="{{ $key }}">
							@if($key == 'gr')
								<span class="flag-icon flag-icon-gr"></span>
							@elseif($key == 'en')
								<span class="flag-icon flag-icon-us"></span>
							@elseif($key == 'zh')
								<span class="flag-icon flag-icon-cn"></span>
							@else
								<span class="flag-icon flag-icon-{{ $key }}"></span>
							@endif

							{{ $value }}</a></li>
				@endforeach
			</ul></span>
		</div>
		</div>
	</div>
</div>

{!! Theme::asset()->container('footer')->usePath()->add('app', 'js/app.js') !!}

{{--{!! Theme::asset()->container('footer')->usePath()->add('jquery-js', 'js/jquery.min.js') !!}--}}
{{--{!! Theme::asset()->container('footer')->usePath()->add('bootstrap-js', 'js/bootstrap/bootstrap.min.js') !!}--}}