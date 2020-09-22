@extends('layouts.app')

@section('content')

<div class="container">
	<nav aria-label="breadcrumb">
    	<ol class="breadcrumb">
        	<li class="breadcrumb-item"><a href="/home">Home</a>
			</li>
        	<li class="breadcrumb-item active" aria-current="
			page">Account</li>
    	</ol>
	</nav>
    
    <h3>@lang('lang.my_account')</h3>
    <div class="card" style="width:80%;">
    	<div class="card-header">
    		@lang('lang.my_details')
    	</div>
    	<div class="card-body">
    		<p>@lang('lang.username') {{auth::user()->name}}</p>
    	</div>
    </div>
    <div class="card" style="width:80%;">
    	<div class="card-header">
    		@lang('lang.change_pass')
    	</div>
    	<div class="card-body">
    		<form>
    			@lang('lang.old_pass')<br>
    			<input type="password" name="old_pass"><br>
    			@lang('lang.new_pass')<br>
    			<input type="password" name="new_pass"><br>
    			@lang('lang.conf_pass')<br>
    			<input type="password" name="conf_pass"><br><br>
    			<input type="submit" value="@lang('lang.update_pass')" name="submit_pass">
    		</form>
    	</div>
    </div>
</div>
@endsection