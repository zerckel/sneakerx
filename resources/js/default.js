window.checkMail = function () {

    let message = {
        "lastName": $('#lastName').value,
        "firstName": $('#firstName').value,
        "email": $('#email').value,
        "object": $('#object').value,
        "content": $('#content').value
    }

    let verifyForm = true

    for (let [key, value] of Object.entries(message)) {
        if (value === "") {
            displayAlert("Please fill the field " + key)
            verifyForm = false
            break
        }
    }

    verifyForm ? sendMail(message) : false
}

window.sendMail = function (message) {

    fetch("/sendmail/", {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').getAttribute('content'),
            "Content-Type": "application/json"
        },
        body: JSON.stringify(message)
    })
        .then((res) => res.json())
        .then((res) => {
            res ? displayAlert("Email send with success", 1) : displayAlert("Error please try again later")
        })
}

window.displayAlert = function (message, success = 0) {
    let AlertMessage = $('.alert-message')

    AlertMessage.innerHTML = message

    success ? AlertMessage.style.backgroundColor = '#27ae60' : AlertMessage.style.backgroundColor = '#c0392b'

    $('.alert').style.top = '5px'

    setTimeout(function () {
        $('.alert').style.top = '-45px'
    }, 5000)
}


window.$ = function $(selector) {
    return document.querySelector(selector)
}

window.eventOnAll = function (allDOM, fnct) {
    allDOM.forEach(dom => dom.addEventListener('click', fnct))
}

window.getValue = function (elem) {

    let search = document.querySelector('#search').value


    if (search !== "" && elem.key === "Enter" && search !== undefined || elem.key === undefined && search !== "" && search !== undefined) {
        LaunchSearch(search)
    }
}

window.LaunchSearch = function (search) {
    document.location.href = "/search/" + search
}

window.addToBasket = function (idProduct, quantity = 1) {
    fetch('/tool/addToBasket?id=' + idProduct + '&quantity=' + quantity)
        .then(response => response.json())
        .then(res => res ? incrementBasket() : displayAlert("Your product could not be added to your basket"))
}

window.incrementBasket = function () {

    let nbr = document.querySelector('.countArticles')

    if (nbr) {
        let elem = parseInt(nbr.innerText)
        elem += 1
        nbr.innerHTML = elem.toString()
    } else {
        let header = document.querySelector('.menu').innerHTML

        document.querySelector('.menu').innerHTML = header + `
        <div class="sticker">\n
            <span class="countArticles">\n
                1\n
            </span>\n
        </div>\n`
    }
}

document.querySelector('#search').addEventListener("keyup", evt => getValue(evt))
document.querySelector('.search').addEventListener("click", evt => getValue(evt))
