<!-- <script>
function updateTotalPrice(input, price) {
  let quantity = input.value;
  let total = quantity * price;
  let totalElement = input.parentNode.parentNode.querySelector('.total-price');
  totalElement.textContent = '$' + total.toFixed(2);
}
</script> -->

<?php


function component($productname, $productprice, $productimg, $productid) {
    $element = "    
    <div class='col-md-3 col-sm-6 my-3 my-md-0'>
        <form action='prac_shop.php' method='post'>
            <div class='card shadow'>
                <div>
                    <img src='$productimg' alt='Image 1' class='img-fluid card-img-top'>
                </div>
            </div>
            <div class='card-body'>
                <h5 class='card-title'>$productname</h5>
                <h5>
                    <span class='price'>$$productprice</span>
                </h5>

                <button type='submit' class='btn btn-warning my-3' name='add'>Add to Cart</button>
                <input type='hidden' name='product_id' value='$productid'>
            </div>
        </form>
    </div>
    ";

    echo $element;
}

function cartElement($productimg, $productname, $productprice, $productid) {
  $quantity = 1;
    $element = "<form action='cart.php?action=remove&id=$productid' method='post' class='cart-items'>
    <div class='border rounded'>
      <div class='row bg-white'>
        <div class='col-md-3 pl-0'>
          <img src=$productimg alt='Image1' class='img-fluid'>
        </div>
        <div class='col-md-6'>
          <h5 class='pt-2'>$productname</h5>
          <h5 class='pt-2 total-price'>$$productprice</h5>
          <button type='submit' class='btn btn-danger mx-2' name='remove'>Remove</button>
        </div>
        <div class='col-md-3 py-5'
          <div>
          <button type=\"submit\" onclick=\"decreaseValue()\" class=\"btn bg-light border rounded-circle\" name=\"minus\"><i class=\"fas fa-minus\"></i></button>
          <button type=\"submit\" onclick=\"increaseValue()\" class=\"btn bg-light border rounded-circle\" name=\"plus\" ><i class=\"fas fa-plus\"></i></button>
          </div>
        </div>
      </div>
    </div>
  </form>
  ";
  echo $element;
}


// 
?>