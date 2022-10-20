@extends('layouts.index')
@section('title','Profil User')

@section('content')

<div class="col-sm-12">
    <div class="card">
        <div class="card-body">
            <table class="table">
                <tbody>
                    <tr>
                        <td>Nama</td>
                        <td width="10">:</td>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>{{ $user->alamat }}</td>
                    </tr>
                    <tr>
                        <td>Kontak</td>
                        <td>:</td>
                        <td>{{ $user->kontak }}</td>
                    </tr>
                    <tr>
                        <td>Jabatan</td>
                        <td>:</td>
                        <td>{{ $user->jabatan->nama_jabatan }}</td>
                    </tr>
                    <tr>
                        <td>Foto Profile</td>
                        <td>:</td>
                        <td>
                            <img src="{{ asset('imageuser/'.$user->image) }}" alt="" style="width: 60px;">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="col-md-12 mt-2">
    <div class="card">
        <div class="card-body">
            <h4><i class="fa fa-pencil-alt"></i> Edit Profile</h4><br>
            <form action="{{ url('userprofile/'.Auth::user()->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PATCH">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="nama" class="form-label">Nama</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="kontak" class="form-label">Kontak</label>
                            <input type="text" class="form-control" id="kontak" name="kontak"
                                value="{{ $user->kontak }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ $user->email }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat"
                                value="{{ $user->alamat }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="password" class="form-label">Password</label>
                            <input id="password" type="password" class="form-control " name="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label"><b>Jabatan</b></label>
                        <select class="form-select mb-3 shadow-none" id="id_jabatan" name="id_jabatan">
                            <option disabled="">Pilih Jabatan...</option>
                            <option value="{{ Auth::user()->id_jabatan }}">{{ Auth::user()->jabatan->nama_jabatan }}
                            </option>
                            <?php 
                                $jab = DB::table('jabatan')->get();
                            ?>
                            @foreach ($jab as $j)
                            <option value="{{ $j->id }}">{{ $j->nama_jabatan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="image" class="form-label">Tambahkan Foto</label>
                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror"
                                name="image" value="{{ $user->image }}">
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-2">
                            <button type="submit" class="btn btn-primary">
                                Update
                            </button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
@endsection