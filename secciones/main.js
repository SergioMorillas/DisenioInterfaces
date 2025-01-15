document.addEventListener('DOMContentLoaded', () => {
    const sections = document.querySelectorAll('.section');

    sections.forEach(section => {
        section.addEventListener('click', function () {
            sections.forEach(sec => sec.classList.add('is-not-expanded'));
            this.classList.add('is-expanded');
            this.classList.remove('is-not-expanded');
        });

        const closeButton = section.querySelector('.close-section');
        closeButton.addEventListener('click', function (event) {
            event.stopPropagation();
            section.classList.remove('is-expanded');
            sections.forEach(sec => sec.classList.remove('is-not-expanded'));
        });
    });
});