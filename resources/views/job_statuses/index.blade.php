@extends('layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Job Status</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Job Status</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Job List</h3>
                        <form action="{{ route('job-statuses.store') }}" method="POST" >
                            @csrf
                            <input type="text" name="status_name" class="form-control float-right"
                                placeholder="Tambah Data">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>

                        <div class="card-tools">
                            <div class="input-group input-group-sm">


                                <input type="text" name="table_search" class="form-control float-right ml-3"
                                    placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 15px">#</th>
                                    <th>Status Lamaran</th>
                                    <th>Total Lamaran</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($jobStatus as $job)
                                    <tr>
                                        <td>{{ $job->id }}</td>
                                        <td>
                                          {{ $job->status_name }}
                                        </td>
                                        <td>
                                            70
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <button type="submit"
                                                    class="btn btn-warning flex-grow-1 mr-2">Update</button>
                                                <button type="submit" class="btn btn-danger flex-grow-1">Delete</button>
                                            </div>
                                        </td>

                                    </tr>
                                @empty
                                    tidak ada Job
                                @endforelse


                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-right">
                            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                        </ul>
                    </div>
                </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
