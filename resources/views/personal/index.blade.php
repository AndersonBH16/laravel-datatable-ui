@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Personal UNT</div>
            <div class="card-body">
                {{ $dataTable->table([
                        'class' => 'table table-bordered',
                        'id' => 'personas-table'
                ]) }}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
