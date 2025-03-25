<x-WelcomeLayout>
<div class="container-login100">
    <div class="col-xl-8">
    <div class="card border p-0 pb-3">
        <div class="card-header border-0 pt-3">
            <div class="card-options">
                <a href="javascript:void(0)" class="card-options-remove" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a>
            </div>
        </div>
        <div class="card-body text-center">
            <span class=""><svg xmlns="http://www.w3.org/2000/svg" height="60" width="60" viewBox="0 0 24 24"><path fill="#fad383" d="M15.728,22H8.272a1.00014,1.00014,0,0,1-.707-.293l-5.272-5.272A1.00014,1.00014,0,0,1,2,15.728V8.272a1.00014,1.00014,0,0,1,.293-.707l5.272-5.272A1.00014,1.00014,0,0,1,8.272,2H15.728a1.00014,1.00014,0,0,1,.707.293l5.272,5.272A1.00014,1.00014,0,0,1,22,8.272V15.728a1.00014,1.00014,0,0,1-.293.707l-5.272,5.272A1.00014,1.00014,0,0,1,15.728,22Z"/><circle cx="12" cy="16" r="1" fill="#f7b731"/><path fill="#f7b731" d="M12,13a1,1,0,0,1-1-1V8a1,1,0,0,1,2,0v4A1,1,0,0,1,12,13Z"/></svg></span>
            <h4 class="h4 mb-0 mt-3">{{ __('Verify Your Email Address') }}</h4><p>
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
                @endif
                <p class="card-text">{{ __('Before proceeding, please check your email for a verification link.') }}
                {{ __('If you did not receive the email') }},</p>
        </div>
        <div class="card-footer text-center border-0 pt-0">
            <div class="row">
                <div class="text-center">
                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                </form>
                </div>
            </div>
        </div>
    </div>
</div></div>

</x-WelcomeLayout>
