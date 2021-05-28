@extends('layouts.adminlayout')

@section('content')
<fieldset>
    <legend>
        <i class="fas fa-user-edit"></i> Edit Customer: <strong>{{ $customer->firstname." ".$customer->lastname }}</strong>
    </legend>
<form action="{{ route('customers.update', ['customer' => $customer->id]) }}" method="post">
    @method('PUT')
    @include('admin.customers.form')
</form>
</fieldset>
@endsection
