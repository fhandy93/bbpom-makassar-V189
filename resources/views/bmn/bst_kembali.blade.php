<x-HomeLayout>
	<!--app-content open-->
	<div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title"> {{ $jns == 1 ? 'Pengembalian' : 'Peminjaman' }}</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)"> {{ $jns == 1 ? 'Pengembalian' : 'Peminjaman' }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Input Data</li>
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
					<div class="col-lg-1 col-md-1"></div>
					<div class="col-lg-10 col-md-10">
					
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Formulir BAST  {{ $jns == 1 ? 'Pengembalian' : 'Peminjaman' }}</h3>
							</div>
							<div class="card-body">
								<form id="signupForm" method="post" class="form-horizontal" action="{{ $jns == 1 ? '/bmn/bast-pengembalian-store' : '/bmn/bast-peminjaman-store' }} " >
									@csrf
									@method('post')

									<div class="form-row">
										<div class="col-xl-8 mb-12 ">
											<label for="user_id" class="form-label">Nama Pegawai</label>
											<select name="user_id" class="form-control form-select select2"  onchange="showDetail(this.value)">
												<option value="aa" selected disabled>Pilih Nama Pegawai ...</option>
												@foreach($data as $item)
            									<option value="{{$item->id}}">{{$item->name}}</option>
												@endforeach
												
											</select>	
											@error('user_id')
												<span class="text-danger"> {{ $message }} </span>
											@enderror
										</div>
									</div>
									@if($jns == 1)
									<div class="form-row">
										<div class="col-xl-8 mb-12 ">
											<label for="no_surat" class="form-label">Nomor Surat</label>
											<input type="text" class="form-control  @error('no_surat') is-invalid @enderror" name="no_surat" id="no_surat">
											@error('no_surat')
												<span class="text-danger"> {{ $message }} </span>
											@enderror
										</div>
									</div>	
									@endif
									<div class="form-row" id="opt" style="display: inline;">
										<div class="form-group col-xl-6 mb-12 ">
											<label class="form-label">Jumlah Barang Yang Akan Dikembalikan</label>
											<select name="jml_barang" id="jml" onchange="jmlbarang()" class="form-control form-select select2" data-bs-placeholder="Select Country">
												<option value="aa" selected disabled>Pilih Jumlah Barang...</option>		
												<option value="1" >1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
											</select>
										</div>
									</div>
							
									<br>
									<div class="card">
										<div class="card-header"  style="display: none;" id="dtl">
											<h3 class="card-title">Detail Barang</h3>
										</div>
										<div class="card-body">
											<div id="formbarang" >
											</div>
										</div>
									</div>
									@error('nama_barang')
										<span class="text-danger"> {{ $message }} </span>
										<br>
									@enderror	
									<div class="form-row">
										<div class="form-group col-xl-8 mb-12 ">
											<label class="form-label">Kondisi Barang</label>
											<select name="kondisi" class="form-control form-select select2" data-bs-placeholder="Jenis Pemeliharaan">
												<option value="aa" selected disabled>Pilih Kondisi ...</option>
												<option value="Baik">Baik</option>
												<option value="Rusak Ringan">Rusak Ringan</option>
												<option value="Rusak Berat">Rusak Berat</option>
											</select>
											@error('kondisi')
												<span class="invalid-feedback"> {{ $message }} </span>
											@enderror
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-xl-8 mb-12 ">
											<label class="form-label">Petugas BMN</label>
											<select name="petugas" class="form-control form-select select2" data-bs-placeholder="Jenis Pemeliharaan">
												<option value="aa" selected disabled>Pilih Petugas BMN ...</option>
												@foreach($bmn as $index => $bmn)
													<option value="{{$bmn->id}}">{{$bmn->name}}</option>
												@endforeach
											</select>
											@error('petugas')
												<span class="invalid-feedback"> {{ $message }} </span>
											@enderror
										</div>
									</div>
									<p>
									<div class="text-center">
										<button type="submit" value="save" class="btn btn-primary" style="width:150px;">Tambah Data</button>
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

	<!-- DATEPICKER JS -->
	<script src="{{ asset('vendor/plugins/date-picker/date-picker.js')}}"></script>
     <script src="{{ asset('vendor/plugins/date-picker/jquery-ui.js')}}"></script>
     <script src="{{ asset('vendor/plugins/input-mask/jquery.maskedinput.js')}}"></script>

    <!-- INTERNAL SELECT2 JS -->
    <script src="{{ asset('vendor/plugins/select2/select2.full.min.js')}}"></script>
    <script src="{{ asset('vendor/js/select2.js')}}"></script>

	 <!-- INTERNAL Bootstrap-Datepicker js-->
     <script src="{{ asset('vendor/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

	<!-- Swet Alert -->
	<script src="{{ asset ('vendor/plugins/sweet-alert/sweetalert.min.js')}}"></script>
    </x-HomeLayout>
	
	<script type="text/javascript">
    	var date = $('#tgl_berangkat').datepicker({ dateFormat: 'dd/mm/yy' }).val();
		var date = $('#tgl_kembali').datepicker({ dateFormat: 'dd/mm/yy' }).val();
		var date = $('#tgl').datepicker({ dateFormat: 'dd/mm/yy' }).val();
		setTimeout(function() {
			document.getElementById('success').style.display = 'none';
		}, 4000); // <-- time in milliseconds
	
		
    function showDetail(str1) {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
	var obj = JSON.parse(this.responseText);
	var objLength = Object.keys(obj).length;
	document.getElementById('nip').value=obj[0].nip;
	document.getElementById('pangkat').value=obj[0].pangkat;
	document.getElementById('jabatan').value=obj[0].jabatan;

	}
	xhttp.open("GET", "show-nip/"+str1);
	xhttp.send();
	
	}
	$('.show_confirm').click(function(event) {
        var form =  $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: `Anda yakin ingin mengirim data ini ?`,
            text: "Setelah data terkirim, data tidak dapat diedit kembali.",
            icon: "info",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
            form.submit();
            }
        });
    });
	function jmlbarang(){
        var numberOfRows = document.getElementById("jml").value;
			
		document.getElementById('opt').style.display = 'none';
		document.getElementById('dtl').style.display = 'inline';

        // Get the container where the rows will be added
        const container = document.getElementById('formbarang');

        for (let i = 0; i < numberOfRows; i++) {
            // Create a new div element with class "form-row"
            const formRow = document.createElement('div');
            formRow.className = 'form-row';

            // Create the inner column div
            const colDiv = document.createElement('div');
            colDiv.className = 'col-xl-6 mb-12';

            // Create the label
            const label = document.createElement('label');
            label.setAttribute('for', `nama_barang-${i+1}`);
            label.className = 'form-label';
            label.textContent = `Nama Barang ${i+1}`;

            // Create the input
            const input = document.createElement('input');
            input.type = 'text';
            input.id = `nama_barang-${i}`;
            input.className = 'form-control';
            input.name = `nama_barang[${i}]`;

            // Add label and input to the column div
            colDiv.appendChild(label);
            colDiv.appendChild(input);

            // Add column div to the form row
            formRow.appendChild(colDiv);

            // Add form row to the container
            container.appendChild(formRow);

			// Create a new div element with class "form-row"
			const formRow2 = document.createElement('div');
            formRow2.className = 'form-row';

            // Create the inner column div
            const colDiv2 = document.createElement('div');
            colDiv2.className = 'col-xl-6 mb-12';

            // Create the label
            const label2 = document.createElement('label');
            label2.setAttribute('for', `type-${i+1}`);
            label2.className = 'form-label';
            label2.textContent = `Tipe Barang ${i+1}`;

            // Create the input
            const input2 = document.createElement('input');
            input2.type = 'text';
            input2.id = `type-${i}`;
            input2.className = 'form-control';
            input2.name = `type[${i}]`;

            // Add label and input to the column div
            colDiv2.appendChild(label2);
            colDiv2.appendChild(input2);

            // Add column div to the form row
            formRow2.appendChild(colDiv2);

            // Add form row to the container
            container.appendChild(formRow2);

			// Create a new div element with class "form-row"
			const formRow3 = document.createElement('div');
            formRow3.className = 'form-row';

            // Create the inner column div
            const colDiv3 = document.createElement('div');
            colDiv3.className = 'col-xl-6 mb-12';

            // Create the label
            const label3 = document.createElement('label');
            label3.setAttribute('for', `nup-${i+1}`);
            label3.className = 'form-label';
            label3.textContent = `Kode Barang/NUP Barang ${i+1}`;

            // Create the input
            const input3 = document.createElement('input');
            input3.type = 'text';
            input3.id = `nup-${i}`;
            input3.className = 'form-control';
            input3.name = `nup[${i}]`;

            // Add label and input to the column div
            colDiv3.appendChild(label3);
            colDiv3.appendChild(input3);

            // Add column div to the form row
            formRow3.appendChild(colDiv3);

            // Add form row to the container
            container.appendChild(formRow3);


			// Create a new div element with class "form-row"
			const formRow4 = document.createElement('div');
            formRow4.className = 'form-row';

            // Create the inner column div
            const colDiv4 = document.createElement('div');
            colDiv4.className = 'col-xl-4 mb-12';

            // Create the label
            const label4 = document.createElement('label');
            label4.setAttribute('for', `tahun-${i+1}`);
            label4.className = 'form-label';
            label4.textContent = `Tahun Barang ${i+1}`;

            // Create the input
            const input4 = document.createElement('input');
            input4.type = 'text';
            input4.id = `tahun-${i}`;
            input4.className = 'form-control';
            input4.name = `tahun[${i}]`;

            // Add label and input to the column div
            colDiv4.appendChild(label4);
            colDiv4.appendChild(input4);

            // Add column div to the form row
            formRow4.appendChild(colDiv4);

            // Add form row to the container
            container.appendChild(formRow4);


			// Create a new div element with class "form-row"
			const formRow5 = document.createElement('div');
            formRow5.className = 'form-row';

            // Create the inner column div
            const colDiv5 = document.createElement('div');
            colDiv5.className = 'col-xl-2 mb-12';

            // Create the label
            const label5 = document.createElement('label');
            label5.setAttribute('for', `jumlah-${i+1}`);
            label5.className = 'form-label';
            label5.textContent = `Jumlah Barang ${i+1}`;

            // Create the input
            const input5 = document.createElement('input');
            input5.type = 'text';
            input5.id = `jumlah-${i}`;
            input5.className = 'form-control';
            input5.name = `jumlah[${i}]`;

            // Add label and input to the column div
            colDiv5.appendChild(label5);
            colDiv5.appendChild(input5);

            // Add column div to the form row
            formRow5.appendChild(colDiv5);

            // Add form row to the container
            container.appendChild(formRow5);
        }

	

        }
	</script>          