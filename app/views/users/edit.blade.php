@extends('layouts/master')

@section('content')







@if(!is_null($user))

	<div class="well">
              {{Form::open(array('route'=>['user.update',$user->id],'class'=>'bs-example form-horizontal','method' => 'put'))}}

                <fieldset>
                  <legend>Update Info</legend>


                   <div class="form-group">
                    {{Form::label('username', "Username", $attributes = array('class'=>'col-lg-2 control-label'))}}
                    <div class="col-lg-3">
                      {{Form::text('username', $user->username,$attributes = array('class'=>'form-control','placeholder'=>"Type your username"))}}
            
            {{$errors->first('username')}}


                    </div>
                  </div>

                  <div class="form-group">
                    {{Form::label('email', "Email", $attributes = array('class'=>'col-lg-2 control-label'))}}
                    <div class="col-lg-3">
                      {{Form::text('email', $user->email,$attributes = array('class'=>'form-control','placeholder'=>"Type your Email Address"))}}
						
						{{$errors->first('email')}}


                    </div>
                  </div>



                  <div class="form-group">
                    {{Form::label('password', "Password", $attributes = array('class'=>'col-lg-2 control-label'))}}
                    <div class="col-lg-3">
                      {{Form::password('password',$attributes = array('class'=>'form-control','placeholder'=>"Type your Password"))}}
						
						{{$errors->first('password')}}


                    </div>
                  </div>

                  <div class="form-group">
                    {{Form::label('password_confirmation', "Confirm Password", $attributes = array('class'=>'col-lg-2 control-label'))}}
                    <div class="col-lg-3">
                      {{Form::password('password_confirmation',$attributes = array('class'=>'form-control','placeholder'=>"Confirm Password"))}}
						
						{{$errors->first('password_confirmation')}}


                    </div>
                  </div>
                  
                 {{Form::hidden('user_id',$user->id)}}
           
                  <div class="form-group">
                    <div class="col-lg-3 col-lg-offset-2">
                
                      {{Form::submit('Update', $attributes = array('class'=>'btn btn-primary'))}}
                    </div>
                  </div>
                </fieldset>
              {{Form::close()}}
            </div> 


@else
  <h1>There is no member with this id.</h1>
@endif


@stop