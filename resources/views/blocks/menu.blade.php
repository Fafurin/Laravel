<div class="dropdown">
    <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        {{__('labels.admin')}}
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <li><a class="dropdown-item" href="{{ route('admin::categories::index') }}">{{__('labels.category')}}</a></li>
        <li><a class="dropdown-item" href="{{ route('admin::news::index') }}">{{__('labels.news')}}</a></li>
    </ul>
    <div class="btn-group">
        <a href="#" class="btn btn-success active" aria-current="page">{{__('labels.home')}}</a>
        <a href="#" class="btn btn-success">{{__('labels.categories')}}</a>
        <a href="#" class="btn btn-success">{{__('labels.news')}}</a>
    </div>
</div>


