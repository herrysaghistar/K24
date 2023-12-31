@extends('layouts.app')

@section('content')
    <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="/pp/{{Auth::user()->foto }}" alt="Profile" class="rounded-circle">
              <h2>{{ Auth::user()->name }}</h2>
              <h3>{{ Auth::user()->username }}</h3>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              @if (count($errors) > 0)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                  @endforeach
                </div>
              @endif
              @if(session('message'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {{ session('message') }}
                  </div>
              @endif
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->name }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">No. KTP</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->noktp }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Tanggal Lahir</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->tgl_lahir }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->nohp }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->email }}</div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form class="form" action="/edit" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="" name="id" value="{{ Auth::user()->id }}" hidden>
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="/pp/{{Auth::user()->foto }}" alt="Profile">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Upload new foto</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="foto" type="file" class="form-control" id="fullName" value="{{ Auth::user()->name }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="name" type="text" class="form-control" id="fullName" value="{{ Auth::user()->name }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Username</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="username" type="text" class="form-control" id="company" value="{{ Auth::user()->username }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="company" value="{{ Auth::user()->email }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Job" class="col-md-4 col-lg-3 col-form-label">No. HP</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="nohp" type="text" class="form-control" id="Job" value="{{ Auth::user()->nohp }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">No. KTP</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="noktp" type="text" class="form-control" id="Country" value="{{ Auth::user()->noktp }}" disabled>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Address" class="col-md-4 col-lg-3 col-form-label">Tanggal lahir</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="tgl_lahir" type="date" class="form-control" id="Address" value="{{ Auth::user()->tgl_lahir }}">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form action="/password" method="post">
                    @csrf
                    <input type="" name="id" value="{{ Auth::user()->id }}" hidden>
                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Re New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password_confirmation" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
        <!-- this is the example for using permission of Admin -->
        <!-- when you define @can ... @end can, user without admin role will not see this section -->
        @can('Admin')
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data User</h5>

              <!-- Table with stripped rows -->
              <table class="table" id="example">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">No. KTP</th>
                    <th scope="col">No. HP</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
        </div>
        @endcan
      </div>

    </section>

  </main><!-- End #main -->

@endsection


