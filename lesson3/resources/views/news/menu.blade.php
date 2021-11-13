@section('menu')
<ul class="navbar-nav ml-auto">
    <li class="nav-item" style="padding: 0px 10px 0px 10px;"><a href="{{ route('homepage') }}">Homepage</a></li>
    <li class="nav-item" style="padding: 0px 10px 0px 10px;"><a href="{{ route('about') }}">About us</a></li>
    <li class="nav-item" style="padding: 0px 10px 0px 10px;"><a href="{{ route('news.index') }}">Some news</a></li>
    <li class="nav-item" style="padding: 0px 10px 0px 10px;"><a href="{{ route('categories.categoriesIndex') }}">Categories of news</a></li>
    <li class="nav-item" style="padding: 0px 10px 0px 10px;"><a href="{{ route('laravelHomepage') }}">Laravel homepage</a></li>
</ul>
@endsection
