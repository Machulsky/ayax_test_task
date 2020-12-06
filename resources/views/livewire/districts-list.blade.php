<div>
    <div class="input-group input-group-sm">
        <div class="input-group-prepend">
            <span class="input-group-text" style="width: 140px" id="inputGroup-sizing-lg">Регион</span>
        </div>
        <input type="text" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" wire:model="region">
    </div>

    <div class="input-group input-group-sm">
        <div class="input-group-prepend">
            <span class="input-group-text" style="width: 140px" id="inputGroup-sizing-lg">Населённый пункт</span>
        </div>
        <input type="text" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" wire:model="locality">
    </div>

    <div class="input-group input-group-sm">
        <div class="input-group-prepend">
            <span class="input-group-text " style="width: 140px" id="inputGroup-sizing-lg">Район</span>
        </div>
        <input type="text" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" wire:model="district">
    </div>

<ul class="list-group">

    @foreach($items as $item)
        @if($item->dname ?? false)
{{--            Item is a district--}}

            <li class="list-group-item" wire:key="d-{{$item->dname_translit}}">
                <h6>Район {{$item->dname}}</h6>
                <p>Регион: <b>{{$item->rname}}</b></p>
                <p>Населённый пункт: <b>{{$item->lname}}</b></p>

            </li>
        @else
{{--                Item is a locality--}}
            <li class="list-group-item"  wire:key="d-{{$item->lname_translit}}">
                <h6>Населённый пункт {{$item->lname}}</h6>
                <p>Регион: <b>{{$item->rname}}</b></p>
            </li>
        @endif
    @endforeach

    <div class=" mt-3">
        {{$items->links()}}
    </div>

</ul>
</div>




