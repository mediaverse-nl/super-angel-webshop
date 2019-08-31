@extends('layouts.admin')

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.user.index') !!}
@endsection

@section('content')

    <div class="row">
        <div class="col-12">

            @component('components.datatable')
                @slot('head')
                    <th>id</th>
                    <th>name</th>
                    <th>email</th>
                    {{--<th>credit</th>--}}
                    {{--<th>requests</th>--}}
                    <th>created at</th>
                    <th class="no-sort"></th>
                @endslot

                @slot('table')
                    @foreach($users as $user)
                        <tr class="{!! $user->trashed() ? 'table-danger' : '' !!}">
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
{{--                            <td>{{$user->credit ? $user->credit : '-'}}</td>--}}
                            {{--<td>--}}
                                {{--@if($user->chargeBacks()->where('status', '=', '0')->count())--}}
                                    {{--<b>credit refund</b> ---}}
                                    {{--{{$user->chargeBacks()->where('status', '=', '0')->count() ? '' : ''}}--}}
                                    {{--<small>{!! $user->chargeBacks()->where('status', '=', '0')->first()->created_at->format('Y-m-d') !!}</small>--}}
                                {{--@endif--}}
                            {{--</td>--}}
                            <td>{{$user->created_at->format('d-m-Y')}}</td>
                            <td>
                                @component('components.model', [
                                    'id' => 'userTableBtn'.$user->id,
                                    'title' => ($user->trashed() ? 'Restore' : 'Delete').' entry '.$user->id,
                                    'actionRoute' => route('admin.user.destroy', $user->id),
                                    'btnClass' => 'rounded-circle delete',
                                    'btnIcon' => 'fa '.($user->trashed() ? 'fa-undo' : 'fa-trash')
                                ])
                                    @slot('description')
                                        If u proceed u will <b>{!! $user->trashed() ? 'restore' : 'delete' !!}</b> all relations
                                    @endslot
                                @endcomponent
                                <a href="{{route('admin.user.edit', $user->id)}}" class="rounded-circle edit">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endslot

            @endcomponent

        </div>
    </div>

@endsection

@push('css')
    <style>

    </style>
@endpush

@push('js')
    <script>

    </script>
@endpush