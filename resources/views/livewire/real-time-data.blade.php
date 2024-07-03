<div>
@vite(['resources/css/app.css', 'resources/js/echo.js'])

@foreach($data as $item)
                <div>{{ $item->phone }}</div>
@endforeach

</div>
