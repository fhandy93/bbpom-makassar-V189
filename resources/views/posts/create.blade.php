<x-HomeLayout> 
<div class="main-content app-content mt-0">
    <div class="side-app">
        <div class="main-container container-fluid">
            <div class="page-header">
                <h1 class="page-title">Input Post Artikel</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Posts</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Posts Input</li>
                    </ol>
                </div>	
            </div>
            <div class="row">
            @if (session() -> has('succes'))
                <div class="card-body text-center" id="success"> 
                    <span class=""><svg xmlns="http://www.w3.org/2000/svg" height="60" width="60" viewBox="0 0 24 24"><path fill="#13bfa6" d="M10.3125,16.09375a.99676.99676,0,0,1-.707-.293L6.793,12.98828A.99989.99989,0,0,1,8.207,11.57422l2.10547,2.10547L15.793,8.19922A.99989.99989,0,0,1,17.207,9.61328l-6.1875,6.1875A.99676.99676,0,0,1,10.3125,16.09375Z" opacity=".99"/><path fill="#71d8c9" d="M12,2A10,10,0,1,0,22,12,10.01146,10.01146,0,0,0,12,2Zm5.207,7.61328-6.1875,6.1875a.99963.99963,0,0,1-1.41406,0L6.793,12.98828A.99989.99989,0,0,1,8.207,11.57422l2.10547,2.10547L15.793,8.19922A.99989.99989,0,0,1,17.207,9.61328Z"/></svg></span>
                    <h4 class="h4 mb-0 mt-3">Success</h4>
                    <p class="card-text">{{ session() -> get('succes')}}</p>
                </div>
			@endif  
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Form Tambah Category</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">
                                    <label for="cover">Cover</label>
                                    <input type="file" name="cover" class="form-control @error('cover') is-invalid @enderror" value="{{old('cover')}}" id="cover" required>
                                    @error('cover')
                                    <div class="invalid-feedback">
                                        {{ $message }}    
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{old('title')}}" required>
                                    @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}    
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="desc">Description</label>
                                    <textarea class="ckeditor form-control @error('desc') is-invalid @enderror" cols="30" rows="10" name="desc" id="desc" >{{old('content')}}</textarea>
                                    @error('desc')
                                    <div class="invalid-feedback">
                                        {{ $message }}    
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select name="category" id="category" class="form-control @error('category') is-invalid @enderror" required>
                                        <option value="" disabled selected>Choose one</option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                    <div class="invalid-feedback">
                                        {{ $message }}    
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tag">Tags</label>
                                    <select name="tags[]" id="tag" class="form-control select2 @error('tags') is-invalid @enderror" required multiple>
                                        @foreach ($tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('tags')
                                    <div class="invalid-feedback">
                                        {{ $message }}    
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="keywords">Keywords</label>
                                    <input type="text" name="keywords" class="form-control @error('keywords') is-invalid @enderror" value="{{old('keywords')}}" required>
                                    @error('keywords')
                                    <div class="invalid-feedback">
                                        {{ $message }}    
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="meta_desc">Meta Desc</label>
                                    <input type="text" name="meta_desc" class="form-control @error('meta_desc') is-invalid @enderror" value="{{old('meta_desc')}}" required>
                                    @error('meta_desc')
                                    <div class="invalid-feedback">
                                        {{ $message }}    
                                    </div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- JQUERY JS -->
<script src="{{ asset('vendor/js/jquery.min.js')}}"></script>

<!-- BOOTSTRAP JS -->
<script src="{{ asset('vendor/plugins/bootstrap/js/popper.min.js')}}"></script>
<script src="{{ asset('vendor/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

<!-- SPARKLINE JS-->
<script src="{{ asset('vendor/js/jquery.sparkline.min.js')}}"></script>

<!-- SIDE-MENU JS -->
<script src="{{ asset('vendor/plugins/sidemenu/sidemenu.js')}}"></script>

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

 <!-- CkEditorJs -->
 <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
 <script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
    CKEDITOR.replace('desc', {
        filebrowserUploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "Choose Some Tags"
        });
    });
</script>
</x-HomeLayout>