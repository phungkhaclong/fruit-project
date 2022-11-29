@foreach($binhluans as $cmt)
<div class="media mb-3">
    <div class="mr-2">
        <small class="text-muted">{{$cmt->name}}:</small>
    </div>
    <div class="media-body">
        <p>{{$cmt->noidung}}</p>
        <small class="text-muted">{{$cmt->ngaydang}}</small>
    </div>
</div>
<hr>
@endforeach