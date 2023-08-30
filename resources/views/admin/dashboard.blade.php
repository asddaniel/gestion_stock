@extends('layouts.header')

@section('content')



<div class="card">
    <div class="card-header row">

        <div class="col col-sm-3">
            <div class="card-options text-right">

                <a href="#"><i class="ik ik-chevron-left"></i></a>
                <a href="#"><i class="ik ik-chevron-right"></i></a>
            </div>
        </div>
        <div class="col col-sm-5 fw-bold h3" style="font-weight: 900">Gestion des utilisateurs</div>
    </div>
    <div class="card-body">
        <table id="advanced_tables" class="table">
            <thead>
                <tr>

                    <th>id</th>
                    <th>Nom</th>
                    <th>email</th>

                    <th>statut</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
      @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->is_admin?'admin':'vendeur' }}</td>
                    <td style="display: inline-block">
                        <form action="{{ route('admin.update_statut') }}" method="post" class="d-flex px-2">
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            @csrf
                            <select name="statut" id="" class="form-control">
                                <option value="admin" {{ $user->is_admin?'selected':'' }}>admin</option>
                                <option value="vendeur" {{ !$user->is_admin?'selected':'' }}>vendeur</option>
                            </select>
                            <div class="px-2"></div>
                            <button class="btn btn-primary">modifier le statut</button>
                        </form>
                    </td>

                </tr>
      @endforeach




            </tbody>
        </table>
    </div>
</div>

@endsection
