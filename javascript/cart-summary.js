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



function genSummaryBody() {
    let tbody = document.getElementById('summary-body');

    cart_data.forEach(item => {
        let trow = document.createElement('tr');
        trow.className = 'product';

        // image col
        let img = imgCol(item);

        // description col
        let des = description(item);

        // quantity col
        let quantity = document.createElement('td');
        quantity.className = 'product-quantity visually-hidden';
        quantity.innerHTML = item.quantity;

        //  price col
        let price = document.createElement('td');
        price.className = 'product-price';
        let span_price = document.createElement('span');
        span_price.className = 'order-summary-emphasis';
        span_price.innerHTML = item.totalPrice;
        price.appendChild(span_price);

        trow.append(img, des, quantity, price);
        console.log(trow);
        tbody.appendChild(trow);
    })
}

function description(item) {
    let des = document.createElement('td');
    let span1 = document.createElement('span');
    span1.className = 'product-description-name order-summmary-emphasis';
    span1.innerHTML = item.name;
    let span2 = document.createElement('span');
    span2.className = 'product-description-variant order-summary-sm-text';
    span2.innerHTML = item.size;
    des.append(span1, span2);
    return des;
}

function imgCol(item) {
    let img = document.createElement('td');
    img.className = 'product-image';
    let divThumbnail = document.createElement('div');
    divThumbnail.className = 'product-thumbnail';
    let divThumbnailWrapper = document.createElement('div');
    divThumbnailWrapper.className = 'product-thumbnail-wrapper';
    let imageTag = document.createElement('img');
    imageTag.className = 'product-thumbnail-image';
    imageTag.alt = item.name;
    imageTag.src = item.imgUrl;

    let span = document.createElement('span');
    span.className = 'product-thumbnail-quantity';
    span.innerHTML = item.quantity;

    divThumbnailWrapper.appendChild(imageTag);
    divThumbnail.append(divThumbnailWrapper, span);
    img.appendChild(divThumbnail);
    return img;
}

const getTotalPrice = () => {
    let price = 0;
    cart_data.forEach(item => {
        price += item.totalPrice;
    })
    return price;
}

document.getElementById('subtotal').innerHTML = getTotalPrice();
document.getElementById('ship-price').innerHTML = 50000;
document.getElementById('total-price').innerHTML = getTotalPrice() + 50000;
genSummaryBody();