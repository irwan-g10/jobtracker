@extends('layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create a Jobs</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Jobs</a></li>
                            <li class="breadcrumb-item active">Create</li>
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
                        <h3 class="card-title">Detail Jobs</h3>
                    </div>
                    <form action="{{ route('jobs.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputCompanyName">Company Name</label>
                                <input type="text" class="form-control" name="company_name"
                                    placeholder="Enter Company Name">
                            </div>

                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control" rows="3" name="address" placeholder="Enter Adress"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="inputCity">City</label>
                                <input type="text" class="form-control" name="city" id="inputCity" placeholder="Enter City">
                            </div>
                            <div class="form-group">
                                <label for="inputCity">Province</label>
                                <input type="text" class="form-control" name="province" id="inputCity" placeholder="Enter Province">
                            </div>
                            <div class="form-group">
                                <label for="inputPostalCode">Postal Code</label>
                                <input type="text" class="form-control" name="postal_code" id="inputPostalCode"
                                    placeholder="Enter Postal Code">
                            </div>
                            <div class="form-group">
                                <label>Position</label>
                                <select class="form-control select2bs4" name="job_position_id" style="width: 100%;">
                                    <option selected="selected">Select Position</option>
                                    @foreach ($jobPositions as $jobPosition)
                                        <option value="{{ $jobPosition->id }}">
                                            {{ $jobPosition->position_title }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group">
                                <label>Resource</label>
                                <select class="form-control select2bs4" name="job_resource_id" style="width: 100%;">
                                    <option selected="selected">Select Resource</option>
                                    @foreach ($jobResources as $jobResource)
                                        <option value="{{ $jobResource->id }}">
                                            {{ $jobResource->resource_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Note</label>
                                <textarea class="form-control" rows="3" name="note" placeholder="Enter Note"></textarea>
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
