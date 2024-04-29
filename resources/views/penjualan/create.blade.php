@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">
            {{$page->title}}
        </h3>
        <div class="card-tools"></div>
    </div>
    <div class="card-body">
        <form action="{{ url('penjualan') }}" method="POST" class="form-horizontal">
            @csrf
            <div class="form-group">
                <label class="control-label">Kode Penjualan:</label>
                <input type="text" class="form-control" id="penjualan_kode" name="penjualan_kode">
                @error('penjualan_kode')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label class="control-label">Pembeli:</label>
                <input type="text" class="form-control" id="pembeli" name="pembeli">
                @error('pembeli')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            {{-- <div class="form-group">
                <label class="control-label">Tanggal:</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal">
                @error('tanggal')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div> --}}
            <div class="form-group">
                <label for="tanggal" class="col-1 control-label col-form-label">Tanggal:</label>
                <div class="col-13">
                    <input type="datetime-local" class="form-control" id="tanggal" name="tanggal"
                           value="{{ old('tanggal') }}" required>
                    @error('tanggal')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">User:</label>
                <select class="form-control" id="user" name="user">
                    @foreach($users as $user)
                        <option value="{{ $user->user_id }}">{{ $user->nama }}</option>
                    @endforeach
                </select>
                @error('user')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label class="control-label">Barang:</label><br>
                <div class="row">
                    <div class="col-md-6">
                        @php
                            $halfCount = ceil($barangs->count() / 2);
                            $barangsFirstHalf = $barangs->take($halfCount);
                        @endphp
                        <div class="form-group">
                            @foreach($barangsFirstHalf as $barang)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input barang-checkbox" type="checkbox" id="barang_{{ $barang->barang_id }}" name="barang[{{ $barang->barang_id }}]" value="{{ $barang->barang_id }}">
                                    <label class="form-check-label" for="barang_{{ $barang->barang_id }}">
                                        {{ $barang->barang_nama }}
                                    </label>
                                </div>
                                <div class="jumlah-inputs" id="jumlah_barang_{{ $barang->barang_id }}" style="display: none;">
                                    <label for="jumlah_{{ $barang->barang_id }}">{{ $barang->barang_nama }}:</label>
                                    <input type="number" id="jumlah_{{ $barang->barang_id }}" name="jumlah[{{ $barang->barang_id }}]" class="form-control" min="1" maxlength="5">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            @foreach($barangs->skip($halfCount) as $barang)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input barang-checkbox" type="checkbox" id="barang_{{ $barang->barang_id }}" name="barang[{{ $barang->barang_id }}]" value="{{ $barang->barang_id }}">
                                    <label class="form-check-label" for="barang_{{ $barang->barang_id }}">
                                        {{ $barang->barang_nama }}
                                    </label>
                                </div>
                                <div class="jumlah-inputs" id="jumlah_barang_{{ $barang->barang_id }}" style="display: none;">
                                    <label for="jumlah_{{ $barang->barang_id }}">{{ $barang->barang_nama }}:</label>
                                    <input type="number" id="jumlah_{{ $barang->barang_id }}" name="jumlah[{{ $barang->barang_id }}]" class="form-control" min="1" maxlength="5">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 control-label col-form-label"></label>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    <a class="btn btn-sm btn-default ml-1" href="{{ url('penjualan') }}">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function toggleJumlahInputs() {
        var checkboxes = document.querySelectorAll('.barang-checkbox');
        checkboxes.forEach(function(checkbox) {
            var barangId = checkbox.value;
            var jumlahInputDiv = document.querySelector('#jumlah_barang_' + barangId);
            if (checkbox.checked) {
                jumlahInputDiv.style.display = 'block';
            } else {
                jumlahInputDiv.style.display = 'none';
            }
        });
    }

    var checkboxes = document.querySelectorAll('.barang-checkbox');
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', toggleJumlahInputs);
    });

    toggleJumlahInputs();
</script>

@endsection
