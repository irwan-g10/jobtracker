@extends('layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Jobs</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Jobs</li>
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


                <div class="card-tools">
                  <div class="input-group input-group-sm" >
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                    <div class="input-group-append ml-3">
                      <a href="{{ route('jobs.create') }}" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </a>
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
                                    <th>Nama Perusahaan</th>
                                    <th>Posisi</th>
                                    <th>Tanggal Melamar</th>
                                    <th>Sumber Informasi</th>
                                    <th>Status</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($jobs as $job)
                                    <tr>
                                        <td>{{ $job->id }}</td>
                                        <td>
                                            <a href="{{ route('jobs.show', $job) }}">{{ $job->company_name }}</a>
                                        </td>
                                        <td>
                                            {{ $job->jobPosition->position_title }}
                                        </td>
                                        <td>{{ $job->created_at->locale('id')->translatedFormat('l, d F Y ') }}</td>
                                        <td>{{ $job->jobResource->resource_name }}</td>
                                        <td>
                                            <div class="form-group">
                                                <select class="form-control select2bs4" style="width: 100%;">
                                                    <option selected="selected">{{ $job->jobStatus->status_name }}</option>
                                                    @foreach ($jobStatuses as $jobStatus)
                                                        <option value="{{ $jobStatus->id }}">{{ $jobStatus->status_name }}</option>

                                                    @endforeach
                                                </select>
                                            </div>
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
                                {{-- <tr>
                                    <td>1.</td>
                                    <td>PT Fengtay Indonesia Enterprises</td>
                                    <td>
                                        Operator Produksi
                                    </td>
                                    <td>Kemarin</td>
                                    <td>Jobstreet</td>
                                    <td><span class="badge bg-danger">Ditolak</span></td>
                                </tr> --}}

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
