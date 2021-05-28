@extends('layouts.adminlayout')

@section('content')
<fieldset>
    <legend><i class="fas fa-user-plus"></i> Add new Customer</legend>
    <form action="{{ route('customers.store') }}" method="post">
        @include('admin.customers.form')
    </form>
</fieldset>

@endsection
