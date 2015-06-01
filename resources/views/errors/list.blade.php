@if ($errors->any())
    <div class="ctr-close">
        <a href="javascript:void(0);" >
            <i class="fa fa-close"></i>
        </a>
    </div>
    <ul class="flash alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif