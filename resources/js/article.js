document.addEventListener('DOMContentLoaded', () => {
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
                credentials: 'same-origin', // 🔑 MUY IMPORTANTE
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

                //Actualiza el contador de comentarios
                const countSpan = document.getElementById(`comment-count-${articleId}`);
                const match = countSpan.innerText.match(/\d+/);
                if (match) {
                    const currentCount = parseInt(match[0], 10) + 1;
                    countSpan.innerText = `Comentarios: (${currentCount})`;
                }
            })
            .catch(err => console.error(err))
            .finally(() => {
                spinner.classList.add('hidden');
            });
        });
    });

    document.querySelectorAll('.toggle-edit').forEach(button => {
        button.addEventListener('click', () => {
            const id = button.dataset.id;
            const titleEl = document.querySelector(`.editable-title[data-id="${id}"]`);
            const contentEl = document.querySelector(`.editable-content[data-id="${id}"]`);

            const isEditing = titleEl.isContentEditable;

            if (!isEditing) {
                // Activar edición
                titleEl.contentEditable = true;
                contentEl.contentEditable = true;

                titleEl.style.border = "2px solid #2563eb";
                contentEl.style.border = "2px solid #2563eb";

                button.innerHTML = '<i class="fas fa-save"></i> Guardar';
                addCancelButton(id, button);
            } else {
                // Guardar
                const newTitle = titleEl.innerText.trim();
                const newContent = contentEl.innerText.trim();

                fetch(`/blog/${id}/update`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        title: newTitle,
                        content: newContent,
                    })
                }).then(() => {
                    titleEl.contentEditable = false;
                    contentEl.contentEditable = false;

                    titleEl.style.border = "";
                    contentEl.style.border = "";

                    button.innerHTML = '<i class="fas fa-edit"></i> Editar';
                    removeCancelButton(id);
                });
            }
        });
    });

    function addCancelButton(id, editButton) {
        let cancelBtn = document.createElement("button");
        cancelBtn.className = "cancel-edit bg-gray-500 text-white px-3 py-1 rounded text-sm ml-2";
        cancelBtn.innerText = "Cancelar";
        cancelBtn.dataset.id = id;
        editButton.parentNode.appendChild(cancelBtn);

        cancelBtn.addEventListener('click', () => {
            location.reload();
        });
    }

    function removeCancelButton(id) {
        const cancelBtn = document.querySelector(`.cancel-edit[data-id="${id}"]`);
        if (cancelBtn) cancelBtn.remove();
    }

    // Eliminar artículo
    document.querySelectorAll('.delete-article').forEach(button => {
        button.addEventListener('click', () => {
            const id = button.dataset.id;

            if (!confirm("¿Seguro que deseas eliminar este artículo?")) return;

            fetch(`/blog/${id}/delete`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(res => res.json())
            .then(() => {
                button.closest('.bg-white').remove();
                alert("Artículo eliminado");
            });
        });
    });
});

