@extends("Layouts.master")
@push("style")
    <link rel="stylesheet" href="css/otherStyle.css">
@endpush
@section("content")
    <form action="/songs/store" method="Post">
        @csrf
        <label for="songsName">Vul hier de naam van het Songs in: </label>
        <input id="songsName" name="songsName" type="text">
        <input value="Send me!" type="submit">
    </form>
@endsection
