class product {
    constructor(name, quantity, price, category, img) {
      this.name = name;
      this.quantity = quantity;
      this.price = price;
      this.category = category;
      this.img = img;
    }
  }
  
  
  
  
//   // ------------------ EXAMPLE PRODUCT -------------------
//   const example_product = [
//     new product(
//       'SẢN PHẨM 1',
//       888,
//       18,
//       'ao',
//       "./assets/img/product_img9.jpg",
//     ),
//     new product(
//       'SẢN PHẨM 2',
//       233,
//       14,
//       'quan',
//       "./assets/img/product_img9.jpg",
//     ),
//     new product(
//       'SẢN PHẨM 3',
//       1024,
//       12,
//       'ao',
//       "./assets/img/product_img9.jpg",
//     ),
//     new product(
//       'SẢN PHẨM 4',
//       448,
//       15,
//       'ao',
//       "./assets/img/product_img9.jpg",
//     ),
//     new product(
//       'SẢN PHẨM 5',
//       543,
//       16,
//       'quan',
//       "./assets/img/product_img9.jpg",
//     ),
//     new product(
//       'SẢN PHẨM 6',
//       4343,
//       16,
//       'quan',
//       "./assets/img/product_img9.jpg",
//     ),
//     new product(
//       'SẢN PHẨM 7',
//       89,
//       16,
//       'somi',
//       "./assets/img/product_img9.jpg",
//     ),
//     new product(
//       'SẢN PHẨM 8',
//       2333,
//       16,
//       'somi',
//       "./assets/img/product_img9.jpg",
//     ),
    
//   ]
  
//   genProductList();
//   genTopProductList();
  
//   function genProductList() {
//     var productsList = document.getElementById('products-list');
  
//     for (var i = 0; i < example_product.length;i++) {
//       var item = genAProduct(example_product[i]);
//       productsList.append(item);
//     }
//   }
  
//   function genTopProductList() {
//     var topProductList = document.querySelector('.top-products .swiper-wrapper');
//     for (var i = 0; i < example_product.length; i++) {
//       var item = genAProduct(example_product[i]);
//       if (example_product[i].quantity > 500) {
//         item.classList.add('swiper-slide');
//         topProductList.append(item);
//       }
//     }
//   }
  
  
//   function genAProduct(element) {
//     var item = document.createElement('div');
//     item.classList.add('product');
//     item.setAttribute('data-item', element.category);
  
//     var image = genImg(element);
//     var name = genName(element);
//     var quantity = genQuantity(element);
//     var content = genContent(element);
  
//     item.append(image, name, quantity, content);
//     return item;
  
//   }
  
//   function genImg(item) {
//     var image = document.createElement('img');
//     image.setAttribute('src', item.img);
//     return image;
//   }
  
//   function genName(item) {
//     var name = document.createElement('div');
//     name.classList.add('name');
//     name.innerText = item.name;
//     return name;
//   }
  
//   function genQuantity(item) {
//     var quantity = document.createElement('div');
//     quantity.classList.add('quantity');
//     quantity.innerHTML = 'Đã bán: ' + item.quantity;
//     return quantity;
//   }
  
//   function genContent(item) {
//     var content = document.createElement('div');
//     content.classList.add('content');
  
//     var price = document.createElement('div');
//     price.classList.add('price');
//     price.innerHTML = item.price + '$';
  
//     var action =document.createElement('div');
//     action.classList.add('action');
  
//     var heart = document.createElement('div');
//     heart.classList.add('heart')
  
//     var iconHeart = document.createElement('a');
//     iconHeart.setAttribute('href', '#');
//     iconHeart.classList.add('fas','fa-heart','icon');
  
//     heart.append(iconHeart);
  
//     addToCart = document.createElement('button');
//     addToCart.classList.add('add-to-cart');
  
//     var iconCart = document.createElement('i');
//     iconCart.classList.add('fas', 'fa-cart-plus');
//     addToCart.append(iconCart);
  
//     action.append(heart, addToCart);
//     content.append(price, action);
  
//     return content;
//   }
  
  
  var swiper = new Swiper(".slider", {
    centeredSlides: true,
    loop:true,
    autoplay: {
      delay: 8000,
      disableOnInteraction: false,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
  var swiper = new Swiper(".top-products", {
    centeredSlides: true,
    loop:true,
    spaceBetween:20,
    autoplay: {
      delay: 8000,
      disableOnInteraction: false,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      450: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 3,
      },
      1200: {
        slidesPerView: 4,
      },
    },
  });
  
  
//   let filterBtn = document.querySelectorAll('.category');
//   let filterItem = document.querySelectorAll('#products-list .product');
  
//   filterBtn.forEach(button =>{
  
//     button.onclick = () =>{
//       filterBtn.forEach(btn => btn.classList.remove('active'));
//       button.classList.add('active');
  
//       let dataFilter = button.getAttribute('data-filter');
  
//       filterItem.forEach(item =>{
  
//         item.classList.remove('active');
//         item.classList.add('hide');
  
//         if(item.getAttribute('data-item') == dataFilter || dataFilter == 'all'){
//           item.classList.remove('hide');
//           item.classList.add('active');
//         }
  
//       });
  
//     };
  
//   });
  
  