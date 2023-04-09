<template>
  <div class="modal fade" :id="id" tabindex="-1" :aria-labelledby="id" aria-hidden="true">
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
            <a class="btn btn-primary" :href="episode" role="button" target="_blank">Episódio</a>
              
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



