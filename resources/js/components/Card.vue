<template>
  <div class="card p-2 m-2" style="width: 18rem; background-color:#7FFFD4;">
    <img :src="imagem" class="card-img-top" :alt="nome">
    <div class="card-body">
      <h5 class="card-title">{{ nome }}</h5>
      <p class="card-text">{{ especie }}</p>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" :data-bs-target="'#exampleModal' + id">
        {{ nome }}
      </button>
    </div>

    <modal :id="'exampleModal' + id" :nome="nome" :especie="especie" :genero="genero" :nome_original="nome_original" :localizacao="localizacao" :status="status" :imagem="imagem" :episode="episode"  ></modal>

  </div>
</template>

<script>
import Modal from './card.modal.vue'

export default {
  name: 'Card',
  components: {
    Modal
  },
  props: {
    nome: String,
    especie: String,
    imagem: String,
    id: Number,
    genero: String,
    nome_original: String,
    localizacao: String,
    status: String,
    episode: String,
  }
}
</script>
