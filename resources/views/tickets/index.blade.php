@extends('layouts.app')

@section('title', 'All Tickets')

@section('content')
    <div class="overflow-x-auto">
        <div class="w-full lg:w-5/6">
            <div class="bg-white shadow-md rounded my-6 m-5">
                @if ($tickets->isEmpty())
                    <p>You have not created any tickets.</p>
                @else
                    <table class="min-w-max w-full table-auto">
                        <thead class="m-20">
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Categorie</th>
                                <th class="py-3 px-6 text-left">Title</th>
                                <th class="py-3 px-6 text-center">Status</th>
                                <th class="py-3 px-6 text-center">Latest Updates</th>
                                <th class="py-3 px-6 text-center">Comments</th>
                                <th class="py-3 px-6">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-black text-lg font-regular">
							@foreach ($tickets as $ticket)
                                <tr>
                                    <td class="py-3 px-3">
										@foreach ($categories as $category)
										@if ($category->id === $ticket->category_id)
											{{ $category->name }}
										@endif
									@endforeach
                                    </td>
                                    <td class="py-3 px-3">
                                        <a class="text-red-600" href="{{ url('tickets/'. $ticket->ticket_id) }}">
											#{{ $ticket->ticket_id }} - {{ $ticket->title }}
										</a>
                                    </td>
									
                                    <td class="py-3 px-6 text-center">
                                        @if ($ticket->status === 'Open')
                                            <span
                                                class="bg-green-400 hover:bg-green-600 pb-16 text-white font-bold rounded">{{ $ticket->is_resolved }}</span>
                                        @else
                                            <span class="bg-red-600 hover:bg-red-800 pb-16 text-white font-bold py-2 px-4 rounded">{{ $ticket->is_resolved }}</span>
                                        @endif
                                    </td>
								
                                    <td class="py-3 px-6 text-center">
                                        {{ $ticket->updated_at }}
                                    </td>
									<td class="px-6 text-center">
										<a href="{{ url('tickets/' . $ticket->ticket_id) }}" class="bg-blue-600 hover:bg-blue-800 pb-16 text-white font-bold py-2 px-4 rounded">Comment</a>
									</td>
									<td class="text-center">
										<div class="flex gap-3">
										<form action="{{ url('admin/close_ticket/' . $ticket->ticket_id) }}" method="POST">
											{!! csrf_field() !!}
											<button type="submit" class="text-red-500 font-bold">Close</button>
										</form>
										
										<form action="{{ url('admin/open_ticket/' . $ticket->ticket_id) }}" method="POST">
											{!! csrf_field() !!}
											<button type="submit" class="text-green-500 font-bold">Open</button>
										</form>
									</div>
									</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $tickets->render() }}
                @endif

            </div>
        </div>
    </div>
@endsection
