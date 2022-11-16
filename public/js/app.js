function updateCartView() {
    let total = window.localStorage.length - 1 > 0 ? window.localStorage.length : 0
    $('#cartTotal').html(total)
}
function updateProductsView() {
    $('#products-list-modal-content').html()
    let div = `<div class="product-item-head">
        <div>Article</div>
        <div>Quantité</div>
        <div>P.U</div>
        <div>Total</div>
    </div>`
    for (var i = 0 ; i < window.localStorage.length; i++){
        let key = window.localStorage.key(i)
        if (key == 'HTML5_QRCODE_DATA') continue;
        let item = JSON.parse(window.localStorage.getItem(key))
        let total = item.price * item.quantity
        div += `<div data-id="${item.id}" class="product-item">
                <div>${item.name}</div>
                <div><input type="number" min="1" class="update-quantity" data-price="${item.price}" data-id="${item.id}" value="${item.quantity}" id="quantity-${item.id}"/></div>
                <div class="price">${item.price}</div>
                <div class="price" id="total-${item.id}">${total}</div>
                <div><a href="#" class="removeItem" data-id="${item.id}">&times;</a></div>
            </div>`
     }
     $('#products-list-modal-content').html(div)


}

updateCartView()
$(function () {
    $('select').select2();
    $('#addDelivery').on('click', function() {

        $.post('/add-delivery',
            {  '_token': $('meta[name=csrf-token]').attr('content'),
                products: JSON.stringify(window.localStorage),
                deliverer: $('#deliverer').val(),
                client: $('#client').val()
            },
            function(res) {
                if(res == '0') {
                   window.localStorage.clear()
                    window.location.href = "/deliveries"
                    }
                console.log(res)
            }
        )
    })
    $(document).on('input', '.update-quantity', function() {
        let id = $(this).data('id')
        let price = Number($(this).data('price'))
        let qty = Number($(this).val())

        let Product = JSON.parse(window.localStorage.getItem(id))
        Product.quantity = qty
        window.localStorage.setItem(id, JSON.stringify(Product))
        $(`#total-${id}`).html(price*qty)
    })
    $('#addToCart').on('click', function() {
        let Product = JSON.parse($('#product').val())
        let product = Product.id
        let quantity = Number($('#product_quantity').val())
        let cartProduct = window.localStorage.getItem(product) !== null ? window.localStorage.getItem(product) : null
        if (cartProduct == null) Product.quantity = quantity
        else
            Product.quantity = JSON.parse(cartProduct).quantity + quantity

        window.localStorage.setItem(product, JSON.stringify(Product))
        updateCartView()
        MicroModal.close('add-product-modal')
        })

    $("#addProduct").on('click', function()  {
        MicroModal.show('add-product-modal', { awaitCloseAnimation: true })
    })
    $('#confirm-update').on('click', function() {

    })
    $(document).on('click', '.removeItem', function() {
        let id = $(this).data('id')
        window.localStorage.removeItem(id)
        updateProductsView()
        updateCartView()
    })
    $("#viewProducts").on('click', function()  {
        updateProductsView()
        updateCartView()
        MicroModal.show('products-list-modal', { awaitCloseAnimation: true })
    })

    $(document).on('click', '.scanDelivery', function() {
        MicroModal.show('qr-scanner', { awaitCloseAnimation: true })

    })
    function onScanSuccess(decodedText, decodedResult) {
        // Handle on success condition with the decoded text or result.
        console.log(`Scan result: ${decodedText}`, decodedResult);
    }

    var html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", { fps: 10, qrbox: 250 });
    html5QrcodeScanner.render(onScanSuccess);

  $('.alert-container').on('click', function () {
    $(this).fadeOut(100);
  });
});
