@extends('layouts/master')

@section('content')

	<div id="account">


			@if(!$users->isEmpty())
	      		<div class="bs-example table-responsive">
              		<table class="table table-striped table-bordered table-hover">
	                <thead>
	                  <tr>
	                    <th>Name</th>
	                    <th>Email</th>
	                   	<th>Delete</th>
	                  </tr>
	                </thead>
                	<tbody>
					
                		@foreach($users as $data )
							<tr>
	                			<td>{{e($data->username)}}</td>
	                			
			                    <td>{{e($data->email)}}</td>



			                    

			                    <td>{{link_to("user/delete/$data->id", 'Delete', $attributes = array("class"=>"btn btn-danger"))}}</td>

                			

							</tr>
	                	@endforeach
	                </tbody>
	              </table>
	            </div>
	            @else
	            	<h1>Currently There is no Users.</h1>
	            @endif


	</div>


@stop
