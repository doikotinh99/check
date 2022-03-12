<?php
//print_r($product);
?>

<form action="/san-pham/add-prd" method="post">
  <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text" id="basic-addon1">@</span>
    </div>
    <input type="text" class="form-control" name="prd_title" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
  </div>
  <button type="submit">sub</button>
  @csrf
</form>
