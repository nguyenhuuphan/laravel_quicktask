@if (count($errors) > 0)
    <!-- Form Error List -->
    <div class="errors-wrapper alert alert-danger">
        <strong>@lang('common.error_msg')</strong>

        <br><br>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif