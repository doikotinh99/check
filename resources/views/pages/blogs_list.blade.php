<section class="container pt-2">
  <?php for($i = 0; $i < 10; $i++){ ?>
  <a href="#">
    <div class="card mb-3">
      <div class="row no-gutters">
        <div class="col-md-4 text-center">
          <img src="/upload/images/product_1.png" alt="...">
        </div>
        <div class="col-md-8 p-4">
          <div class="card-body h-100 p-0">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text card-time"><small class="text-muted">Last updated 3 mins ago</small></p>
            <button class="btn">Chi tiết</button>
          </div>
        </div>
      </div>
    </div>
  </a>
  <?php } ?>
  <div class="w-100 text-center mt-4">
      <button class="btn btn-danger bg-red">Xem thêm</button>
  </div>
</section>