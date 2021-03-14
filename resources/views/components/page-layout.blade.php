@props(['pageTitle' => 'Cable Unet'])

<!DOCTYPE html>
<html lang="en">
<x-head title="{{$pageTitle}}" />

<body class="bg-gray-100 font-family-karla flex">
    {{ $slot }}
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</body>

</html>