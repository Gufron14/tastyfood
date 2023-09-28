@extends('admin.layout.app')

@section('title', 'Galeri')

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <div class="text-primary font-weight-bold">
                Manajemen Berita
            </div>
            <div>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary font-weight-bold" data-toggle="modal" data-target="#createModal">
                    Add New Image
                </button>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($galeri as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>
                                    <img src="{{ $item->galeri }}" alt="">
                                </td>
                                <td class="d-flex flex-column justify-content-center align-items-center">
                                    <button class="btn btn-warning mb-2" data-toggle="modal" data-target="#staticBackdrop">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form action="{{ route('galeri.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="" class="btn btn-danger show_confirm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <td colspan="3" class="text-center">
                                <p>Data masih kosong</p>
                                <button type="button" class="btn btn-primary font-weight-bold" data-toggle="modal"
                                    data-target="#createModal">
                                    Tambah Berita
                                </button>
                            </td>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Create Modal --}}
    <div class="modal fade" id="createModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Berita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('galeri.store', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="galeri" class="form-label">Gambar</label>
                            <input type="file" name="galeri" id="galeri" class="form-control" required
                                value="{{ old('galeri', $item->galeri) }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Edit Modal --}}
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Berita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('galeri.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="id">Id</label>
                            <input type="text" name="id" id="id" class="form-control" value="{{ old('id', $item->id) }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="galeri" class="form-label">Gambar</label>
                            <input type="file" name="galeri" id="galeri"
                                class="form-control @error('galeri')  is-invalid
                                
                            @enderror"
                                value="">
                        </div>
                        @error('galeri')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Menangkap semua elemen dengan class show_confirm
        var elements = document.getElementsByClassName("show_confirm");

        // Menambahkan event listener pada setiap elemen
        for (var i = 0; i < elements.length; i++) {
            elements[i].addEventListener("click", function(e) {
                // Menampilkan konfirmasi penghapusan
                var result = confirm("Apakah Anda yakin ingin menghapus data ini?");

                // Jika tidak yakin, mencegah form terkirim
                if (!result) {
                    e.preventDefault();
                }
            });
        }
    </script>
@endsection
