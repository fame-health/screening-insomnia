import './bootstrap';

const menuToggle = document.querySelector('[data-menu-toggle]');
const mobileMenu = document.querySelector('[data-mobile-menu]');

if (menuToggle && mobileMenu) {
    menuToggle.addEventListener('click', () => {
        const isOpen = menuToggle.getAttribute('aria-expanded') === 'true';
        menuToggle.setAttribute('aria-expanded', String(!isOpen));
        menuToggle.setAttribute('aria-label', isOpen ? 'Buka menu' : 'Tutup menu');
        mobileMenu.classList.toggle('hidden', isOpen);
        menuToggle.querySelector('[data-menu-open-icon]')?.classList.toggle('hidden', !isOpen);
        menuToggle.querySelector('[data-menu-close-icon]')?.classList.toggle('hidden', isOpen);
    });
}

document.querySelectorAll('[data-screening]').forEach((screening) => {
    const steps = [...screening.querySelectorAll('[data-screening-step]')];
    const bioForm = screening.querySelector('[data-bio-form]');
    const quizForm = screening.querySelector('[data-quiz-form]');
    const progress = screening.querySelector('[data-progress]');
    const progressBar = screening.querySelector('[data-progress-bar]');
    const stepLabel = screening.querySelector('[data-step-label]');
    let participant = {};

    const showStep = (stepName) => {
        steps.forEach((step) => {
            const isCurrent = step.dataset.screeningStep === stepName;
            step.hidden = !isCurrent;
            step.classList.toggle('hidden', !isCurrent);
        });

        const completed = stepName === 'bio' ? 1 : 2;
        if (progress) progress.textContent = stepName === 'result' ? 'Selesai' : `${completed} / 2`;
        if (progressBar) progressBar.style.width = stepName === 'bio' ? '50%' : '100%';
        if (stepLabel) {
            stepLabel.textContent = stepName === 'bio'
                ? 'Langkah 1 dari 2 · Biodata'
                : stepName === 'questions'
                    ? 'Langkah 2 dari 2 · Pertanyaan'
                    : 'Ringkasan selesai';
        }
    };

    bioForm?.addEventListener('submit', (event) => {
        event.preventDefault();
        if (!bioForm.reportValidity()) return;

        const values = new FormData(bioForm);
        participant = {
            name: String(values.get('nama') || '').trim(),
            age: String(values.get('umur') || ''),
            gender: String(values.get('gender') || ''),
        };
        quizForm.querySelector('[data-participant-name]').value = participant.name;
        quizForm.querySelector('[data-participant-age]').value = participant.age;
        quizForm.querySelector('[data-participant-gender]').value = participant.gender;
        screening.querySelector('[data-screening-error]')?.classList.add('hidden');
        showStep('questions');
        screening.scrollIntoView({ behavior: 'smooth', block: 'start' });
    });

    screening.querySelector('[data-back-to-bio]')?.addEventListener('click', () => {
        showStep('bio');
        screening.scrollIntoView({ behavior: 'smooth', block: 'start' });
    });

    quizForm?.addEventListener('submit', async (event) => {
        event.preventDefault();
        if (!quizForm.reportValidity()) return;

        const submitButton = quizForm.querySelector('button[type="submit"]');
        const errorMessage = screening.querySelector('[data-screening-error]');
        submitButton.disabled = true;
        submitButton.textContent = 'Menyimpan hasil…';
        errorMessage?.classList.add('hidden');

        try {
            const response = await fetch(quizForm.action, {
                method: 'POST',
                headers: { Accept: 'application/json' },
                body: new FormData(quizForm),
                credentials: 'same-origin',
            });
            const result = await response.json();

            if (!response.ok) {
                throw new Error(result.message || 'Hasil belum berhasil disimpan. Silakan coba lagi.');
            }

            screening.querySelector('[data-result-name]').textContent = participant.name;
            screening.querySelector('[data-result-age]').textContent = participant.age;
            screening.querySelector('[data-result-gender]').textContent = participant.gender;
            screening.querySelector('[data-result-score]').textContent = Number(result.score).toFixed(2);
            screening.querySelector('[data-result-heading]').textContent = result.result_label;
            screening.querySelector('[data-result-copy]').textContent = result.interpretation;

            showStep('result');
            screening.scrollIntoView({ behavior: 'smooth', block: 'start' });
        } catch (error) {
            if (errorMessage) {
                errorMessage.textContent = error.message || 'Terjadi kendala saat menyimpan hasil. Silakan coba lagi.';
                errorMessage.classList.remove('hidden');
                errorMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        } finally {
            submitButton.disabled = false;
            submitButton.textContent = 'Lihat ringkasan hasil';
        }
    });

    screening.querySelector('[data-restart-screening]')?.addEventListener('click', () => {
        bioForm?.reset();
        quizForm?.reset();
        participant = {};
        screening.querySelector('[data-screening-error]')?.classList.add('hidden');
        showStep('bio');
        screening.scrollIntoView({ behavior: 'smooth', block: 'start' });
    });
});

document.querySelector('[data-contact-form]')?.addEventListener('submit', (event) => {
    event.preventDefault();
    const form = event.currentTarget;
    if (!form.reportValidity()) return;

    const values = new FormData(form);
    const subject = encodeURIComponent(String(values.get('subject') || 'Pesan dari situs'));
    const body = encodeURIComponent(
        `Nama: ${values.get('name')}\nEmail: ${values.get('email')}\n\n${values.get('message')}`,
    );
    window.location.href = `mailto:admin@screeninginsomniaremaja.com?subject=${subject}&body=${body}`;
});
