


const searchbtn = document.querySelector('.search-icon');
const formSearch = document.querySelector('.search-wrapper');
const searchInput = document.querySelector('.search-input');
const Inputholder = document.querySelector('.input-holder');
const closebtn = document.querySelector('.close-search');
searchbtn.onclick = function () {
    formSearch.classList.add('active')
}
closebtn.onclick = function () {
    formSearch.classList.remove('active')
}
function showFunction() {
    document.getElementById('showFunction').style.display = "none";
    document.getElementById('header__setting').style.display = "flex";
    document.getElementById('hideFunction').style.display = "block";
}
function hideFunction() {
    document.getElementById('showFunction').style.display = "block";
    document.getElementById('header__setting').style.display= "none";
    document.getElementById('hideFunction').style.display = "none";
}
function displayModalBars() {
    document.getElementById('barsOverlay').style.display = "block";
    document.getElementById('barsContent').style.display = "block";
}

function hideModalBars() {
    document.getElementById('barsOverlay').style.display = "none";
    document.getElementById('barsContent').style.display = "none";
    hideCategoryBars();
}

function hideAdminBar() {
    document.querySelector('.app__category-heading').style.display = "none";
    document.querySelector('.app__category').style.width = "70px";
    document.getElementById('quanlysp').style.display = "none";
    document.getElementById('quanlynd').style.display = "none";
    document.getElementById('xulydonhang').style.display = "none";
    document.getElementById('thongkedoanhthu').style.display = "none";
    document.getElementById('managerProduct').style.textAlign = "center";
    document.getElementById('managerUser').style.textAlign = "center";
    document.getElementById('managerCart').style.textAlign = "center";
    document.getElementById('managerStatistic').style.textAlign = "center";
    document.querySelector('.app__category-header').style.justifyContent = "center";
    document.getElementById('hideAdmin').style.display = "none";
    document.getElementById('displayAdmin').style.display = "block";
}
function displayAdminBar() {
    document.querySelector('.app__category-heading').style.display = "flex";
    document.querySelector('.app__category').style.width = "253px";
    document.getElementById('quanlysp').style.display = "inline";
    document.getElementById('quanlynd').style.display = "inline";
    document.getElementById('xulydonhang').style.display = "inline";
    document.getElementById('thongkedoanhthu').style.display = "inline";
    document.getElementById('managerProduct').style.textAlign = "left";
    document.getElementById('managerUser').style.textAlign = "left";
    document.getElementById('managerCart').style.textAlign = "left";
    document.getElementById('managerStatistic').style.textAlign = "left";
    document.querySelector('.app__category-header').display = "flex";
    document.getElementById('hideAdmin').style.display = "block";
    document.getElementById('displayAdmin').style.display = "none";
}
function addAdminProduct() {
    renderAddProduct();
    displayModalAdd();
}

function renderAddProduct() {
    document.querySelector('.modal__add-product-user').innerHTML = `<input type="text" value="ADMIN" id="txtadminuser" readonly>`;
    document.querySelector('.modal__add-product-name').innerHTML = ` <input type="text" placeholder="Tên sản phẩm ....." value="" id="txtadminname" name="productname">`;
    document.querySelector('.modal__add-product-quantity').innerHTML = ` <input type="text" placeholder="Số lượng sản phẩm" value="" id="txtadminquantity" name="productquantity">`;
    document.querySelector('.modal__add-product-description').innerHTML = ` <input type="text" placeholder="Mô tả sản phẩm" value="" id="txtadmindescription" name="productdescription">`;
    document.querySelector('.modal__add-product-prices').innerHTML = ` <input type="text" placeholder="Giá sản phẩm" value="" id="txtadminprices" name="productprice">`;
    document.querySelector('.modal__add-product-img').innerHTML = `<input type="file" name="productimg" id="fadminimg">`;
    document.getElementById('btnadminadd').innerHTML = `<button id="addProduct" name="addProduct-btn" >Thêm mới</button>`;
    document.getElementById('btnadminadd').style.display = "block";
    document.getElementById('btnadminupdate').style.display = "none";
    document.querySelector('.modal__add-product-header-heading').textContent = "Thêm mới sản phẩm";
}
function displayModalAdd() {
    document.querySelector('.modal__add-product').style.display = "block";
}
function hideModalAdd() {
    document.querySelector('.modal__add-product').style.display = "none";
}
function hideModalFunction(){
    document.querySelector('.header__setting-noti').style.display = "none";
}
function hideModalDetail()
{
    document.querySelector('.modal__detail-bill').style.display = "none";
}
function showModalDetail()
{
    document.querySelector('.modal__detail-bill').style.display = "block";
}
