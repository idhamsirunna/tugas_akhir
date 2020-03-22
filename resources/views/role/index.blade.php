{{-- @extends('layouts.dashboard') --}}

{{-- @section('judul', 'Role') --}}

{{-- @section('konten') --}}
<form class="form-inline" action="{{ route('role.store') }}" method="post">
    @csrf
    <div class="form-group mb-2">
        <input type="text" readonly class="form-control-plaintext" value="Masukkan Nama Role Baru"">
    </div>
    <div class=" form-group mx-sm-3 mb-2">
        <label for="role_name" class="sr-only">Password</label>
        <input type="text" name="role" class="form-control" id="role_name" placeholder="Masukkan Role Baru">
    </div>
    <button type="submit" class="btn btn-primary mb-2">Simpan</button>
</form>

<table class="text-center table table-hover mt-3">
    <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Nama Role</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($role as $role)
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{ $role->name }}</td>
            <td>
                <form action="{{ route('role.destroy', ['role'=> $role->id]) }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="submit" class="badge badge-danger">hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{-- @endsection --}}
