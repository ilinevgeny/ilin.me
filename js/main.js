function printDocument(documentId)
{
    let doc = document.getElementById(documentId);
    doc.classList.add("wrapper-printable");
    let tools = doc.getElementsByClassName("tools-container")[0];
    tools.classList.add('tools-container-printable');

    // Expand all collapsible content before printing
    let collapsibles = document.getElementsByClassName('collapsible');
    let collapsibleStates = [];
    for (let i = 0; i < collapsibles.length; i++) {
        let header = collapsibles[i];
        let content = header.nextElementSibling;
        if (content.classList.contains('collapsible-content')) {
            // Store current state
            collapsibleStates.push({
                header: header,
                headerWasActive: header.classList.contains('active'),
                element: content,
                wasActive: content.classList.contains('active'),
                height: content.style.maxHeight
            });

            // Expand for printing
            header.classList.add('active');
            content.classList.add('active');
            content.style.maxHeight = content.scrollHeight + "px";
        }
    }

    window.print();

    // Restore collapsible states after printing
    for (let i = 0; i < collapsibleStates.length; i++) {
        let state = collapsibleStates[i];
        if (!state.wasActive) {
            state.element.classList.remove('active');
            state.element.style.maxHeight = state.height;
        }
        if (!state.headerWasActive) {
            state.header.classList.remove('active');
        }
    }

    doc.classList.remove("wrapper-printable");
    tools.classList.remove('tools-container-printable');
}

function shareCV() {
    let text = 'http://ilin.me';
    navigator.clipboard.writeText(text).then(() => {
        let shareLink = document.querySelector('a[onclick*=\'shareCV\']');
        let originalText = shareLink.innerHTML;
        shareLink.innerHTML = 'copied';
        shareLink.classList.add('copied');
        setTimeout(() => {
            shareLink.innerHTML = originalText;
            shareLink.classList.remove('copied');
        }, 1000);

    }, (err) => {
        console.error('Could not copy text: ', err);
    });
}

document.addEventListener('DOMContentLoaded', function() {
    let main_cv = document.querySelector('.resume-description-en');
    let headers = main_cv.innerHTML.match(new RegExp("^\\w.*", "gm"));
    headers.forEach((header) => {
        main_cv.innerHTML = main_cv.innerHTML.replace(header, `<h4>${header}</h4>`);
    });

    main_cv.innerHTML = main_cv.innerHTML.replace(/^\s+--.+/gm, function (match){
        return `<div class="resume-description">${match}</div>`;
    });
    main_cv.innerHTML = main_cv.innerHTML.replace(/^\s.+:/gm, function (match){
        return `<div class="resume-title">${match}</div>`;
    });

    // Initialize collapsible elements
    let collapsibles = document.getElementsByClassName('collapsible');
    for (let i = 0; i < collapsibles.length; i++) {
        // Initialize all collapsible contents to be collapsed by default
        let content = collapsibles[i].nextElementSibling;
        if (content.classList.contains('collapsible-content')) {
            content.style.maxHeight = 0;
        }

        collapsibles[i].addEventListener('click', function() {
            this.classList.toggle('active');
            let content = this.nextElementSibling;
            if (content.classList.contains('collapsible-content')) {
                content.classList.toggle('active');
                if (content.classList.contains('active')) {
                    content.style.maxHeight = content.scrollHeight + "px";
                } else {
                    content.style.maxHeight = 0;
                }
            }
        });
    }
});
