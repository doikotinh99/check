<?php $countI = 0; ?>
@foreach($vote as $val)
    <?php $countI++; ?>
    <div class="bg-white">
        <span class="font-weight-bold">{{$val->user->name}}</span><br>
        <span class="text-danger">
                @for ($i = 0; $i < $val->vote; $i++)
                <i class="bi bi-star-fill"></i>
            @endfor
            </span>
        <p class="pl-3">
            {{$val->comment}}
        </p>
    </div>
@endforeach
