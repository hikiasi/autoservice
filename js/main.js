var scrolled 
var timer
var tab
var tabContent

window.onload = function scroll() {
    document.getElementById('top').onclick = function () {
        scrolled = window.pageYOffset
        console.log(pageYOffset)
        scrollToTop()
    }
}

function tb() {
    tabContent = document.getElementsByClassName('tabs__content')
    tab = document.getElementsByClassName('tabs__item')
    hideTabsContent(1)
}

function scrollToTop() {
    if (scrolled > 0) {
        window.scrollTo(0, scrolled)
        scrolled = scrolled - 90
        timer = setTimeout(scrollToTop, 90)
    } else {
        clearTimeout(timer)
        window.scrollTo(0, 0)
    }
}

function hideTabsContent(a) {
    for(var i = a; i < tabContent.length; i++) {
        tabContent[i].classList.remove('show')
        tabContent[i].classList.add('hide')
        tab[i].classList.remove('orangeborder')
    }
}

function showTabsContent(b) {
    if (tabContent[b].classList.contains('hide')){
        hideTabsContent(0)
    tab[b].classList.add('orangeborder')
    tabContent[b].classList.remove('hide')
    tabContent[b].classList.add('show')
    }
}

tb()








