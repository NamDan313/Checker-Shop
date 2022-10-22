
//hien thi chi tiet san pham
function showdetail(ten, gia, hinh, mota, soluong) {
  document.getElementById("detail5").style.display = "block";
  document.getElementById("ten").innerHTML = ten;
  document.getElementById("gia1").innerHTML = gia;
  document.getElementById("hinh").src = hinh;
  document.getElementById("mota").innerHTML = mota;
  document.getElementById("sl").innerHTML = soluong;
  x=Number(soluong);
  if(x==0){
    document.getElementById("addtoc").disabled=true;
  }
  else{
    document.getElementById("addtoc").disabled=false;
  }
}
/*function xoacart() {
  var remove_cart = document.getElementsByClassName("btn-danger");
  for (var i = 0; i < remove_cart.length; i++) {
    var button = remove_cart[i]
    button.addEventListener("click", function () {
      var button_remove = event.target
      button_remove.parentElement.parentElement.remove()
    })
  }
}*/
//cap nhat gio hang
function updatecart() {
  var cart_item = document.getElementsByClassName("cart-items")[0];
  var cart_rows = cart_item.getElementsByClassName("cart-row");
  var total = 0;
  for (var i = 0; i < cart_rows.length; i++) {
    var cart_row = cart_rows[i]
    var price_item = cart_row.getElementsByClassName("cart-price ")[0]
    var quantity_item = cart_row.getElementsByClassName("cart-quantity-input")[0]
    var price = parseFloat(price_item.innerText)// chuyển một chuổi string sang number để tính tổng tiền.
    var quantity = quantity_item.value // lấy giá trị trong thẻ input
    total = total + (price * quantity)
  }
  document.getElementsByClassName("cart-total-price")[0].innerText = total;
  // Thay đổi text = total trong .cart-total-price. Chỉ có một .cart-total-price nên mình sử dụng [0]
}
/*var quantity_input = document.getElementsByClassName("cart-quantity-input");
for (var i = 0; i < quantity_input.length; i++) {
  var input = quantity_input[i];
  input.addEventListener("change", function (event) {
    var input = event.target
    if (isNaN(input.value) || input.value <= 0) {
      input.value = 1;
    }
    updatecart()
  })
}*/
// Thêm vào giỏ
/*var add_cart = document.getElementsByClassName("btn-cart");
for (var i = 0; i < add_cart.length; i++) {
  var add = add_cart[i];
  add.addEventListener("click", function (event) {

    var button = event.target;
    var product = button.parentElement.parentElement;
    var img = product.parentElement.getElementsByClassName("img-prd")[0].src
    var title = product.getElementsByClassName("content-product-h3")[0].innerText
    var price = product.getElementsByClassName("price")[0].innerText
    addItemToCart(title, price, img)
    // Khi thêm sản phẩm vào giỏ hàng thì sẽ hiển thị modal
    modal.style.display = "block";

    updatecart()
  })
}*/
// Thêm vào giỏ
function addItemToCart(title, price, img, soluong) {
  var cartRow = document.createElement('div')
  cartRow.classList.add('cart-row')
  var cartItems = document.getElementsByClassName('cart-items')[0]
  var cart_title = cartItems.getElementsByClassName('cart-item-title')
  for (var i = 0; i < cart_title.length; i++) {
    if (cart_title[i].innerText == title) {
      alert('This product has already in cart')
      return
    }
  }
  alert('Add successfully')
  xulygiohang(title, price, img, cart_title.length + 1, soluong)
  var cartRowContents = `
<div class="cart-item cart-column">
  <img class="cart-item-image" src="${img}" width="100" height="100">
  <span class="cart-item-title">${title}</span>
</div>
<span class="cart-price cart-column">${price}</span>
<div class="cart-quantity cart-column">
  <input class="cart-quantity-input" type="number" value="1" max="${soluong}" >
  <button class="btn btn-danger" type="button" onclick="">Delete</button>
</div>`
  cartRow.innerHTML = cartRowContents
  cartItems.append(cartRow)
  cartRow.getElementsByClassName('btn-danger')[0].addEventListener('click', function () {
    var button_remove = event.target
    button_remove.parentElement.parentElement.remove()
    xulyxoasanpham(title)
    updatecart()
  })
  cartRow.getElementsByClassName('cart-quantity-input')[0].addEventListener('change', function (event) {
    var input = event.target
    if (isNaN(input.value) || input.value <= 0) {
      input.value = 1;
    }
    var slg = Number(soluong)
    if (input.value > slg) {
      input.value = slg
    }
    updatecart()
  })
  updatecart()
}
//tai lai gio hang khi reload trang
function reload(title, price, img, soluong) {
  var cartRow = document.createElement('div')
  cartRow.classList.add('cart-row')
  var cartItems = document.getElementsByClassName('cart-items')[0]
  var cart_title = cartItems.getElementsByClassName('cart-item-title')
  for (var i = 0; i < cart_title.length; i++) {
    if (cart_title[i].innerText == title) {
      return
    }
  }
  xulygiohang(title, price, img, cart_title.length + 1, soluong)
  var cartRowContents = `
<div class="cart-item cart-column">
  <img class="cart-item-image" src="${img}" width="100" height="100">
  <span class="cart-item-title">${title}</span>
</div>
<span class="cart-price cart-column">${price}</span>
<div class="cart-quantity cart-column">
  <input class="cart-quantity-input" type="number"  value="1" max="${soluong}">
  <button class="btn btn-danger" type="button" onclick="">Delete</button>
</div>`
  cartRow.innerHTML = cartRowContents
  cartItems.append(cartRow)
  cartRow.getElementsByClassName('btn-danger')[0].addEventListener('click', function () {
    var button_remove = event.target
    button_remove.parentElement.parentElement.remove()
    xulyxoasanpham(title)
    updatecart()
  })
  cartRow.getElementsByClassName('cart-quantity-input')[0].addEventListener('change', function (event) {
    var input = event.target
    if (isNaN(input.value) || input.value <= 0) {
      input.value = 1;
    }
    var slg = Number(soluong)
    if (input.value > slg) {
      input.value = slg
    }
    updatecart()
  })
  updatecart()
}
//hàm xử lý sau khi bấm Buy
function thanhtoan(gia) {
  if (gia == 0 || gia == "") {
    alert('Please choose your items to buy');
    return;
  }
  document.getElementById('checkout').style.display = 'block';
  document.getElementById('price1').innerHTML = gia;

}
//hàm xử lý thanh toán, tạo đơn hàng và chi tiết hóa đơn
function xulythanhtoan(user) {
  var cartItems = document.getElementsByClassName('cart-items')[0]
  var gia = document.getElementById('price1').innerHTML
  var soluongSP = cartItems.getElementsByClassName('cart-item-title').length
  var diachi = document.getElementById('useraddress').value;
  if(diachi == ""){
    alert("Please type your address");
    return;
  }
  var xmlhttp;
  if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp = new XMLHttpRequest();
  }
  else {// code for IE6, IE5
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange = function () {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

    }
  }
  var cartItems = document.getElementsByClassName('cart-items')[0]
  var cart_title = cartItems.getElementsByClassName('cart-item-title')
  var sanpham = "";
  for (var i = 0; i < cart_title.length; i++) {
    sanpham = sanpham + "&ten" + i + "=" + cart_title[i].innerHTML;
    sanpham = sanpham + "&hinhanh" + i + "=" + cartItems.getElementsByClassName('cart-item-image')[i].src;
    sanpham = sanpham + "&soluong" + i + "=" + cartItems.getElementsByClassName('cart-quantity-input')[i].value;
    sanpham = sanpham + "&gia" + i + "=" + cartItems.getElementsByClassName('cart-price')[i].innerText;
  }


  xmlhttp.open("GET", "thanhtoan.php?totalprice=" + gia + "&soluongSP=" + soluongSP + "&userKH=" + user + "&diachi=" + diachi + sanpham, true);
  xmlhttp.send();
  alert('Buy successfully !');
  document.getElementById('checkout').style.display='none';
  document.getElementById('shoppingcart').style.display='none';
  window.location.href="index.php";
}
//hàm lưu các thông số của sản phẩm thêm vào giỏ hàng
function xulygiohang(title, price, img, soluong, soluongtonkho) {

  var xmlhttp;
  if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp = new XMLHttpRequest();
  }
  else {// code for IE6, IE5
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange = function () {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

    }
  }
  xmlhttp.open("GET", "giohang.php?ten=" + title + "&gia=" + price + "&hinhanh=" + img + "&soluongSP=" + soluong + "&soluongtonkho=" + soluongtonkho, true);
  xmlhttp.send();
}
//hàm xử lý xóa sản phẩm
function xulyxoasanpham(ten) {
  var xmlhttp;
  if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp = new XMLHttpRequest();
  }
  else {// code for IE6, IE5
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange = function () {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

    }
  }
  xmlhttp.open("GET", "giohang.php?tenxoa=" + ten, true);
  xmlhttp.send();
}


function kiemTraDuLieu() {


  if (document.signup.psw1.value.length < 6) {
      alert('Weak password');
      return false;
  }
  if (document.signup.psw1.value != document.signup.repsw.value) {
      alert('Password and Confirm Password has to duplicate');
      return false;

  }
}