<!-- Modal -->
<div class="modal fade" id="auth_modal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="padding:20px 30px;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4><span class="glyphicon glyphicon-lock"></span> {{ trans('auth_modal.title') }}</h4>
                <p>{!! trans('auth_modal.info_old_client') !!}</p>
            </div>
            <div class="modal-body" style="padding:20px 30px;">
                <form role="form" method="POST" action="{{ url('/auth/modal/login') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" id="requested_id" name="id" value="">
                    <input type="hidden" id="requested_ref" name="ref" value="@if(isset($product)){{ $product->id }}@endif">
                    <input type="hidden" id="requested_file_id" name="file_id" value="">
                    <input type="hidden" id="requested_file_name" name="file_name" value="">
                    <div class="input-group">
                        <label for=email><span
                                    class="glyphicon glyphicon-user"></span> {{ trans('auth_modal.username') }}</label>
                        <input type="text" name="email" class="form-control" id="email"
                               placeholder="{{ trans('auth_modal.username_placeholder') }}" required>
                    </div>
                    <br style="clear:both;"/>
                    <div class="input-group">
                        <label for="password"><span
                                    class="glyphicon glyphicon-lock"></span> {{ trans('auth_modal.password') }}</label>
                        <input type="password" name="password" class="form-control" id="password"
                               placeholder="{{ trans('auth_modal.password_placeholder') }}" required>
                    </div>
                    <br style="clear:both;"/>
                    <button type="submit" class="btn btn-primary" style="width:300px"><i
                                class="glyphicon glyphicon-off"></i> {{ trans('auth_modal.login') }}</button>
                </form>
            </div>
            <div class="modal-footer">
            	<?php /*
                <button type="submit" class="btn btn-default pull-left" data-dismiss="modal" style="width:150px;"><i
                            class="glyphicon glyphicon-remove"></i> {{ trans('auth_modal.cancel') }}</button>
                */ ?>     
                <button type="submit" class="btn btn-default pull-left fancybox fancybox.iframe" style="width:200px;" href="{{ url(App::getLocale().'/password/reset') }}"><i class="glyphicon glyphicon-exclamation-sign"></i> {{ trans('auth_modal.forgot_password') }}</button>
                <a type="button" class="btn btn-default pull-right" style="width:150px;"
                   href="{{ route('register.index') }}"><i
                            class="glyphicon glyphicon glyphicon-floppy-saved"></i> {{ trans('auth_modal.signup') }}
                </a>
            
                
            </div>
        </div>

    </div>
</div>