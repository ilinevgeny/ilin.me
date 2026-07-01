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
