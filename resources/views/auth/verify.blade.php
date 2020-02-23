@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('common.verify_email')</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            @lang('common.email_success')
                        </div>
                    @endif

                    @lang('common.email_noti')
                    @lang('common.email_not_receive'), <a href="{{ route('verification.resend') }}">@lang('common.email_request')</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
