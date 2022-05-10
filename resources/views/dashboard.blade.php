@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
   
<div class="py-16 bg-gray-100">
	<div class="container m-auto px-6 md:px-12 xl:px-0">
        <h1 class="flex justify-center text-5xl text-bold text-black">Dashboard</h1>
        <div class=" flex justify-center mt-5 md:w-3/4 lg:w-full lg:grid-cols-3">
            <div class="bg-blue-100  rounded-2xl w-1/2 shadow-2xl  sm:px-12 lg:px-8">
                <div class=" flex mr-6 mb-12 space-y-4">
                    <div class="mb-24 px-24">
                        <p class="text-black font-bold text-lg ml-3 pt-16 pb-10">Welcome back🥳</p>
                        <div class=''>
                            @if (Auth::user()->is_admin)
                                <p class="ml-4 text-lg font-bold">
                                    Check <a class="text-lg font-bold"
									href="{{ url('admin/tickets') }}">tickets</a>
                                </p>
                                <p class="ml-4 text-lg font-bold text-black">
									Add <a href="{{ url('/admin/add_category') }}">categories</a>
                                <p class="ml-4 text-lg font-bold">
                                    See all <a href="{{ url('/admin/users') }}">Users</a>
                                </p>
                                </p>
                            @else
							<a class="bg-blue-500 hover:bg-blue-dark pb-16 text-white font-bold py-2 px-4 rounded" href="{{ url('my_tickets') }}">
                                    Available Tickets
                                </a>
                                <a class="bg-blue-500 hover:bg-blue-dark text-white font-bold py-2 px-4 rounded" href="{{ route('newticket') }}">
                                    open new ticket
                                </a>
								@endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection