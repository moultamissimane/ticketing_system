@extends('layouts.app')

@section('title', 'All Tickets')

@section('content')
    <div class="overflow-x-auto">
        <div class="w-full lg:w-5/6">
            <div class="bg-white shadow-md rounded my-6">
                @if ($tickets->isEmpty())
                    <p>You have not created any tickets.</p>
                @else
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Categorie</th>
                                <th class="py-3 px-6 text-left">Title</th>
                                <th class="py-3 px-6 text-center">Status</th>
                                <th class="py-3 px-6 text-center">Latest Updates</th>
                                <th class="py-3 px-6 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
							@foreach ($tickets as $ticket)
                                <tr>
                                    <td class="py-3 px-6 text-left whitespace-nowrap">
										@foreach ($categories as $category)
										@if ($category->id === $ticket->category_id)
											{{ $category->name }}
										@endif
									@endforeach
                                    </td>
                                    <td>
                                        <a href="{{ url('tickets/'. $ticket->ticket_id) }}">
											#{{ $ticket->ticket_id }} - {{ $ticket->title }}
										</a>
                                    </td>
									<div class="flex justify-between">
                                    <td class="pr-10">
                                        @if ($ticket->status === 'Open')
                                            <span
                                                class="bg-green-400 hover:bg-blue-dark pb-16 text-white font-bold py-2 px-4 rounded">{{ $ticket->is_resolved }}</span>
                                        @else
                                            <span class="bg-red-400 hover:bg-blue-dark pb-16 text-white font-bold py-2 px-4 rounded">{{ $ticket->is_resolved }}</span>
                                        @endif
                                    </td>
								</div>
                                    <td class="py-3 px-6 text-center">
                                        {{ $ticket->updated_at }}
                                    </td>
									<td class="pr-10">
										<a href="{{ url('tickets/' . $ticket->ticket_id) }}" class="btn btn-primary">Comment</a>
									</td>
									<td>
										<form action="{{ url('admin/close_ticket/' . $ticket->ticket_id) }}" method="POST">
											{!! csrf_field() !!}
											<button type="submit" class="btn btn-danger">Close</button>
										</form>
										
										<form action="{{ url('admin/open_ticket/' . $ticket->ticket_id) }}" method="POST">
											{!! csrf_field() !!}
											<button type="submit" class="btn btn-success">Open</button>
										</form>
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
