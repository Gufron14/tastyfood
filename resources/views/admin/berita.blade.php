@extends('admin.layout.app')

@section('title', 'Berita')

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <div class="text-primary font-weight-bold">
                Manajemen Berita
            </div>
            <div>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary font-weight-bold" data-toggle="modal" data-target="#createModal">
                    + Berita
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Judul Berita</th>
                            <th>Isi Berita</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($berita as $item)
                            <tr>
                                <td>{{ $item->judul }}</td>
                                <td>{{ $item->konten }}</td>
                                <td>
                                    <img src="{{ $item->gambar }}" alt="" width="200px">
                                </td>
                                <td class="d-flex flex-column justify-content-center align-items-center">
                                    <button type="button" class="btn btn-primary mb-2">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-warning mb-2" data-toggle="modal" data-target="#staticBackdrop">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form action="{{ route('berita.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="" class="btn btn-danger show_confirm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <td colspan="4" class="text-center">
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

    <!-- CREATE Modal -->
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
                <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul Berita</label>
                            <input type="text" name="judul" id="judul" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" name="gambar" id="gambar" class="form-control" required>
                        </div>

                        <textarea name="konten" id="konten" cols="30" rows="10" required>
                            
                        </textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- EDIT Modal -->
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
                <div class="modal-body">
                    <form action="{{ route('berita.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul Berita</label>
                            <input type="text" name="judul" id="judul" class="form-control" value="{{ old('judul', $item->judul ) }}">
                        </div>

                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" name="gambar" id="gambar" class="form-control"
                                value="{{ old('judul', $item->gambar) }}">

                        <textarea name="konten" id="konten" cols="30" rows="10" placeholder="">
                            {{ old('konten', $item->konten) }}
                        </textarea>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Publikasikan</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [{
                    value: 'First.Name',
                    title: 'First Name'
                },
                {
                    value: 'Email',
                    title: 'Email'
                },
            ],
            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject(
                "See docs to implement AI Assistant"))
        });
    </script>

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
