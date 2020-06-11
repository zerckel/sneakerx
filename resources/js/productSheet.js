for (let i = 0; i < document.querySelectorAll('.sizeSelect').length; i++) {
    document.querySelectorAll('.sizeSelect')[i].addEventListener('click', function () {

        let elem = document.querySelector('.sizeSelect.active')
        elem && elem !== this ? elem.classList.remove('active') : false
        this.classList.contains('active') ? this.classList.remove('active') : this.classList.add('active')

    })
}
