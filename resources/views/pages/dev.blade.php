@extends('layout.admin')

@section('content')

Devs de test

<?php 
foreach ($datas as $key => $value){

	echo $key." => ".$value."<br/>";

}
?>

@endsection


@section('scripts')

	<script type="text/javascript">
		$( document ).ready(function() {

		});
	</script>

@endsection