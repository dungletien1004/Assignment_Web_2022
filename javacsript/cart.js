/* CartItem: Id id of product,
        name : string
        size: array of string that can be: {S, M , L , XL , XLL}  */
class CartItem {

    constructor(id, name, unitPrice, size, imgUrl, quantity, productURL) {
        this.id = id;
        this.name = name;
        this.unitPrice = unitPrice;
        this.size = size;
        this.imgUrl = imgUrl;
        this.productURL = productURL;
        this.quantity = quantity;
        this.totalPrice = unitPrice * quantity;
    }

    updateTotalPrice() {
        this.totalPrice = this.unitPrice * this.quantity;
    }


}
// class Cart {
//     constructor(cartItems) {
//         this.cartItems = cartItems;
//     }

//     calculateTotalPrice() {
//         let totalPrice = 0;
//         this.cartItems.forEach(item => {
//             totalPrice += item.totalPrice;
//         })
//         return totalPrice;
//     }
// }

// example data in customer's cart! NOT REAL DATA.
const cart_data = [
    new CartItem(
        0,
        'HOODIE BASIC / GREY - GREEN',
        159000, 'M',
        'https://product.hstatic.net/200000260587/product/hardmode-hoodie_emb_logo_huskies_gold_1_0b83b15759f8484382fadca6d3437da7_master.jpg',
        2,
        '#', // product URL

    ),
    new CartItem(
        1,
        'HUMMING BIRD HOODIE / BLUE',
        159000, 'L',
        'https://product.hstatic.net/200000260587/product/c40dd138-2027-460e-bcdb-fbdf7d7f8964_38e5042db7314c8b85f26a4edaa85be1_master.jpeg',
        1,
        '#', // product URL
    )
]



function getTotalPrice() {
    let totalPrice = 0;
    cart_data.forEach(item => {
        totalPrice += item.totalPrice;
    })
    return totalPrice;
}

let cart_existed = cart_data.length > 0;

if (cart_existed) {
    genCartTable();
    genTotalCart();
} else {
    genEmptyCart();
}

function genTableHeading() {
    let table_head = document.createElement('thead');
    let table_row = document.createElement('tr');

    let product_heading = document.createElement("th");
    product_heading.innerHTML = 'Sản phẩm';
    product_heading.setAttribute('class', 'product');

    let quantity_heading = document.createElement('th');
    quantity_heading.innerHTML = 'Số lượng';
    quantity_heading.setAttribute('class', 'qty');

    let price_heading = document.createElement('th');
    price_heading.innerHTML = 'Tổng tiền';
    price_heading.setAttribute('class', 'linePrice');

    let delete_heading = document.createElement('th');
    delete_heading.innerHTML = 'Xóa';
    delete_heading.setAttribute('class', 'remove');

    table_row.append(product_heading, quantity_heading, price_heading, delete_heading);
    table_head.appendChild(table_row);
    return table_head;;
}

function genTableBody() {
    let table_body = document.createElement('tbody');
    let rows = [];

    cart_data.forEach(cartItem => {
        let table_row = document.createElement('tr');
        table_row.className = "line-item-container";
        table_row.setAttribute('data-id', cartItem.id);

        // create cart column 1  
        let imgCol = genImageAndProductInfoCol(cartItem);
        // create cart column 2
        let quantityCol = genQuantityInputCol(cartItem);

        // create cart column 3
        let linePriceCol = genPriceCol(cartItem);

        // create cart column 4
        let removeCartItemCol = genRemoveItem(cartItem);

        table_row.append(imgCol, quantityCol, linePriceCol, removeCartItemCol);
        rows.push(table_row);
    })
    rows.forEach(row => {
        table_body.append(row)
    });
    return table_body;
}

function genRemoveItem(cartItem) {
    let removeCartItem = document.createElement('td');
    removeCartItem.className = 'remove';
    let cartChange_aTag = document.createElement('a');
    cartChange_aTag.className = 'cart';

    let trashIcon = document.createElement('i');
    trashIcon.className = 'fa fa-trash-o';
    trashIcon.setAttribute('aria-hidden', 'true');

    cartChange_aTag.appendChild(trashIcon);
    removeCartItem.appendChild(cartChange_aTag);
    return removeCartItem;
}

function genPriceCol(cartItem) {
    let line_price = document.createElement('td');
    line_price.className = 'linePrice';

    let price = document.createElement('p');
    price.className = 'price';
    let price_span = document.createElement('span');
    price_span.className = 'line-item-total';
    price_span.innerHTML = String(cartItem.totalPrice) + 'đ';
    price.appendChild(price_span);
    line_price.appendChild(price);

    return line_price;
}

