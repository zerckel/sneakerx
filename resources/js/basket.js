eventOnAll(document.querySelectorAll('#quantity'), updateQuantity)
$('#order').addEventListener('click', slideDownInfoUser)

function updateQuantity() {
    let newQuantity = 0

    let oldQuantity = document.querySelector('.totalQuantity').innerHTML

    document.querySelectorAll('#quantity')
        .forEach(input => newQuantity += parseInt(input.value))

    document.querySelector('.totalQuantity').innerHTML = newQuantity

    updatePrice(this, oldQuantity, newQuantity)
}

function updatePrice(elem, oldQuantity, newQuantity) {
    let price = elem.parentNode.parentNode.parentNode.querySelector('.price').innerHTML
    let totalPrice = document.querySelector('.totalPrice').innerHTML

    totalPrice = oldQuantity > newQuantity ? parseInt(totalPrice) - parseInt(price) : parseInt(totalPrice) + parseInt(price)

    document.querySelector('.totalPrice').innerHTML = totalPrice.toString()
}

function slideDownInfoUser() {
    let button = $('.form')
    button.style.maxHeight = '1000px'

    document.querySelector('#order').addEventListener('click', confirmOrder)

    setTimeout(function () {
        document.location.href = "/basket/#order"
    }, 500)


}

function confirmOrder() {
    let userInfo = checkPersonalInfo()

    if (userInfo) {

        fetch("/confirmation/", {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').getAttribute('content'),
                "Content-Type": "application/json"
            },
            body: JSON.stringify([checkArticles(), userInfo])
        }).then((response) => response.json())
            .then((res) => {
                res.success ? window.location.href = "/confirmation/" : false
            })
    }
}

window.checkArticles = function () {

    let articles = []

    document.querySelectorAll('.article').forEach(res => {
        let article = {
            "id": res.dataset.id,
            "name": res.querySelector('.name').innerHTML,
            "img": res.querySelector('.img').src,
            "price": res.querySelector('.price').innerHTML,
            "color": res.querySelector('#colors').value,
            "size": res.querySelector('#size').value,
            "quantity": res.querySelector('#quantity').value
        }
        articles.push(article)
    })

    return articles
}

function checkPersonalInfo() {

    let userInfo = {
        "name": $('#name').value,
        "email": $('#email').value,
        "address": $('#address').value,
        "postal": $('#postal').value,
        "cardNumber": $('#cardNumber').value,
        "date": $('#date').value,
        "cvv": $('#cvv').value,
    }

    for (let [key, value] of Object.entries(userInfo)) {
        if (value === "") {
            displayAlert("Please fill all field")
            return false
        }
    }

    return userInfo
}
