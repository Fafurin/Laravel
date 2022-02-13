@include('blocks.login')
<ul class="nav justify-content-center">
    <li class="nav-item">
        <a class="nav-link active" href="/">{{__('labels.home')}}</a>
    </li>
    @foreach($menu as $item)
        <li class="nav-item">
        <a href="{{ route('categories::news', ['categoryId' => $item->id]) }}" class="nav-link">{{ $item->title }}</a>
        </li>
    @endforeach
    <li class="nav-item">
        <a class="btn btn-light" href="{{ route('locale', ['locale' => 'ru']) }}">ru</a>
    </li>
    <li class="nav-item">
        <a class="btn btn-light" href="{{ route('locale', ['locale' => 'en']) }}">en</a>
    </li>
</ul>
<hr>
