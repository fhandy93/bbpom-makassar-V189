<x-HomeLayout>
<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">
        <!-- CONTAINER -->
        <div class="main-container container-fluid">
            <!-- PAGE-HEADER -->
            <div class="page-header">
				<h1 class="page-title">Edit Users</h1>
				<div>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Users</a></li>
						<li class="breadcrumb-item active" aria-current="page">Users Edit</li>
					</ol>
				</div>	
            </div>
            <!-- PAGE-HEADER END -->
            <!-- ROW OPEN -->
			<div class="row">
			@if (session() -> has('succes'))
				<div class="card-body text-center" id="success"> 
					<span class=""><svg xmlns="http://www.w3.org/2000/svg" height="60" width="60" viewBox="0 0 24 24"><path fill="#13bfa6" d="M10.3125,16.09375a.99676.99676,0,0,1-.707-.293L6.793,12.98828A.99989.99989,0,0,1,8.207,11.57422l2.10547,2.10547L15.793,8.19922A.99989.99989,0,0,1,17.207,9.61328l-6.1875,6.1875A.99676.99676,0,0,1,10.3125,16.09375Z" opacity=".99"/><path fill="#71d8c9" d="M12,2A10,10,0,1,0,22,12,10.01146,10.01146,0,0,0,12,2Zm5.207,7.61328-6.1875,6.1875a.99963.99963,0,0,1-1.41406,0L6.793,12.98828A.99989.99989,0,0,1,8.207,11.57422l2.10547,2.10547L15.793,8.19922A.99989.99989,0,0,1,17.207,9.61328Z"/></svg></span>
					<h4 class="h4 mb-0 mt-3">Success</h4>
					<p class="card-text">{{ session() -> get('succes')}}</p>
				</div>
			@endif    		
				<div class="col-lg-3 col-md-3"></div>
					<div class="col-lg-6 col-md-6">
						<a href="/userv"><button type="button" class="btn btn-primary"><i class="fe fe-eye me-2"></i>View User</button></a><p>
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Form Edit User</h3>
								</div>
							<div class="card-body">
								<form id="signupForm" method="post" class="form-horizontal" action="/usere/{{$user->id}}" >
									@csrf
									@method('put')
									<div class="form-row">
										<div class="col-xl-6 mb-12 ">
											<label for="nama" class="form-label">Nama</label>
											<input type="text" value="{{ $user -> name }}"  class="form-control  @error('nama') is-invalid @enderror" id="nama" name="nama" >
											@error('nama')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
									<div class="form-row">
										<div class="col-xl-6 mb-12 ">
											<label for="nama" class="form-label">Username</label>
											<input type="text" value="{{ $user -> username }}"   class="form-control  @error('username') is-invalid @enderror" id="username" name="username" readonly="readonly">
											@error('username')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
									<div class="form-row">
										<div class="col-xl-12 mb-12 ">
											<label for="email" class="form-label">Email</label>
											<input type="text" value="{{ $user -> email }}"   class="form-control  @error('email') is-invalid @enderror" id="email" name="email" readonly="readonly" >
											@error('email')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-xl-6 mb-12 ">
											<label class="form-label">Type </label>
											<select name="type" class="form-control form-select select2" data-bs-placeholder="Select Country">
												@if ($user -> is_permission == 1)    
													<option value="1" selected >Super Admin</option>
													<option value="2">Perlengkapan</option>
													<option value="3">Kepegawaian</option>
													<option value="4">Keuangan</option>
													<option value="5">Infokom</option>
													<option value="6">Laboratorium</option>
													<option value="7">Penindakan</option>
													<option value="8">Pemeriksaan</option>
													<option value="9">Pengujian</option>
													<option value="10">Evaluasi(PE)</option>
													<option value="11">Admin</option>
													<option value="12">Kepala TU</option>
													<option value="13">User</option>
													<option value="14">Sertifikasi</option>
													<option value="15">IT</option>
													<option value="16">Kabalai</option>
													<option value="17">PIC Infokom</option>
													<option value="18">PIC Inspeksi</option>
													<option value="19">PIC Sertifikasi</option>
													<option value="20">PIC Pengujian</option>
													<option value="21">PIC Penindakan</option>
													<option value="22">PIC Kepegawaian</option>
												@elseif($user -> is_permission == 2)
													<option value="1">Admin</option>
													<option value="2" selected>Perlengkapan</option>
													<option value="3">Kepegawaian</option>
													<option value="4">Keuangan</option>
													<option value="5">Infokom</option>
													<option value="6">Laboratorium</option>
													<option value="7">Penindakan</option>
													<option value="8">Pemeriksaan</option>
													<option value="9">Pengujian</option>
													<option value="10">Evaluasi(PE)</option>
													<option value="11">Admin</option>
													<option value="12">Kepala TU</option>
													<option value="13">User</option>
													<option value="14">Sertifikasi</option>
													<option value="15">IT</option>
													<option value="16">Kabalai</option>
													<option value="17">PIC Infokom</option>
													<option value="18">PIC Inspeksi</option>
													<option value="19">PIC Sertifikasi</option>
													<option value="20">PIC Pengujian</option>
													<option value="21">PIC Penindakan</option>
													<option value="22">PIC Kepegawaian</option>
												@elseif($user -> is_permission == 3)
													<option value="1">Admin</option>
													<option value="2">Perlengkapan</option>
													<option value="3" selected>Kepegawaian</option>
													<option value="4">Keuangan</option>
													<option value="5">Infokom</option>
													<option value="6">Laboratorium</option>
													<option value="7">Penindakan</option>
													<option value="8">Pemeriksaan</option>
													<option value="9">Pengujian</option>
													<option value="10">Evaluasi(PE)</option>
													<option value="11">Admin</option>
													<option value="12">Kepala TU</option>
													<option value="13">User</option>
													<option value="14">Sertifikasi</option>
													<option value="15">IT</option>
													<option value="16">Kabalai</option>
													<option value="17">PIC Infokom</option>
													<option value="18">PIC Inspeksi</option>
													<option value="19">PIC Sertifikasi</option>
													<option value="20">PIC Pengujian</option>
													<option value="21">PIC Penindakan</option>
													<option value="22">PIC Kepegawaian</option>
												@elseif($user -> is_permission == 4)
													<option value="1">Admin</option>
													<option value="2">Perlengkapan</option>
													<option value="3">Kepegawaian</option>
													<option value="4" selected>Keuangan</option>
													<option value="5">Infokom</option>
													<option value="6">Laboratorium</option>
													<option value="7">Penindakan</option>
													<option value="8">Pemeriksaan</option>
													<option value="9">Pengujian</option>
													<option value="10">Evaluasi(PE)</option>
													<option value="11">Admin</option>
													<option value="12">Kepala TU</option>
													<option value="13">User</option>
													<option value="14">Sertifikasi</option>
													<option value="15">IT</option>
													<option value="16">Kabalai</option>
													<option value="17">PIC Infokom</option>
													<option value="18">PIC Inspeksi</option>
													<option value="19">PIC Sertifikasi</option>
													<option value="20">PIC Pengujian</option>
													<option value="21">PIC Penindakan</option>
													<option value="22">PIC Kepegawaian</option>
												@elseif($user -> is_permission == 5)
													<option value="1">Admin</option>
													<option value="2">Perlengkapan</option>
													<option value="3">Kepegawaian</option>
													<option value="4">Keuangan</option>
													<option value="5" selected>Infokom</option>
													<option value="6">Laboratorium</option>
													<option value="7">Penindakan</option>
													<option value="8">Pemeriksaan</option>
													<option value="9">Pengujian</option>
													<option value="10">Evaluasi(PE)</option>
													<option value="11">Admin</option>
													<option value="12">Kepala TU</option>
													<option value="13">User</option>
													<option value="14">Sertifikasi</option>
													<option value="15">IT</option>
													<option value="16">Kabalai</option>
													<option value="17">PIC Infokom</option>
													<option value="18">PIC Inspeksi</option>
													<option value="19">PIC Sertifikasi</option>
													<option value="20">PIC Pengujian</option>
													<option value="21">PIC Penindakan</option>
													<option value="22">PIC Kepegawaian</option>
												@elseif($user -> is_permission == 6)
													<option value="1">Admin</option>
													<option value="2">Perlengkapan</option>
													<option value="3">Kepegawaian</option>
													<option value="4">Keuangan</option>
													<option value="5">Infokom</option>
													<option value="6" selected>Laboratorium</option>
													<option value="7">Penindakan</option>
													<option value="8">Pemeriksaan</option>
													<option value="9">Pengujian</option>
													<option value="10">Evaluasi(PE)</option>
													<option value="11">Admin</option>
													<option value="12">Kepala TU</option>
													<option value="13">User</option>
													<option value="14">Sertifikasi</option>
													<option value="15">IT</option>
													<option value="16">Kabalai</option>
													<option value="17">PIC Infokom</option>
													<option value="18">PIC Inspeksi</option>
													<option value="19">PIC Sertifikasi</option>
													<option value="20">PIC Pengujian</option>
													<option value="21">PIC Penindakan</option>
													<option value="22">PIC Kepegawaian</option>
												@elseif($user -> is_permission == 7)
													<option value="1">Admin</option>
													<option value="2">Perlengkapan</option>
													<option value="3">Kepegawaian</option>
													<option value="4">Keuangan</option>
													<option value="5">Infokom</option>
													<option value="6">Laboratorium</option>
													<option value="7" selected>Penindakan</option>
													<option value="8">Pemeriksaan</option>
													<option value="9">Pengujian</option>
													<option value="10">Evaluasi(PE)</option>
													<option value="11">Admin</option>
													<option value="12">Kepala TU</option>
													<option value="13">User</option>
													<option value="14">Sertifikasi</option>
													<option value="15">IT</option>
													<option value="16">Kabalai</option>
													<option value="17">PIC Infokom</option>
													<option value="18">PIC Inspeksi</option>
													<option value="19">PIC Sertifikasi</option>
													<option value="20">PIC Pengujian</option>
													<option value="21">PIC Penindakan</option>
													<option value="22">PIC Kepegawaian</option>
												@elseif($user -> is_permission == 8)
													<option value="1">Admin</option>
													<option value="2">Perlengkapan</option>
													<option value="3">Kepegawaian</option>
													<option value="4">Keuangan</option>
													<option value="5">Infokom</option>
													<option value="6">Laboratorium</option>
													<option value="7">Penindakan</option>
													<option value="8" selected>Pemeriksaan</option>
													<option value="9">Pengujian</option>
													<option value="10">Evaluasi(PE)</option>
													<option value="11">Admin</option>
													<option value="12">Kepala TU</option>
													<option value="13">User</option>
													<option value="14">Sertifikasi</option>
													<option value="15">IT</option>
													<option value="16">Kabalai</option>
													<option value="17">PIC Infokom</option>
													<option value="18">PIC Inspeksi</option>
													<option value="19">PIC Sertifikasi</option>
													<option value="20">PIC Pengujian</option>
													<option value="21">PIC Penindakan</option>
													<option value="22">PIC Kepegawaian</option>
												@elseif($user -> is_permission == 9)
													<option value="1">Admin</option>
													<option value="2">Perlengkapan</option>
													<option value="3">Kepegawaian</option>
													<option value="4">Keuangan</option>
													<option value="5">Infokom</option>
													<option value="6">Laboratorium</option>
													<option value="7">Penindakan</option>
													<option value="8">Pemeriksaan</option>
													<option value="9" selected>Pengujian</option>
													<option value="10">Evaluasi(PE)</option>
													<option value="11">Admin</option>
													<option value="12">Kepala TU</option>
													<option value="13">User</option>
													<option value="14">Sertifikasi</option>
													<option value="15">IT</option>
													<option value="16">Kabalai</option>
													<option value="17">PIC Infokom</option>
													<option value="18">PIC Inspeksi</option>
													<option value="19">PIC Sertifikasi</option>
													<option value="20">PIC Pengujian</option>
													<option value="21">PIC Penindakan</option>
													<option value="22">PIC Kepegawaian</option>
												@elseif($user -> is_permission == 10)
													<option value="1">Admin</option>
													<option value="2">Perlengkapan</option>
													<option value="3">Kepegawaian</option>
													<option value="4">Keuangan</option>
													<option value="5">Infokom</option>
													<option value="6">Laboratorium</option>
													<option value="7">Penindakan</option>
													<option value="8">Pemeriksaan</option>
													<option value="9">Pengujian</option>
													<option value="10" selected>Evaluasi(PE)</option>
													<option value="11">Admin</option>
													<option value="12">Kepala TU</option>
													<option value="13">User</option>
													<option value="14">Sertifikasi</option>
													<option value="15">IT</option>
													<option value="16">Kabalai</option>
													<option value="17">PIC Infokom</option>
													<option value="18">PIC Inspeksi</option>
													<option value="19">PIC Sertifikasi</option>
													<option value="20">PIC Pengujian</option>
													<option value="21">PIC Penindakan</option>
													<option value="22">PIC Kepegawaian</option>
												@elseif($user -> is_permission == 11)
													<option value="1">Admin</option>
													<option value="2">Perlengkapan</option>
													<option value="3">Kepegawaian</option>
													<option value="4">Keuangan</option>
													<option value="5">Infokom</option>
													<option value="6">Laboratorium</option>
													<option value="7">Penindakan</option>
													<option value="8">Pemeriksaan</option>
													<option value="9">Pengujian</option>
													<option value="10">Evaluasi(PE)</option>
													<option value="11" selected>Admin</option>
													<option value="12">Kepala TU</option>
													<option value="13">User</option>
													<option value="14">Sertifikasi</option>
													<option value="15">IT</option>
													<option value="16">Kabalai</option>
													<option value="17">PIC Infokom</option>
													<option value="18">PIC Inspeksi</option>
													<option value="19">PIC Sertifikasi</option>
													<option value="20">PIC Pengujian</option>
													<option value="21">PIC Penindakan</option>
													<option value="22">PIC Kepegawaian</option>
												@elseif($user -> is_permission == 13)
													<option value="1">Admin</option>
													<option value="2">Perlengkapan</option>
													<option value="3">Kepegawaian</option>
													<option value="4">Keuangan</option>
													<option value="5">Infokom</option>
													<option value="6">laboratorium</option>
													<option value="7">penindakan</option>
													<option value="8">Pemeriksaan</option>
													<option value="9">Pengujian</option>
													<option value="10">Evaluasi(PE)</option>
													<option value="12">Kepala TU</option>
													<option value="13" selected>User</option>
													<option value="14">Sertifikasi</option>
													<option value="15">IT</option>
													<option value="16">Kabalai</option>
													<option value="17">PIC Infokom</option>
													<option value="18">PIC Inspeksi</option>
													<option value="19">PIC Sertifikasi</option>
													<option value="20">PIC Pengujian</option>
													<option value="21">PIC Penindakan</option>
													<option value="22">PIC Kepegawaian</option>
												@elseif($user -> is_permission == 12)
													<option value="1">Admin</option>
													<option value="2">Perlengkapan</option>
													<option value="3">Kepegawaian</option>
													<option value="4">Keuangan</option>
													<option value="5">Infokom</option>
													<option value="6">Laboratorium</option>
													<option value="7">Penindakan</option>
													<option value="8">Pemeriksaan</option>
													<option value="9">Pengujian</option>
													<option value="10">Evaluasi(PE)</option>
													<option value="11">Admin</option>
													<option value="12" selected>Kepala TU</option>
													<option value="13">User</option>
													<option value="14">Sertifikasi</option>
													<option value="15">IT</option>
													<option value="16">Kabalai</option>
													<option value="17">PIC Infokom</option>
													<option value="18">PIC Inspeksi</option>
													<option value="19">PIC Sertifikasi</option>
													<option value="20">PIC Pengujian</option>
													<option value="21">PIC Penindakan</option>
													<option value="22">PIC Kepegawaian</option>
												@elseif($user -> is_permission == 14)
													<option value="1">Admin</option>
													<option value="2">Perlengkapan</option>
													<option value="3">Kepegawaian</option>
													<option value="4">Keuangan</option>
													<option value="5">Infokom</option>
													<option value="6">Laboratorium</option>
													<option value="7">Penindakan</option>
													<option value="8">Pemeriksaan</option>
													<option value="9">Pengujian</option>
													<option value="10">Evaluasi(PE)</option>
													<option value="11">Admin</option>
													<option value="12" >Kepala TU</option>
													<option value="13">User</option>
													<option value="14"selected>Sertifikasi</option>
													<option value="15">IT</option>
													<option value="16">Kabalai</option>
													<option value="17">PIC Infokom</option>
													<option value="18">PIC Inspeksi</option>
													<option value="19">PIC Sertifikasi</option>
													<option value="20">PIC Pengujian</option>
													<option value="21">PIC Penindakan</option>
													<option value="22">PIC Kepegawaian</option>
												@elseif($user -> is_permission == 15)
													<option value="1">Admin</option>
													<option value="2">Perlengkapan</option>
													<option value="3">Kepegawaian</option>
													<option value="4">Keuangan</option>
													<option value="5">Infokom</option>
													<option value="6">Laboratorium</option>
													<option value="7">Penindakan</option>
													<option value="8">Pemeriksaan</option>
													<option value="9">Pengujian</option>
													<option value="10">Evaluasi(PE)</option>
													<option value="11">Admin</option>
													<option value="12" >Kepala TU</option>
													<option value="13">User</option>
													<option value="14">Sertifikasi</option>
													<option value="15" selected>IT</option>
													<option value="16">Kabalai</option>
													<option value="17">PIC Infokom</option>
													<option value="18">PIC Inspeksi</option>
													<option value="19">PIC Sertifikasi</option>
													<option value="20">PIC Pengujian</option>
													<option value="21">PIC Penindakan</option>
													<option value="22">PIC Kepegawaian</option>
												@elseif($user -> is_permission == 16)
													<option value="1">Admin</option>
													<option value="2">Perlengkapan</option>
													<option value="3">Kepegawaian</option>
													<option value="4">Keuangan</option>
													<option value="5">Infokom</option>
													<option value="6">Laboratorium</option>
													<option value="7">Penindakan</option>
													<option value="8">Pemeriksaan</option>
													<option value="9">Pengujian</option>
													<option value="10">Evaluasi(PE)</option>
													<option value="11">Admin</option>
													<option value="12" >Kepala TU</option>
													<option value="13">User</option>
													<option value="14">Sertifikasi</option>
													<option value="15">IT</option>
													<option value="16" selected>Kabalai</option>
													<option value="17">PIC Infokom</option>
													<option value="18">PIC Inspeksi</option>
													<option value="19">PIC Sertifikasi</option>
													<option value="20">PIC Pengujian</option>
													<option value="21">PIC Penindakan</option>
													<option value="22">PIC Kepegawaian</option>
												@elseif($user -> is_permission == 17)
													<option value="1">Admin</option>
													<option value="2">Perlengkapan</option>
													<option value="3">Kepegawaian</option>
													<option value="4">Keuangan</option>
													<option value="5">Infokom</option>
													<option value="6">Laboratorium</option>
													<option value="7">Penindakan</option>
													<option value="8">Pemeriksaan</option>
													<option value="9">Pengujian</option>
													<option value="10">Evaluasi(PE)</option>
													<option value="11">Admin</option>
													<option value="12" >Kepala TU</option>
													<option value="13">User</option>
													<option value="14">Sertifikasi</option>
													<option value="15">IT</option>
													<option value="16">Kabalai</option>
													<option value="17" selected>PIC Infokom</option>
													<option value="18">PIC Inspeksi</option>
													<option value="19">PIC Sertifikasi</option>
													<option value="20">PIC Pengujian</option>
													<option value="21">PIC Penindakan</option>
													<option value="22">PIC Kepegawaian</option>
												@elseif($user -> is_permission == 18)
													<option value="1">Admin</option>
													<option value="2">Perlengkapan</option>
													<option value="3">Kepegawaian</option>
													<option value="4">Keuangan</option>
													<option value="5">Infokom</option>
													<option value="6">Laboratorium</option>
													<option value="7">Penindakan</option>
													<option value="8">Pemeriksaan</option>
													<option value="9">Pengujian</option>
													<option value="10">Evaluasi(PE)</option>
													<option value="11">Admin</option>
													<option value="12" >Kepala TU</option>
													<option value="13">User</option>
													<option value="14">Sertifikasi</option>
													<option value="15">IT</option>
													<option value="16">Kabalai</option>
													<option value="17">PIC Infokom</option>
													<option value="18" selected>PIC Inspeksi</option>
													<option value="19">PIC Sertifikasi</option>
													<option value="20">PIC Pengujian</option>
													<option value="21">PIC Penindakan</option>
													<option value="22">PIC Kepegawaian</option>
												@elseif($user -> is_permission == 19)
													<option value="1">Admin</option>
													<option value="2">Perlengkapan</option>
													<option value="3">Kepegawaian</option>
													<option value="4">Keuangan</option>
													<option value="5">Infokom</option>
													<option value="6">Laboratorium</option>
													<option value="7">Penindakan</option>
													<option value="8">Pemeriksaan</option>
													<option value="9">Pengujian</option>
													<option value="10">Evaluasi(PE)</option>
													<option value="11">Admin</option>
													<option value="12" >Kepala TU</option>
													<option value="13">User</option>
													<option value="14">Sertifikasi</option>
													<option value="15">IT</option>
													<option value="16">Kabalai</option>
													<option value="17">PIC Infokom</option>
													<option value="18">PIC Inspeksi</option>
													<option value="19" selected>PIC Sertifikasi</option>
													<option value="20">PIC Pengujian</option>
													<option value="21">PIC Penindakan</option>
													<option value="22">PIC Kepegawaian</option>
												@elseif($user -> is_permission == 20)
													<option value="1">Admin</option>
													<option value="2">Perlengkapan</option>
													<option value="3">Kepegawaian</option>
													<option value="4">Keuangan</option>
													<option value="5">Infokom</option>
													<option value="6">Laboratorium</option>
													<option value="7">Penindakan</option>
													<option value="8">Pemeriksaan</option>
													<option value="9">Pengujian</option>
													<option value="10">Evaluasi(PE)</option>
													<option value="11">Admin</option>
													<option value="12" >Kepala TU</option>
													<option value="13">User</option>
													<option value="14">Sertifikasi</option>
													<option value="15">IT</option>
													<option value="16">Kabalai</option>
													<option value="17">PIC Infokom</option>
													<option value="18">PIC Inspeksi</option>
													<option value="19">PIC Sertifikasi</option>
													<option value="20" selected>PIC Pengujian</option>
													<option value="21">PIC Penindakan</option>
													<option value="22">PIC Kepegawaian</option>
												@elseif($user -> is_permission == 21)
													<option value="1">Admin</option>
													<option value="2">Perlengkapan</option>
													<option value="3">Kepegawaian</option>
													<option value="4">Keuangan</option>
													<option value="5">Infokom</option>
													<option value="6">Laboratorium</option>
													<option value="7">Penindakan</option>
													<option value="8">Pemeriksaan</option>
													<option value="9">Pengujian</option>
													<option value="10">Evaluasi(PE)</option>
													<option value="11">Admin</option>
													<option value="12" >Kepala TU</option>
													<option value="13">User</option>
													<option value="14">Sertifikasi</option>
													<option value="15">IT</option>
													<option value="16">Kabalai</option>
													<option value="17">PIC Infokom</option>
													<option value="18">PIC Inspeksi</option>
													<option value="19">PIC Sertifikasi</option>
													<option value="20">PIC Pengujian</option>
													<option value="21" selected>PIC Penindakan</option>
													<option value="22">PIC Kepegawaian</option>
												@elseif($user -> is_permission == 22)
													<option value="1">Admin</option>
													<option value="2">Perlengkapan</option>
													<option value="3">Kepegawaian</option>
													<option value="4">Keuangan</option>
													<option value="5">Infokom</option>
													<option value="6">Laboratorium</option>
													<option value="7">Penindakan</option>
													<option value="8">Pemeriksaan</option>
													<option value="9">Pengujian</option>
													<option value="10">Evaluasi(PE)</option>
													<option value="11">Admin</option>
													<option value="12" >Kepala TU</option>
													<option value="13">User</option>
													<option value="14">Sertifikasi</option>
													<option value="15">IT</option>
													<option value="16">Kabalai</option>
													<option value="17">PIC Infokom</option>
													<option value="18">PIC Inspeksi</option>
													<option value="19">PIC Sertifikasi</option>
													<option value="20">PIC Pengujian</option>
													<option value="21">PIC Penindakan</option>
													<option value="22" selected>PIC Kepegawaian</option>
												@endif
												</select>
										</div>
									</div><p>
									<div class="text-center">
										<button type="submit" class="btn btn-primary" style="width:150px;">Update User</button>
										<button type="reset" class="btn btn-secondary">Reset</button>
									</div>
								</form><!-- End Multi Columns Form -->
							</div>
						</div>
					</div>
				</div>
				<!-- ROW CLOSED -->
            </div>
            <!-- CONTAINER CLOSED -->
        </div>
    </div>
    <!--app-content closed-->
    
    <!-- JQUERY JS -->
    <script src="{{ asset('vendor/js/jquery.min.js')}}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('vendor/plugins/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{ asset('vendor/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- SPARKLINE JS-->
    <script src="{{ asset('vendor/js/jquery.sparkline.min.js')}}"></script>

    <!-- CHART-CIRCLE JS-->
    <script src="{{ asset('vendor/js/circle-progress.min.js')}}"></script>


    <!-- SIDE-MENU JS -->
    <script src="{{ asset('vendor/plugins/sidemenu/sidemenu.js')}}"></script>

    <!-- INTERNAL SELECT2 JS -->
    <script src="{{ asset('vendor/plugins/select2/select2.full.min.js')}}"></script>


    <!-- SIDEBAR JS -->
    <script src="{{ asset('vendor/plugins/sidebar/sidebar.js')}}"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{ asset('vendor/plugins/p-scroll/perfect-scrollbar.js')}}"></script>
    <script src="{{ asset('vendor/plugins/p-scroll/pscroll.js')}}"></script>
    <script src="{{ asset('vendor/plugins/p-scroll/pscroll-1.js')}}"></script>

    <!-- Color Theme js -->
    <script src="{{ asset('vendor/js/themeColors.js')}}"></script>

    <!-- Sticky js -->
    <script src="{{ asset('vendor/js/sticky.js')}}"></script>

    <!-- CUSTOM JS -->
    <script src="{{ asset('vendor/js/custom.js')}}"></script>

	<!-- Perfect SCROLLBAR JS-->
	<script src="{{ asset('vendor/plugins/p-scroll/perfect-scrollbar.js')}}"></script>
	<script src="{{ asset('vendor/plugins/p-scroll/pscroll.js')}}"></script>
	<script src="{{ asset('vendor/plugins/p-scroll/pscroll-1.js')}}"></script>

	<!-- FORMVALIDATION JS -->
	<script src="{{ asset('vendor/js/jquery.validate.js')}}"></script>

    <!-- INTERNAL SELECT2 JS -->
    <script src="{{ asset('vendor/plugins/select2/select2.full.min.js')}}"></script>
    <script src="{{ asset('vendor/js/select2.js')}}"></script>

    </x-HomeLayout>
	
	<script type="text/javascript">
    
	setTimeout(function() {
			document.getElementById('success').style.display = 'none';
		}, 4000); // <-- time in milliseconds
		$( document ).ready( function () {
			$( "#signupForm" ).validate( {
				rules: {
					nama: {
						required: true,
						minlength: 2
					},
					username: {
						required: true
					},
                    email: {
						required: true,
						email: true
					},
                    password: {
						required: true,
						minlength: 8
					},
					confirm_password: {
						required: true,
						minlength: 8,
						equalTo: "#password"
					}

				},
				messages: {
					nama: {
						required: "Nama Menu harus diisi",
						minlength: "Harus berisi minimal 2 karakter"
					},
					username: {
						required: "URL tujuan harus diisi"
					},
                    email : {
						required: "Emaill harus diisi",
						email: "Tolong masukkan email yang valid"
					},
                    password: {
						required: "Tolong masukkan Password",
						minlength: "Password anda harus lebih dari 8 karakter"
					},
					confirm_password: {
						required: "Tolong konfirmasi password anda",
						minlength: "Password anda harus lebih dari 8 karakter",
						equalTo: "Tolong masukkan password yang sama dengan di atas"
					}			
                },
				errorElement: "em",
				errorPlacement: function ( error, element ) {
					// Add the `help-block` class to the error element
					error.addClass( "help-block" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.parent( "label" ) );
					} else {
						error.insertAfter( element );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".mb-12" ).addClass( "has-error" ).removeClass( "has-success" );
					$( element ).parents( ".form-control" ).addClass( "is-invalid" ).removeClass( "valid" );
					
					
				},
				unhighlight: function (element, errorClass, validClass) {
					$( element ).parents( ".mb-12" ).addClass( "has-success" ).removeClass( "has-error" );
					$( element ).parents( ".form-control" ).addClass( "valid" ).removeClass( "is-invalid" );
				
				}
			} );
		} );
	</script>