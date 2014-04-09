@extends('layouts.master')

@section('content')

<!--login form -->
         <div class="well">
              {{Form::open(array('route'=>'login','class'=>'bs-example form-horizontal'))}}
                <fieldset>
                  <legend>Administrator Login</legend>
                  <div class="form-group">
                    {{Form::label('email', "Email", $attributes = array('class'=>'col-lg-2 control-label'))}}
                    <div class="col-lg-3">
                      {{Form::text('email', NULL,$attributes = array('class'=>'form-control','placeholder'=>"Type your Email"))}}
						
						          {{$errors->first('email')}}


                    </div>
                  </div>
                  <div class="form-group">
                    {{Form::label('password', "Password", $attributes = array('class'=>'col-lg-2 control-label'))}}
                    <div class="col-lg-3">
                      {{Form::password('password',$attributes = array('class'=>'form-control','placeholder'=>"Type your Password"))}}

                      
                    </div>
                  </div>
                 
           
                  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                
                      {{Form::submit('Login', $attributes = array('class'=>'btn btn-primary'))}}

                    </div>

                  </div>
				
                  

                </fieldset>
              {{Form::close()}}


            </div>

@stop