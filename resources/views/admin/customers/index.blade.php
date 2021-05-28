@extends('layouts.adminlayout')

@section('content')
@if (session('deleteCustomer'))
    <div class="alert alert-dismissible alert-danger fade show" role="alert">
        {{ session('deleteCustomer') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
    <a href="{{ route('customers.create') }}">
        <button type="button" class="btn btn-sm btn-outline-primary float-right">
            <i class="fas fa-user-plus"></i>Ajout customer
        </button>
    </a>
    <h3><i class="fas fa-users"></i> Customers List</h3>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col"><i class="fas fa-fingerprint"></i></th>
                <th scope="col"> <i class="fas fa-id-card"></i> Name</th>
                <th scope="col"><i class="fas fa-phone-square"></i> Phone</th>
                <th scope="col"><i class="fas fa-at"></i> Email</th>
                <th scope="col"><i class="fas fa-users-cog"></i> Operations</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <th scope="row">{{ $customer->id }}</th>
                    <td scope="row">{{ $customer->firstname.' '.$customer->lastname }}</td>
                    <td scope="row">{{ $customer->phone }}</td>
                    <td scope="row">{{ $customer->email }}</td>
                    <td>
                        <a href="{{ route('customers.show', ['customer' => $customer->id]) }}" class="btn btn-outline-info"><i class="fas fa-search-plus"></i></a>
                        <a href="{{ route('customers.edit', ['customer' => $customer->id]) }}" class="btn btn-outline-warning"><i class="fas fa-user-edit"></i></a>
                        <a href="#"
                            class="btn btn-outline-danger"
                            onclick="event.preventDefault(); document.querySelector('#delete-customer-form').submit()"
                            ><i class="fas fa-user-times"></i>
                        </a>
                        <form action="{{ route('customers.destroy', ['customer' => $customer->id]) }}"
                                method="POST" id="delete-customer-form">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="float-right mr-3">
        {{ $customers->links() }}
    </div>
@endsection
