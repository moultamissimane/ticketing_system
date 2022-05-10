@extends('layouts.app')

@section('title', 'All Users')

@section('content')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="flex justify-start ml-5 text-xl text-green-400">
					<span class="font-bold">Users</span>
				</div>

				<div class="">
					@if ($users->isEmpty())
						<p>There are currently no users.</p>
					@else
						<table class="table">
							@include('includes.flash')
							<thead>
								<tr>
									<th class="bg-gray-300 text-center">Name</th>
									<th class="bg-gray-300 text-center">Email</th>
									<th class="bg-gray-300 text-center" colspan="2">Actions</th>
								</tr>
							</thead>
							<tbody>
                                @foreach ($users as $user)
                                @if ($user->is_admin == 0)
                                <tr>
                                    <td class="bg-white  text-lg text-center">{{ $user->name }}</td>
                                    <td class="bg-white text-lg text-center">{{ $user->email }}</td>
                        
                                    <td class="bg-white text-center">
                                        <form action="{{ url('/admin/users', ['id'=> $user->id]) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="text-red-600 font-bold text-lg">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endif
							@endforeach
							</tbody>
						</table>

						{{ $users->render() }}
					@endif
				</div>
			</div>
		</div>
	</div>
@endsection