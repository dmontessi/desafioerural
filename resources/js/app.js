import './bootstrap';

import jQuery from 'jquery';
window.$ = jQuery;

const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

window.copy = function(button) {
    var copyText = document.getElementById("LinkSala");

    copyText.select();
    copyText.setSelectionRange(0, 99999);
    navigator.clipboard.writeText(copyText.value);

    const tooltip = bootstrap.Tooltip.getInstance(button)
    tooltip.setContent({ '.tooltip-inner': 'Link copiado!' })
}