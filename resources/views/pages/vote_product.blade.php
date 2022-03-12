<div class="row">
    <div class="col-sm-12 col-md-4 text-center border text-denger">
        <p>Đánh giá</p>
        <?php
            $sum = 0;
            $vote1s = 0;
            $vote2s = 0;
            $vote3s = 0;
            $vote4s = 0;
            $vote5s = 0;
            foreach ($votes as $val){
                $sum += $val->vote;
                if($val->vote == 1){
                    $vote1s ++;
                }
                if($val->vote == 2){
                    $vote2s ++;
                }
                if($val->vote == 3){
                    $vote3s ++;
                }
                if($val->vote == 4){
                    $vote4s ++;
                }
                if($val->vote == 5){
                    $vote5s ++;
                }
            }
        if(count($votes) == 0){
            $voteT = 0;
        }else{
            $voteT = $sum/count($votes);
        }
        ?>
        <p>{{Round($voteT, 1)}}/5<i class="bi bi-star-fill"></i></p>
        <p>Có <?php echo count($votes) ?> đánh giá</p>
    </div>
    <div class="col-sm-12 col-md-8 border d-flex align-items-center text-center">
        <button class="btn btn-outline-danger px-3 ml-2 ml-auto" disabled>1 <i class="bi bi-star-fill"></i> ({{$vote1s}}) </button>
        <button class="btn btn-outline-danger px-3 ml-2" disabled>2 <i class="bi bi-star-fill"></i> ({{$vote2s}}) </button>
        <button class="btn btn-outline-danger px-3 ml-2" disabled>3 <i class="bi bi-star-fill"></i> ({{$vote3s}}) </button>
        <button class="btn btn-outline-danger px-3 ml-2" disabled>4 <i class="bi bi-star-fill"></i> ({{$vote4s}}) </button>
        <button class="btn btn-outline-danger px-3 ml-2 mr-auto" disabled>5 <i class="bi bi-star-fill"></i> ({{$vote5s}}) </button>
    </div>
</div>
<div class="mt-2" id="list_cmtP">
    @include("pages.list_cmt_prd")

</div>
<div class="text-center w-100 text-primary">
    <span class="pointer" id="btn_more_cmt"  data-product="{{$product->id}}" data-skip="5">Xem thêm</span>
</div>
