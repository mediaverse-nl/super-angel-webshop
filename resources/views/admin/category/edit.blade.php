@extends('layouts.admin')

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.category.edit', $category) !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-body">

                    {!! Form::model($category, ['route' => ['admin.category.update', $category->id], 'method' => 'PATCH']) !!}

                        <div class="form-group">
                            {!! Form::label('value', 'value') !!}
                            {!! Form::text('value', null, ['class' => 'form-control'.(!$errors->has('value') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'value'])
                        </div>

                        @component('components.model', [
                            'id' => 'CreateCategory',
                            'title' => 'Create entry ',
                            'actionRoute' => route('admin.category.store'),
                            'btnClass' => 'btn btn-warning',
                            'btnIcon' => null,
                            'btnTitle' => 'edit',
                        ])
                            @slot('description')
                                If u proceed u will <b>edit</b> this entry
                            @endslot
                        @endcomponent
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

    @component('components.rich-textarea-editor')
    @endcomponent

@endsection

{{--@push('css')--}}
    {{--<style>--}}

    {{--</style>--}}
{{--@endpush--}}

{{--@push('js')--}}
    {{--<script>--}}

    {{--</script>--}}
{{--@endpush--}}