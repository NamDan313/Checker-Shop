
function suasp(ten,gia,hinh,mota,loai,soluong)
{
    document.getElementById("f77").style.display="block";
    document.getElementById("oldname").value=ten;
    document.getElementById("ten").value=ten;
    document.getElementById("gia1").value=gia;
    document.getElementById("imagehere1").src=hinh;
    document.getElementById("mota").value=mota;
    document.getElementById("loaiSP").value=loai;
    document.getElementById("soluongSP").value=soluong;
}
function xoasp()
{
     return confirm("Do you really want to delete this product ?")  ;
    
}
function capnhat()
{
    document.getElementById("suasp").style.display='none';
    document.getElementById("themsp").style.display='none';

}
function them()
{
    document.getElementById("thongtinsp").style.display='block';
    document.getElementById("nutthemsp").style.display='block';
    document.getElementById("suasp").style.display='none';
    document.getElementById("themsp").style.display='none';
}
function fileValidation() {
    var fileInput = 
        document.getElementById('myFile');
      
    var filePath = fileInput.value;
  
    // Allowing file type
    var allowedExtensions = 
            /(\.jpg|\.jpeg|\.png|\.gif)$/i;
      
    if (!allowedExtensions.exec(filePath)) {
        alert('Invalid file type');
        fileInput.value = '';
        return false;
    } 
    else 
    {
      
        // Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById(
                    'imagehere').src = e.target.result;
            };
              
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}
function fileValidation1() {
    var fileInput = 
        document.getElementById('hinh');
      
    var filePath = fileInput.value;
  
    // Allowing file type
    var allowedExtensions = 
            /(\.jpg|\.jpeg|\.png|\.gif)$/i;
      
    if (!allowedExtensions.exec(filePath)) {
        alert('Invalid file type');
        fileInput.value = '';
        return false;
    } 
    else 
    {
      
        // Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById(
                    'imagehere1').src = e.target.result;
            };
              
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}
function billdetail(madon,userkh){
    window.open("billdetail.php?madon="+madon+"&userKH="+userkh)
}  
function kiemtradulieu(){
    if(document.getElementById("tenSP").value==""){
        alert('Please type name of product');
        return false;
    }
}