/* document.addEventListener('DOMContentLoaded', () => {
    // Animación al hacer scroll (fade-in)
    const cards = document.querySelectorAll('.card-animate');
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, { threshold: 0.1 });
    cards.forEach(card => observer.observe(card));

    // Mostrar comentarios al hacer click
    document.querySelectorAll('.comments-toggle').forEach(span => {
        span.addEventListener('click', () => {
            const articleId = span.dataset.article;
            const section = document.getElementById(`comments-section-${articleId}`);
            section.classList.toggle('hidden');
        });
    });

    // Publicar comentario con spinner
    document.querySelectorAll('.submit-comment').forEach(button => {
        button.addEventListener('click', () => {
            const articleId = button.dataset.article;
            const content = document.getElementById(`comment-input-${articleId}`).value.trim();

            if (!content) return;

            const spinner = document.getElementById(`spinner-${articleId}`);
            spinner.classList.remove('hidden');

            fetch(`/blog/${articleId}/comment`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ content })
            })
            .then(res => res.json())
            .then(data => {
                const commentsSection = document.getElementById(`comments-section-${articleId}`);
                const newComment = document.createElement('div');
                newComment.className = "p-4 bg-gray-100 rounded";
                newComment.innerHTML = `<strong>${data.user}:</strong> ${data.content}`;

                commentsSection.prepend(newComment);
                document.getElementById(`comment-input-${articleId}`).value = "";
                commentsSection.classList.remove('hidden');
            })
            .catch(err => console.error(err))
            .finally(() => {
                spinner.classList.add('hidden');
            });
        });
    });
});
 */
