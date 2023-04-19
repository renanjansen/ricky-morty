<template>
  <div class="modal fade shadow-lg rounded" :id="id" tabindex="-1" :aria-labelledby="id" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content justify-content-center text-center" style="background-color:#7FFFD4;">
        <div class="modal-header justify-content-center text-center">
          <h1 class="modal-title fs-1 justify-content-center text-center" :id="id">{{ nome }}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <ul class="list-group justify-content-center">
            <li class="list-group-item list-group-item-action">
              Espécie: {{ especie }}
            </li>
            <li class="list-group-item list-group-item-action">
              Gênnero: {{ genero }}
            </li>
            <li class="list-group-item list-group-item-action">
              Origen: {{ nome_original }}
            </li>
            <li class="list-group-item list-group-item-action">
              Localização: {{ localizacao }}
            </li>
            <li class="list-group-item list-group-item-action">
              Status: {{ status }}
            </li>
            <li class="list-group-item list-group-item-action">
            <a class="btn btn-primary" :href="episode" role="button" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-film" viewBox="0 0 16 16">
            <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0v6h8V1H4zm8 8H4v6h8V9zM1 1v2h2V1H1zm2 3H1v2h2V4zM1 7v2h2V7H1zm2 3H1v2h2v-2zm-2 3v2h2v-2H1zM15 1h-2v2h2V1zm-2 3v2h2V4h-2zm2 3h-2v2h2V7zm-2 3v2h2v-2h-2zm2 3h-2v2h2v-2z"/>
            </svg>
            Episódio
            </a>
   
              
            </li>
          </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Modal",
  props: {
    id: String,
    nome: String,
    especie: String,
    genero: String,
    nome_original: String,
    localizacao: String,
    status: String,
    episode: String,
  },
};
</script>



