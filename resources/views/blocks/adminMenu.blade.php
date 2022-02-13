@auth()
    @if (auth()->user()->is_admin == true)
    <div class="dropdown">
        <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            {{__('labels.admin')}}
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="{{ route('admin::categories::index') }}">{{__('labels.category')}}</a></li>
            <li><a class="dropdown-item" href="{{ route('admin::news::index') }}">{{__('labels.news')}}</a></li>
            <li><a class="dropdown-item" href="{{ route('admin::profiles::index') }}">{{__('labels.profiles')}}</a></li>
        </ul>
    </div>
    @endif
@endauth


