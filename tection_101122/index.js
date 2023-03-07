const cadastrarButton = document.getElementById('cadastrar');
const entrarButton = document.getElementById('entrar');
const container = document.getElementById('container');

cadastrarButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

entrarButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});