@extends("Layouts.master")
@push("style")
    <link rel="stylesheet" href="css/otherStyle.css">
@endpush
@section("content")
    <form action="/genre/store" method="Post">
        @csrf
        <label for="genreName">Vul hier de naam van het genra in: </label>
        <input id="genreName" name="genreName" type="text">
        <input value="Send me!" type="submit">
    </form>
@endsection
