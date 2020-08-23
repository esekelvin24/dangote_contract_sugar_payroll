@extends('layouts.dashboard', ['menu_header' => $menu_header,'parent' => $parent])

@section('content')

<br/>
<br/>
<br/>
<div class="auth-form  ml-auto mr-auto no-float">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="mb-30">
                    <span class="block error-head text-center txt-info mb-10">403</span>
                    <span class="text-center nonecase-font mb-20 block error-comment">Oops! Not authorized</span>
                    <p class="text-center">You are not authorize to view this resource.</p>
                </div>	
            </div>	
        </div>
    </div>






@endsection 