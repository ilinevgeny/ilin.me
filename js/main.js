function copyEmail(event, link) {
    // mailto: is unreliable when the OS has no default mail client registered.
    // execCommand('copy') is used instead of navigator.clipboard.writeText()
    // because the latter is async and can hang waiting on permission/focus.
    event.preventDefault();
    let input = document.createElement('input');
    input.value = 'evgeny@ilin.me';
    input.style.position = 'fixed';
    input.style.opacity = '0';
    document.body.appendChild(input);
    input.select();
    document.execCommand('copy');
    document.body.removeChild(input);

    let original = link.textContent;
    link.textContent = 'Email copied';
    setTimeout(() => { link.textContent = original; }, 1500);
}

document.addEventListener('DOMContentLoaded', function() {
    let collapsibles = document.getElementsByClassName('collapsible');
    for (let i = 0; i < collapsibles.length; i++) {
        let header = collapsibles[i];
        let content = header.nextElementSibling;
        if (!content || !content.classList.contains('collapsible-content')) continue;

        // Collapsed by default
        content.style.maxHeight = 0;

        header.addEventListener('click', function() {
            this.classList.toggle('active');
            content.classList.toggle('active');
            content.style.maxHeight = content.classList.contains('active')
                ? content.scrollHeight + 'px'
                : 0;
        });
    }
});
