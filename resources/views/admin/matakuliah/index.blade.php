@extends('admin.layout.main')

@section('title', 'Administrator Perwalian - Mata Kuliah')

@push('css')
    <!-- Custom styles for this page -->
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@push('headscript')
@endpush

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Mata Kuliah</h1>
        <a href="{{route('admin.matakuliah.create')}}" class="bg-primary text-light rounded p-2 mb-0 text-decoration-none">Tambah</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Datatable Mata Kuliah</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Mata Kuliah</th>
                            <th>Nama Mata Kuliah</th>
                            <th>Program Studi</th>
                            <th>SKS</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $index => $item)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$item->mk_id}}</td>
                                <td>{{$item->mk_name}}</td>
                                <td>{{$item->ProgramStudi->ps_name}}</td>
                                <td>{{$item->sks}}</td>
                                <td>
                                    <a href="{{ route('admin.matakuliah.detailmk', ['id' => $item->mk_id]) }}" class="text-decoration-none p-2 mb-0"><span class="badge badge-primary">View</span></a>
                                    <a href="{{ route('admin.matakuliah.edit', ['id' => $item->mk_id]) }}" class="text-decoration-none p-2 mb-0"><span class="badge badge-secondary">Edit</span></a>
                                    <a href="#" class="text-decoration-none p-2 mb-0" data-toggle="modal" data-target="#modalDelete{{$item->mk_id}}"><span class="badge badge-danger">Delete</span></a>
                                </td>

                                <!-- Modal -->
                                <div class="modal fade" id="modalDelete{{$item->mk_id}}" tabindex="-1" role="dialog" aria-labelledby="modalDelete{{$item->mk_id}}Label" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Delete Matakuliah</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah anda yakin ingin menghapus data Mata Kuliah dengan kode {{$item->mk_id}}?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                <form action="{{ route('admin.matakuliah.destroy', ['id' => $item->mk_id]) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">
                                    <p class="text-secondary font-weight-bold mb-0">Data Not Found!</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('bottomscript')
    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/admin/demo/datatables-demo.js') }}"></script>
@endpush