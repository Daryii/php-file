<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @stack("style")
    <title>@yield("title")</title>
</head>
<body>
   <nav>
       <ul>
           <li><a href="/home">Home</a></li>
           <li><a href="/playList">Playlists</a></li>
           <li><a href="/genre">Genre</a></li>
       </ul>
   </nav>

@yield("content")

   <footer>
       &copy; 2024 Daryi Page. All rights reserved.
   </footer>
</body>
</html>
