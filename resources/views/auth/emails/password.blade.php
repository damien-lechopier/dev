
<p style="font-weight:bold;">{{ trans('auth.password.vous_avez_demande') }}</p>

<p>
 <a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ trans('auth.password.click_here_to_regenerate') }}</a>  
 ou copiez/collez ce lien dans votre navigateur : <br/> 
  <a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a>
</p>