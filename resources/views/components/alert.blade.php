@php
switch ($type) {
    case 'success':
        $color = 'green';
        break;
    
    case 'fail':
        $color = 'orange';
        break;
    
    default:
        $color = 'indigo';
        break;
}
@endphp
<div class="rounded-lg my-3 bg-{{$color}}-100 border-l-4 border-{{$color}}-500 text-{{$color}}-700 p-4" role="alert">
    <p class="font-bold">{{$type ?? ''}}</p>
    <p>{{$message}}</p>
</div>
