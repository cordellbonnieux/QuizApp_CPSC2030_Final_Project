let banner = localStorage.getItem('banner') ? localStorage.getItem('banner') : null
if (banner != null && banner.length > 0) {
    let b = document.createElement('span')
    b.className = 'alert'
    b.textContent = banner
    document.body.appendChild(b)
    localStorage.removeItem('banner')
}