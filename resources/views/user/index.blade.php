{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
</head>
<body>
    <?php
        if(isset($name)){
            echo $name;
        }
    ?>
    <table border="1">
        <thead>
            <th>Name</th>
            <th>Email</th>
            <th>Age</th>
        </thead>
        <tbody>
            <tr>
                <td>Adam</td>
                <td>adam@mail.com</td>
                <td>36</td>
            </tr>
            <tr>
                <td>Adam</td>
                <td>adam@mail.com</td>
                <td>36</td>
            </tr>
            <tr>
                <td>Adam</td>
                <td>adam@mail.com</td>
                <td>36</td>
            </tr>
        </tbody>
    </table>
</body>
</html> --}}
@extends('layouts.app')

@section('content')
    <users-component></users-component>
@endsection