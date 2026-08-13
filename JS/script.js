document.addEventListener("DOMContentLoaded", () => {
    
    // --- 1. FILTRO DE POSTAGENS (BLOG) ---
    const botoesFiltro = document.querySelectorAll(".filtro-btn");
    const postagens = document.querySelectorAll(".postagem");

    if (botoesFiltro.length > 0) {
        botoesFiltro.forEach(botao => {
            botao.addEventListener("click", () => {
                const filtro = botao.dataset.filtro;

                botoesFiltro.forEach(b => {
                    b.classList.remove("btn-filtro-ativo");
                    b.classList.add("btn-filtro-outline");
                });

                botao.classList.remove("btn-filtro-outline");
                botao.classList.add("btn-filtro-ativo");

                postagens.forEach(postagem => {
                    const tipo = postagem.dataset.tipo;
                    if (filtro === "todos" || tipo === filtro) {
                        postagem.style.display = "";
                    } else {
                        postagem.style.display = "none";
                    }
                });
            });
        });
    }

    // --- 2. BUSCA EM TABELAS (USUÁRIOS, EQUIPAMENTOS, ETC.) ---
    const inputsBusca = document.querySelectorAll(".input-busca-astro");

    inputsBusca.forEach(inputBusca => {
        inputBusca.addEventListener("input", () => {
            const termo = inputBusca.value.toLowerCase().trim();
            const containerCard = inputBusca.closest(".container");
            
            if (containerCard) {
                const linhasTabela = containerCard.querySelectorAll("tbody tr");
                linhasTabela.forEach(linha => {
                    const textoLinha = linha.textContent.toLowerCase();
                    if (textoLinha.includes(termo)) {
                        linha.style.display = "";
                    } else {
                        linha.style.display = "none";
                    }
                });
            }
        });
    });

    // --- 3. FILTRAGEM DE EVENTOS ASTRONÔMICOS ---
    const filterButtons = document.querySelectorAll('.pagina-eventos .filter-pill');
    const eventCards = document.querySelectorAll('.pagina-eventos .col');

    if (filterButtons.length > 0 && eventCards.length > 0) {
        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                
                // 1. Remove a classe 'active' de todos os botões e adiciona no clicado
                filterButtons.forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');

                // 2. Obtém o nome do filtro selecionado em minúsculas
                const filterValue = button.textContent.trim().toLowerCase();

                // 3. Esconde ou exibe os cards conforme a categoria
                eventCards.forEach(card => {
                    const badge = card.querySelector('.badge-categoria');
                    const categoryText = badge ? badge.textContent.trim().toLowerCase() : '';

                    // Se for "Todos" ou se a categoria do card incluir o termo do filtro
                    if (filterValue === 'todos' || categoryText.includes(filterValue)) {
                        card.style.display = ''; // Exibe a coluna
                    } else {
                        card.style.display = 'none'; // Esconde a coluna
                    }
                });
            });
        });
    }

    // Seleciona todos os botões de curtida da página
    const botoesCurtida = document.querySelectorAll('.btn-like');

botoesCurtida.forEach(botao => {
    botao.addEventListener('click', function () {
        const icone = this.querySelector('i');
        const textoLikes = this.querySelector('span');
        const idObservacao = this.dataset.id;

        fetch('curtir.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `idObservacao=${idObservacao}`
        })
        .then(response => response.json())
        .then(dados => {
            if(dados.erro){
                alert(dados.erro);
                return;
            }

            if(dados.acao === 'curtido'){
                this.classList.add('curtido');
                icone.classList.remove('bi-heart');
                icone.classList.add('bi-heart-fill');
            } else {
                this.classList.remove('curtido');
                icone.classList.remove('bi-heart-fill');
                icone.classList.add('bi-heart');
            }

            textoLikes.textContent = `${dados.total} likes`;

            icone.classList.remove('animar-coracao');
            void icone.offsetWidth;
            icone.classList.add('animar-coracao');
            });
        });
    });
});