function genQuantityInputCol(cartItem) {
    let quantityCol = document.createElement('td');
    quantityCol.className = 'qty';

    let quantityBtnWrapper = document.createElement('div');
    quantityBtnWrapper.className = 'qty qty-click';

    let subBtn = document.createElement('button');
    subBtn.innerHTML = '-';
    subBtn.setAttribute('type', 'button');
    subBtn.className = 'btn btn-light qtyminus qty-btn';

    // number of product in cart
    let inputTag = document.createElement('input');
    inputTag.type = 'text';
    inputTag.size = String(4);
    inputTag.name = "updates[]";
    inputTag.min = String(1);
    inputTag.id = "updates_" + cartItem.id;
    inputTag.setAttribute('data-price', String(cartItem.price));
    inputTag.value = String(cartItem.quantity);
    inputTag.className = 'tc line-item-qty';

    let addBtn = document.createElement('button');
    addBtn.type = 'button';
    addBtn.className = 'btn btn-light qtyplus qty-btn';
    addBtn.innerHTML = '+';

    quantityBtnWrapper.append(subBtn, inputTag, addBtn);
    quantityCol.appendChild(quantityBtnWrapper);

    return quantityCol;
}

function genImageAndProductInfoCol(cartItem) {
    let imgCol = document.createElement('td');
    imgCol.className = 'image';

    let imgContainer = document.createElement('div');
    imgContainer.className = "product-image";

    let imgToProductUrl = document.createElement('a');
    imgToProductUrl.setAttribute('href', cartItem.productURL);
    imgToProductUrl.className = "thumb-cart";

    let imgTag = document.createElement('img');
    imgTag.src = cartItem.imgUrl;
    imgTag.alt = cartItem.name;

    let productName = document.createElement('h3');
    productName.innerHTML = cartItem.name;

    let price = document.createElement('span');
    price.innerHTML = cartItem.unitPrice + 'đ';

    imgToProductUrl.append(imgTag, productName, price);
    imgContainer.appendChild(imgToProductUrl);

    let size_variant = document.createElement('p');
    size_variant.className = 'variant';
    let span_variant = document.createElement('span');
    span_variant.className = 'variant-title';
    span_variant.innerHTML = cartItem.size;

    size_variant.appendChild(span_variant);
    imgCol.append(imgContainer, size_variant);

    return imgCol;
}

function genCartTable() {
    let cartContent = document.getElementById('cart-content');
    let table = document.createElement('table');
    table.setAttribute('class', 'table-cart');

    let table_head = genTableHeading();

    let table_body = genTableBody();

    table.append(table_head, table_body);

    cartContent.appendChild(table);
}

function genTotalCart() {
    let total = document.getElementById('total');

    let divTotalCart = document.createElement('div');
    divTotalCart.className = "total-cart";

    let orderInfo = document.createElement('p');
    orderInfo.className = "order-info";
    orderInfo.innerHTML = "Tổng tiền: "

    let spanPrice = document.createElement('span');
    spanPrice.className = "total_price";

    let bTagNumber = document.createElement('b');
    bTagNumber.innerHTML = getTotalPrice();

    spanPrice.appendChild(bTagNumber);
    orderInfo.appendChild(spanPrice);

    let divPaymentButton = document.createElement('div');
    divPaymentButton.className = "cart-buttons";

    let paymentButton = document.createElement('button');
    paymentButton.type = 'submit';
    paymentButton.id = 'checkout';
    paymentButton.className = "btn btn-dark"
    paymentButton.name = "checkout";
    paymentButton.innerHTML = 'Thanh toán';
    divPaymentButton.appendChild(paymentButton);

    let divCheckoutNote = document.createElement('div');
    divCheckoutNote.className = "checkout-note clearfix";

    let textAreaNote = document.createElement('textarea');
    textAreaNote.id = "note";
    textAreaNote.name = "note";
    textAreaNote.placeholder = "Ghi chú";
    divCheckoutNote.appendChild(textAreaNote);

    divTotalCart.append(orderInfo, divPaymentButton, divCheckoutNote);
    total.appendChild(divTotalCart);
}

function genEmptyCart() {
    console.log("Empty cart");

    let divMessage = document.createElement('div');
    divMessage.className = 'span12 expanded-message text-center';
    divMessage.innerHTML = 'Giỏ hàng của bạn đang trống';

    let p = document.createElement('p');
    p.className = 'link-continue-back';

    let a = document.createElement('a');
    a.href = '#';
    a.className = 'btn btn-dark'

    let i = document.createElement('i');
    i.className = 'fa fa-reply';


    console.log(i);
    a.innerHTML = "Tiếp tục mua hàng  ";
    a.appendChild(i);
    p.appendChild(a);
    divMessage.appendChild(p);
    let cartContainer = document.getElementById('main');
    cartContainer.appendChild(divMessage);
}