@extends('layouts.app')

@include('news.menu')

@section('content')
    <form method="POST" action="http://laravellesson1.loc/" style="border: 1px solid black; display: flex; flex-flow: nowrap column;">
        <input type="text" name="fio" placeholder="What's your name?">
        <input type="text" name="email" placeholder="e-mail">
        <input type="text" name="newsTitle" placeholder="Title of the News">
        <textarea name="descriptionNews" style="width: 100%; height: 500px;">Describe the news</textarea>
        <input type="submit" value="Send">
    </form>
@endsection
